<?php
require_once("config.php");
require_once("inc_dbfunctions.php");
$mycon = databaseConnect();

if(!isset($_GET['code']) || $_GET['code'] == "")
{
    openPage("index.php");
    exit;
}

$dataRead = New DataRead();

$contentsdetails = $dataRead->transmissions_get($mycon,$_GET['code']);
if(!$contentsdetails)
{
    showAlert("The requested content was not found");
    openPage("index.php");
    exit;
}

$contentslist = $dataRead->transmissions_list($mycon, " LIMIT 6", Array());

$picture = "pictures/transmissions/{$contentsdetails['transmission_id']}.jpg";
$banner = "pictures/transmissions/{$contentsdetails['transmission_id']}_banner.jpg";
//$contentpicture = (file_exists($picture)) ? $picture : (file_exists($banner)) ? $banner : "";
$contentpicture = "";
if(file_exists($picture)) 
{
    $contentpicture = $picture;
}
 else {
        if(file_exists($banner)) 
        {
            $contentpicture = $banner;
        }
        else
        {
            $contentpicture = "";
        }
     
    
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
		<link rel="stylesheet" href="css/main_style.css" title="main">
		<!-- Landing Page Style -->
		<link rel="stylesheet" href="css/reset_style.css">
		<!-- Fav Icon -->
                <link rel="icon" type="image/png" href="images/favicon.png" />
                <style>
                    .lx-news-item-text h3 {
                        height: 50px;
                        overflow: hidden;
                    }
                    .lx-news-item-text p {
                        height: 110px;
                        overflow: hidden;
                    }
                    .lx-news-item-img {
                        height: 150px;
                    }
                    .lx-news-item-img.large {
                        height: 210px;
                    }
                    .lx-news-item-img.small {
                        height: 60px;
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
					<div class="lx-body-content lx-body-content-horizontal">
						<div class="lx-g3-2-f">
							<!-- Main Content -->
							<div class="lx-body-main-content">
								<!-- Single Container -->
								<div class="lx-single-post-container">
									<!-- Page Trees -->
									<div class="lx-page-tree">
										<ul>
											<li><a href="index.php">Home</a></li>
											<li><i class="fa fa-caret-right"></i></li>
											<li><strong><?php echo $contentsdetails['name'] ?></strong></li>
										</ul>
										<div class="lx-clear-fix"></div>
									</div>
									<!-- Single Post Content -->
									<div class="lx-single-post-content">
										<h1><?php echo $contentsdetails['name'] ?></h1>
										<div class="lx-single-post-img">
											<img src="<?php echo $contentpicture ?>" alt="banner2" />
											<figcaption><?php echo $contentsdetails['caption'] ?></figcaption>
										</div>										
										<p><?php echo $contentsdetails['details'] ?></p>
										<!-- Share -->
										<div class="lx-share">
											<?php include("inc_social_share.php") ?>
											<div class="lx-clear-fix"></div>											
										</div>
									</div>
									<!-- Tags -->
								</div>	
								<!-- News Container -->
								<div class="lx-news-container">
									<!-- News Container Content -->
									<div class="lx-news-container-content">
									<div class="lx-news-container-title">
                                                                            <h2><a href="channels.php">Submit review</a></h2>
									</div>
                                                                                <p style="font-size: 16px">
                                                                                    Are you watching this channel? Please tell us what you think about this channel.
<br /><br />
                                                                                </p>
                                                                            
                    
                  <div class="panel panel-default">
                    <!-- /.box-header -->
                    <!-- form start -->
                      <div class="panel-body">
                    <form action="actionmanager.php" method="post" target="actionframe" role="form" enctype="multipart/form-data">
                        <div class="form-group oneline ">
                          <label for="name">Your Name</label>
                          <input name="name" type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group oneline three">
                          <label for="phone">Phone number</label>
                          <input name="phone" type="text" class="form-control" id="phone">
                        </div>
                        <div class="form-group oneline three">
                          <label for="email">Email</label>
                          <input name="email" type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group oneline three">
                          <label for="picture">Picture of your tv screen</label>
                          <input name="picture" type="file" class="form-control" id="picture">
                        </div>
                        <div class="form-group oneline three">
                          <label for="rate_sound">Sound quality</label>
                          <select name="rate_sound" class="form-control" id="rate_sound">
                              <option value="4">Excellent</option>
                              <option value="3">Very Good</option>
                              <option value="2" selected>Good</option>
                              <option value="1">Bad</option>
                              <option value="0">Very Bad</option>
                          </select>
                        </div>
                        <div class="form-group oneline three">
                          <label for="rate_picture">Picture quality</label>
                          <select name="rate_picture" class="form-control" id="rate_picture">
                              <option value="4">Excellent</option>
                              <option value="3">Very Good</option>
                              <option value="2" selected>Good</option>
                              <option value="1">Bad</option>
                              <option value="0">Very Bad</option>
                          </select>
                        </div>
                        <div class="form-group oneline three">
                          <label for="rate_channel">Rate this channel</label>
                          <select name="rate_channel" class="form-control" id="rate_channel">
                              <option value="4">Excellent</option>
                              <option value="3">Very Good</option>
                              <option value="2" selected>Good</option>
                              <option value="1">Bad</option>
                              <option value="0">Very Bad</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="comment">Comment</label>
                          <textarea name="comment" rows="5" class="form-control" id="comment" style="height: 100px"></textarea>
                        </div>
                        <div class="lx-submit">
                                <input type="submit" name="submit" value="Submit" />
                        </div>
                        <input name="transmission_id" type="hidden" id="transmission_id" value="<?php echo $contentsdetails['transmission_id'] ?>">
                        <input name="command" type="hidden" id="command" value="transmissions_comments_add">
                      <!-- /.box-body -->
                    </form>
                  </div>
                      </div>
                      
                                                                            
										<div class="lx-clear-fix"></div>
									</div>
								</div>
								<!-- News Container -->
								<div class="lx-news-container">
									<!-- News Container Content -->
									<div class="lx-news-container-content">
<div id="fb-root"></div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> 
<div class="fb-comments" data-href="<?php echo CurrentPageURL() ?>" data-width="100%" data-numposts="10"></div>                                    
                                                                            
										<div class="lx-clear-fix"></div>
									</div>
								</div>
								<!-- News Container -->
								<div class="lx-news-container">
									<!-- News Container Content -->
									<div class="lx-news-container-content">
<?php
foreach($contentslist as $row)
{
    //var_dump($row);
?>            
										<div class="lx-g3-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-13">
												<div class="lx-news-item-img">
													<a href="transmissions-view.php?code=<?php echo $row['transmission_id'] ?>"><img src="pictures/transmissions/<?php echo $row['transmission_id'] ?>.jpg" alt="<?php echo $row['name'] ?>" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="transmissions-view.php?code=<?php echo $row['transmission_id'] ?>"><?php echo $row['name'] ?></a></h3>
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
						<div class="lx-g3-f">
							<!-- Side Bar -->
							<?php require("inc_sidebar.php"); ?>
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
                
    <script>
    $("#banner_slider_1 > div:gt(0)").hide();

    setInterval(function() {
      $('#banner_slider_1 > div:first')
        .fadeOut(500)
        .next()
        .fadeIn(500)
        .end()
        .appendTo('#banner_slider_1');
    }, 8000);    
    </script>
	</body>
</html>