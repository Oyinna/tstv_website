<?php
require_once("config.php");
require_once("inc_dbfunctions.php");
$mycon = databaseConnect();

if(!isset($_GET['code']) || $_GET['code'] == "")
{
    openPage("news.php");
    exit;
}

$dataRead = New DataRead();

$contentsdetails = $dataRead->news_get($mycon,$_GET['code']);
if(!$contentsdetails)
{
    showAlert("The requested content was not found");
    openPage("news.php");
    exit;
}

$contentslist = $dataRead->news_list($mycon, " LIMIT 6", Array());

$picture = "pictures/news/{$contentsdetails['article_id']}_image.jpg";
$banner = "pictures/news/{$contentsdetails['article_id']}_banner.jpg";
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
                                                                                        <li><a href="news.php">News</a></li>
											<li><i class="fa fa-caret-right"></i></li>
											<li><strong><?php echo $contentsdetails['headline'] ?></strong></li>
										</ul>
										<div class="lx-clear-fix"></div>
									</div>
									<!-- Single Post Content -->
									<div class="lx-single-post-content">
										<h1><?php echo $contentsdetails['headline'] ?></h1>
										<div class="lx-single-post-img">
											<img src="<?php echo $contentpicture ?>" alt="banner2" />
											<figcaption><?php echo $contentsdetails['caption'] ?></figcaption>
										</div>										
										<p><?php echo $contentsdetails['content'] ?></p>
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
<?php
foreach($contentslist as $row)
{
    //var_dump($row);
?>            
										<div class="lx-g3-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-13">
												<div class="lx-news-item-img">
													<a href="news-view.php?code=<?php echo $row['article_id'] ?>"><img src="pictures/news/<?php echo $row['article_id'] ?>_image.jpg" alt="<?php echo $row['headline'] ?>" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="news-view.php?code=<?php echo $row['article_id'] ?>"><?php echo $row['headline'] ?></a></h3>
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