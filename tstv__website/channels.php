<?php
require_once("config.php");
require_once("inc_dbfunctions.php");
$mycon = databaseConnect();

$dataRead = New DataRead();

$contentsdetails = $dataRead->contents_get($mycon);

$contentslist = $dataRead->articles_list($mycon, " LIMIT 6", Array());

$channelcategories = $dataRead->channels_categories_list($mycon);

//var_dump($channelscategories);
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
		<link rel="stylesheet" href="css/main_style.css?v=001" title="main">
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
											<li><a href="#">All channels</a></li>
										</ul>
										<div class="lx-clear-fix"></div>
									</div>
									<!-- Single Post Content -->
									<div class="lx-single-post-content">
										<h1><?php echo $contentsdetails['channelspage_title'] ?></h1>
										<div class="lx-single-post-img">
											<img src="pictures/channelspage_image.jpg" alt="banner" />
										</div>										
										<p><?php echo $contentsdetails['channelspage_content'] ?></p>
										<!-- Share -->
									<!-- News Container Content -->
										<div class="lx-clear-fix"></div>
								<!-- News Container -->
<?php
foreach($channelcategories as $row)
{
?>
								<div class="lx-news-container">
									<!-- News Container Title -->
									<div class="lx-news-container-title">
										<h2><?php echo $row['name'] ?></h2>
									</div>
									<!-- News Container Content -->
									<div class="lx-news-container-content">
<?php
$channelslist = $dataRead->channels_listbycategory($mycon, $row['category_id']);
foreach($channelslist as $row)
{
?>
											<!-- News Item Sticky -->
												<a href="#" title="<?php echo $row['name'] ?>">
                                                                                                <div class="lx-news-item-img channels_logos">
                                                                                                    <div class="channel_logo">
                                                                                                        <img src="pictures/channels/<?php echo $row['channel_id'] ?>.jpg?v=001" alt="<?php echo $row['name'] ?>" />
                                                                                                    </div>
                                                                                                    
                                                                                                    <div class="channel_name"><?php echo $row['name'] ?></div>
                                                                                                    <div class="channel_code"><?php echo $row['code'] ?></div>
                                                                                                    <div class="channel_caption"><?php echo $row['caption'] ?></div>
												</div>
                                                                                                </a>
<?php
}
?>
										<div class="lx-clear-fix"></div>
									</div>
								</div>
<?php
}
?>
                                                                                
										<div class="lx-share">
											<?php include("inc_social_share.php") ?>
											<div class="lx-clear-fix"></div>											
										</div>
									</div>
									<!-- Author -->
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
													<a href="contents-view.php?code=<?php echo $row['article_id'] ?>"><img class="lazy" data-original="pictures/articles/<?php echo $row['article_id'] ?>_image.jpg" alt="<?php echo $row['headline'] ?>" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="contents-view.php?code=<?php echo $row['article_id'] ?>"><?php echo $row['headline'] ?></a></h3>
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
<script src="js/jquery.lazyload.js" type="text/javascript"></script>                
    <script>
        $("img.lazy").lazyload();
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