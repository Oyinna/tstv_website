<?php
require_once("config.php");
require_once("inc_dbfunctions.php");
$mycon = databaseConnect();

$dataRead = New DataRead();
$bannerslist = $dataRead->banners_list($mycon);

//Custom color #34A84B user icon
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
                    .lx-news-item-img.large {
                        height: 210px;
                    }
                    .lx-news-item-img.small {
                        height: 80px;
                    }
                    .lx-news-item {
                        width: 90%;
                         margin-bottom: 40px;
                        border-bottom: 1px solid #34A84B4D;
                   }
                    .lx-news-item-img img {
                        height: 60px;
                        margin-bottom: 20px;
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
						<!-- Main Slide -->
						<div class="lx-main-slide">
							<div class="lx-main-slide-bloc">
								<div class="lx-g1-f">
									<!-- Slide Item -->
									<div class="lx-main-slide-item" id="banner_slider_2" style="height: 430px; overflow: hidden;">
<?php
foreach(array_reverse($bannerslist) as $row)
{
    if($row['placement'] != "selfcare") continue;
?>            
										<div class="lx-main-slide-item-img">
                                                                                    <a href="<?php echo $row['link'] ?>" target="_blank"><img src="../pictures/banners/<?php echo $row['banner_id'] ?>.jpg" alt="" style="height2: 400px" /></a>
										</div>
<?php
}
?>
									</div>
								</div>
								<div class="lx-clear-fix"></div>
							</div>
						</div>
						<div class="lx-g3-1-f">
							<!-- Main Content -->
							<div class="lx-body-main-content">
								<!-- News Container -->
								<div class="lx-news-container">
									<!-- News Container Content -->
									<div class="lx-news-container-content">
										<div class="lx-g4-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-14">
												<div class="lx-news-item-img">
                                                                                                    <a href="#"><img src="images/user-128.png" alt="" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="#">My Account</a></h3>
													<p>View and manage your account and subscription information</p>
												</div>											
											</div>
										</div>
										<div class="lx-g4-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-14">
												<div class="lx-news-item-img">
                                                                                                    <a href="#"><img src="images/pay-128.png" alt="" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="#">Pay Subscription</a></h3>
													<p>Pay, renew and activate your TStv subscriptions</p>
												</div>											
											</div>
										</div>
										<div class="lx-g4-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-14">
												<div class="lx-news-item-img">
                                                                                                    <a href="#"><img src="images/fix-128.png" alt="" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="#">Fix a problem</a></h3>
													<p>Clear errors or fix any problem you might be having</p>
												</div>											
											</div>
										</div>
										<div class="lx-g4-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-14">
												<div class="lx-news-item-img">
                                                                                                    <a href="#"><img src="images/instruction-128.png" alt="" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="#">Instruction Videos</a></h3>
													<p>Watch some video tutorial on how to get the best out of our TStv device and subscription</p>
												</div>											
											</div>
										</div>
										<div class="lx-g4-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-14">
												<div class="lx-news-item-img">
                                                                                                    <a href="#"><img src="images/contact-128.png" alt="" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="#">Contact Support</a></h3>
													<p>Chat with a customer support representative or view contact options</p>
												</div>											
											</div>
										</div>
										<div class="lx-g4-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-14">
												<div class="lx-news-item-img">
                                                                                                    <a href="#"><img src="images/hdtv-128.png" alt="" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="#">TStv Guide</a></h3>
													<p>View the daily TStv program guide to know when your favorite program is showing</p>
												</div>											
											</div>
										</div>
										<div class="lx-g4-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-14">
												<div class="lx-news-item-img">
                                                                                                    <a href="#"><img src="images/channels-128.png" alt="" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="#">TStv Channels</a></h3>
													<p>View all TStv channels</p>
												</div>											
											</div>
										</div>
										<div class="lx-g4-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-14">
												<div class="lx-news-item-img">
                                                                                                    <a href="#"><img src="images/hdtv-128.png" alt="" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="#">Trailers</a></h3>
													<p>Watch some movie and program previews</p>
												</div>											
											</div>
										</div>
										<div class="lx-g4-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-14">
												<div class="lx-news-item-img">
                                                                                                    <a href="#"><img src="images/trailer-128.png" alt="" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="#">TStv Installers</a></h3>
													<p>Find authorized TStv installers near you</p>
												</div>											
											</div>
										</div>
										<div class="lx-g4-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-14">
												<div class="lx-news-item-img">
                                                                                                    <a href="#"><img src="images/sms-128.png" alt="" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="#">USSD/SMS Commands</a></h3>
													<p>Learn more about the various TStv SMS and USSD commands</p>
												</div>											
											</div>
										</div>
										<div class="lx-clear-fix"></div>
									</div>
								</div>
								<!-- News Container -->
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
    $("#banner_slider_2 > div:gt(0)").hide();

//    setInterval(function() {
//      $('#banner_slider_1 > div:first')
//        .fadeOut(500)
//        .next()
//        .fadeIn(500)
//        .end()
//        .appendTo('#banner_slider_1');
//    }, 8000);    
    setInterval(function() {
      $('#banner_slider_2 > div:first')
        .fadeOut(1000)
        .next()
        .fadeIn(1000)
        .end()
        .appendTo('#banner_slider_2');
    }, 8000); 
    
    ///$("a").attr("href","#");
    </script>
	</body>
</html>