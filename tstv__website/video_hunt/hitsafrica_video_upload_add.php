<?php
require_once("config.php");
require_once("inc_dbfunctions.php");
$mycon = databaseConnect();
$dataRead = New DataRead();

$showstartdate = "More on TStv";//.date("d M Y",strtotime("+ 1 day"));//01 Jul 2017 17:59";
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
		<link rel="stylesheet" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<!-- General CSS Settings -->
		<link rel="stylesheet" href="../css/general_style.css">
		<!-- Main Style of the template -->
		<link rel="stylesheet" href="../css/main_style.css?v=<?php echo time() ?>" title="main">
		<!-- Landing Page Style -->
		<link rel="stylesheet" href="../css/reset_style.css">
		<!-- Fav Icon -->
                <link rel="icon" type="image/png" href="../images/favicon.png" />
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
                                                         <form action="actionmanager.php" target="actionframe" method="post" enctype="multipart/form-data">
                                                                    
                                                        
							<div class="lx-body-main-content">
								<div class="lx-news-container">
									<!-- News Container Title -->
									<div class="lx-news-container-title">
                                                                            <h2>Personal Information</h2>
									</div>
									<!-- News Container Content -->
									<div class="lx-news-container-content">
										<div class="lx-clear-fix"></div>
                                                                                <p style="font-size: 16px">
                                                                                    
                                                                <!--<form action="actionmanager.php" target="actionframe" method="post" enctype="multipart/form-data">-->
                                                                    <div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label>Name</label>
                                                                            <div>
                                                                                <input type="text" class="form-control" name="name">
                                                                                surname first
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Email address</label>
                                                                            <div>
                                                                                <input type="text" class="form-control" name="email">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Phone number</label>
                                                                            <div>
                                                                                <input type="text" class="form-control" name="phone">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>State</label>
                                                                            <div>
                                                                                <input type="text" class="form-control" name="state">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Address</label>
                                                                            <div>
                                                                                <input type="text" class="form-control" name="address">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <div class="lx-submit">
									<!--<input type="hidden" name="command" value="personalinfo_add">
                                                                                <input type="submit" name="submit" value="Send">-->
									</div>
                                                                    </div>    
                                                                <!--</form>-->
								  </div> <br/> <br/> 
	</div>
								</div>
                                                            
                                                            <div class="lx-body-main-content">
								<div class="lx-news-container">
									<!-- News Container Title -->
									<div class="lx-news-container-title">
                                                                            <h2>Upload New video</h2>
									</div>
									<!-- News Container Content -->
                                                                        <a href="../dealer/admin_dealers-add.php"></a>
									<div class="lx-news-container-content">
										<div class="lx-clear-fix"></div>
                                                                                <p style="font-size: 16px">
                                                                                  <!--<form action="actionmanager.php" target="actionframe" method="post" enctype="multipart/form-data">-->
                                                                    <div>
                                                              
                                                                        <div class="form-group">
                                                                            <label >Video Title</label>
                                                                            <div>
                                                                                <input type="text" class="form-control" name="video_title">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label>Video</label>
                                                                            <div>
                                                                                <input type="file" accept="video/*" class="form-control" name="video">
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    <div>
                                                                        <div class="lx-submit">
									<input type="hidden" name="command" value="hitsafrica_personalinfo_add">
                                                                                <input type="submit" name="submit" value="upload">
									</div>
                                                                    </div>
                                                                 <br/> <br/> 
									</div>
								</div>
                                                                
								
								
							</div>
							</form>	
								
								
								
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
			<!-- Popup -->
			<div class="lx-popup">
				<a href="../javascript:;"><i class="fa fa-remove"></i></a>
				<div class="lx-popup-inside">
					<a href="../javascript:;"><i class="fa fa-caret-left"></i></a>
					<a href="../javascript:;"><i class="fa fa-caret-right"></i></a>
					<div class="lx-popup-content">
						<div class="lx-popup-image">
							<img src="../#" alt="image title here" />
							<span></span>
						</div>
						<div class="lx-popup-details">
							<h2>Some title</h2>
							<p></p>
						</div>
					</div>
				</div>
			</div>
			<!-- End Popup -->	
		</div>
		<!-- End Wrapper -->
		<!-- JQuery -->
		<script src="../js/jquery-1.12.4.min.js"></script>
		<!-- Popup -->
		<script src="../js/jquery.popup.js"></script>
		<!-- Main Script -->
		<script src="../js/script.js"></script>
<script src="../js/jquery.lazyload.js" type="text/javascript"></script>                  
    <script>
        $("img.lazy").lazyload();
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
//    setInterval(function() {
//      $('#banner_slider_2 > div:first')
//        .fadeOut(1000)
//        .next()
//        .fadeIn(1000)
//        .end()
//        .appendTo('#banner_slider_2');
//    }, 8000); 
//    
    ///$("a").attr("href","#");
    
var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1} 
    x[slideIndex-1].style.display = "block"; 
    setTimeout(carousel, 8000); // Change image every 8 seconds
}

    </script>
	</body>
</html>