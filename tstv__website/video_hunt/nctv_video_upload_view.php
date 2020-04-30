<?php
require_once("config.php");

//$channel_id = getCookie("channel_name");

require_once("inc_dbfunctions.php");
$mycon = databaseConnect();

$dataRead = New DataRead();
$dataWrite = New DataWrite();



$sql = "";
$param = array();
if(isset($_POST['datefrom']) && $_POST['datefrom'] != "")
{
    $sql .= " AND (thedate >= :datefrom) ";
    $param[":datefrom"] = $_POST['datefrom'];
}
if(isset($_POST['dateto']) && $_POST['dateto'] != "")
{
    $sql .= " AND (thedate <= :dateto) ";
    $param[":dateto"] = $_POST['dateto'];
}


$sql .= " ORDER BY `video_id` DESC";

$video_view = $dataRead->nctv_video_list($mycon, $sql, $param);


//delete the video
if(isset($_GET['code']) && isset($_GET['delete']) && $_GET['delete'] == "yes")
{
    $code = $_GET['code'];
        $dataWrite->video_delete($mycon,$code);
       // showAlert ("video deleted");
        openPage("hitsafrica_video_upload_view.php");
        exit;
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php pageTitle() ?></title>
                <meta name="keywords" content="<?php seoPageContent() ?>" />
                <meta name="description" content="<?php seoPageDescriptions() ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Awesomefont -->
		<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<!-- General CSS Settings -->
		<link rel="stylesheet" href="css/general_style.css">
		<!-- Main Style of the template -->
		<link rel="stylesheet" href="css/main_style.css?v=<?php echo time() ?>" title="main">
		<!-- Landing Page Style -->
		<link rel="stylesheet" href="css/reset_style.css">
		<!-- Fav Icon -->
                <link rel="icon" type="image/png" href="images/favicon.png" />
                <style>
                    .lx-news-item-text h3 {
                        height: 35px;
                        overflow: hidden;
                    }
                    .lx-news-item-text p {
                        height: 50px;
                        overflow: hidden;
                    }
                    .lx-news-item-img {
                        height: 150px;
                    }
                    .lx-news-item-img.large {
                        height: 210px;
                    }
                    .lx-news-item-img.small {
                        height: 80px;
                    }
                </style>                
	</head>
	<body>
		<!-- Wrapper -->
		<div class="lx-wrapper">
			<div class="lx-g1-f">
				<!-- Header -->
                                <?php require("inc_header.php"); ?>
			</div>
			<div class="lx-g1-f">
				<div class="lx-body">
						<!-- Main Slide -->

                                                <div class="lx-body-content lx-body-content-horizontal">

						<div class="lx-g3-3-f">
							<!-- Main Content -->
							<div class="lx-body-main-content">
								<div class="lx-news-container">
									<!-- News Container Title -->
									<div class="lx-news-container-title">
                                                                            <h2><a href="nctv_video_upload_add.php">Add new video</a></h2>
                                                                    Search
                                                                            <form action="" method="post" enctype="multipart/form-data">
                                                                        <div>
                                                                            <div style="float:left; width:45%; margin-right:10%">
                                                                                <input type="text" class="form-control datepicker" name="datefrom" value="<?php if(isset($_POST['datefrom'])) echo $_POST['datefrom'] ?>">
                                                                                Date from
                                                                            </div>
                                                                            <div style="float:right; width:45%">
                                                                                <input type="text" class="form-control datepicker" name="dateto" value="<?php if(isset($_POST['dateto'])) echo $_POST['dateto'] ?>">
                                                                                Date to
                                                                            </div>
                                                                        </div>
                                                                    <div class="form-actions fluid">
                                                                        <div class="row">
                                                                            <div class="lx-submit">
                                                                                <input type="submit" name="submit" value="GO!">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                        </div>
									<!-- News Container Content -->
									
								</div>
                                                            
								<!-- News Container -->
								<div class="lx-news-container">
									<!-- News Container Title -->
                                                                        <div class="lx-news-container-title">
                                                                            <h2>Uploaded videos</h2>
									</div>
									<!-- News Container Content -->
									<div class="lx-news-container-content">
<?php
foreach($video_view as $row)
{
?>
										<div class="lx-g3-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-13">
												<div class="lx-news-item-img">
                                                                                                    <a href="video/<?php echo $row['video_id'] ?>.mp4" target="_blank">
                                                                                                    <video controls>    
                                                                                                        <source src="video/<?php echo $row['video_id'] ?>.mp4" type="video/mp4" alt="<?php echo $row['name'] ?>"/>
                                                                                                    </video>
                                                                                                    </a>
												</div>
												<div class="lx-news-item-text">
                                                                                                    <?php echo formatDate($row['thedate'],"yes")?>
													<h3 style="height: 45px;"><a href="video_upload-view.php?code=<?php echo $row['video_id'] ?>"><?php echo $row['video_title'] ?></a></h3>
													 by <?php echo $row['name']?> <br>    
												</div>	
                                                                                            <div class="lx-submit">
                                                                                            <a href="video/<?php echo $row['video_id'] ?>.mp4"   download>
                                                                                                         <input type="submit" name="submit" value="download">        
                                                                                             </a>
                                                                                               
                                                                                                    <a href="?code=<?php echo $row['video_id']."&delete=yes" ?>" onclick="if(!confirm('Do you want to delete this video?')) return false";><input type="submit" value="delete" style="background:#b2beb5"></a>
                                                                                                </div>
											</div>
										</div>
<?php
}
?>
                                                                            
                                                                            
                                                                            
                                                                          
                                                                            
										<div class="lx-clear-fix"></div>
									</div>
                                                                        
								</div>

							</div>
						</div>						
					</div>
					<div class="lx-clear-fix"></div>
					<!-- Footer -->
					<div class="lx-footer">
						<!-- Footer Content -->
                                                <?php require("inc_footer.php"); ?>
					</div>
				</div>
			</div>
			<!-- End Popup -->	
		</div>
		<!-- End Wrapper -->
		<!-- JQuery -->
		<script src="js/jquery-1.12.4.min.js"></script>
		<!-- Popup -->
		<script src="js/jquery.popup.js"></script>
		<!-- Main Script -->
		<script src="js/script.js"></script>
                <link rel="stylesheet" type="text/css" href="jquery.datepick/jquery.datepick.css"> 
        <script type="text/javascript" src="jquery.datepick/jquery.plugin.js"></script> 
        <script type="text/javascript" src="jquery.datepick/jquery.datepick.js"></script>     
        <script type="text/javascript">
        $('.datepicker').datepick({dateFormat: 'yyyy-mm-dd'});

        </script>
	</body>
</html>