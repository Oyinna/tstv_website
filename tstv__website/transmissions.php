<?php
require_once("config.php");
require_once("inc_dbfunctions.php");
$mycon = databaseConnect();

$dataRead = New DataRead();

$transmissionslist = $dataRead->transmissions_list($mycon);

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

						<div class="lx-g3-2-f">
							<!-- Main Content -->
							<div class="lx-body-main-content">
								<div class="lx-news-container">
									<!-- News Container Title -->
									<div class="lx-news-container-title">
                                                                            <h2><a href="channels.php">TStv Test Transmission</a></h2>
									</div>
									<!-- News Container Content -->
									<div class="lx-news-container-content">
										<div class="lx-clear-fix"></div>
                                                                                <p style="font-size: 16px">
                                                                                    TStv Africa is currently conducting test transmission with various channels on our platform. We need you to tell us how we are doing with the test transmission. Please click on each of the channels below to give us feedback on what you like and what you think we should improve on.
<br /><br /><br />
                                                                                </p>
									</div>
								</div>
                                                            
								<!-- News Container -->
								<div class="lx-news-container">
									<!-- News Container Title -->
									<!-- News Container Content -->
									<div class="lx-news-container-content">
<?php
foreach($transmissionslist as $row)
{
?>
										<div class="lx-g3-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-13">
												<div class="lx-news-item-img">
                                                                                                    <a href="transmissions-view.php?code=<?php echo $row['transmission_id'] ?>"><img src="pictures/transmissions/<?php echo $row['transmission_id'] ?>.jpg" alt="<?php echo $row['name'] ?>" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3 style="height: 45px;"><a href="transmissions-view.php?code=<?php echo $row['transmission_id'] ?>"><?php echo $row['name'] ?></a></h3>
													<p><?php echo $row['caption'] ?></p>
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
	</body>
</html>