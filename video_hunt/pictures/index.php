<?php
require_once("config.php");
require_once("inc_dbfunctions.php");
$mycon = databaseConnect();

$dataRead = New DataRead();
$bannerslist = $dataRead->banners_list($mycon);
$contentslist = $dataRead->articles_list($mycon, " AND a.category_id <> '8' ORDER BY rand() LIMIT 3", "");
$trailerslist = $dataRead->trailers_list($mycon, " ORDER BY rand() LIMIT 5", "");
$categorieslist = $dataRead->categories_list($mycon);
$sectioncategories_1 = "";
$sectioncategories_2 = "";
$sectioncategories_3 = "";
$sectioncontents_1 = array();
$sectioncontents_2 = array();
$sectioncontents_3 = array();
$count = 0;
foreach($categorieslist as $row)
{
    $count ++;
    if($row['category_id'] == "1") 
    {
        $sectioncategories_1 = $row['name'];
        $sectioncontents_1 = $dataRead->articles_listbycategory($mycon, $row['category_id'], " ORDER BY thedate LIMIT 3", "");
        continue;
    }
    if($row['category_id'] == "8") 
    {
        $sectioncategories_2 = $row['name'];
        $sectioncontents_2 = $dataRead->articles_listbycategory($mycon, $row['category_id'], " ORDER BY thedate LIMIT 2", "");
        continue;
    }
    if($row['category_id'] == "9") 
    {
        $sectioncategories_3 = $row['name'];
        $sectioncontents_3 = $dataRead->articles_listbycategory($mycon, $row['category_id'], " ORDER BY thedate LIMIT 3", "");
        continue;
    }
}

$breakingnewslist = $dataRead->breakingnews_list($mycon);

//$contentsdetails = $dataRead->contents_get($mycon);
//$newslist = $dataRead->news_list($mycon, " LIMIT 4", Array());
//$sermonslist = $dataRead->sermons_list($mycon, " LIMIT 3", Array());
//
//$month = date("m");
//
//$birthdaylist = $dataRead->birthdays_list($mycon, " LIMIT 8", Array());
//
//$teamlist = $dataRead->teams_list($mycon, "", "");
//
//$mp3sermonslist = $dataRead->mp3_sermons_list($mycon, " LIMIT 3", Array());
//
$showstartdate = "Starting: 01 Jul 2017 17:59";
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
					<div class="lx-body-content lx-body-content-horizontal">
						<!-- Main Slide -->
						<div class="lx-main-slide">
							<div class="lx-main-slide-bloc">
								<div class="lx-g1-f">
									<!-- Slide Item -->
									<div class="lx-main-slide-item" id="banner_slider_1" style="height: 430px; overflow: hidden;">
<?php
foreach(array_reverse($bannerslist) as $row)
{
    if($row['placement'] != "first") continue;
?>            
										<div class="lx-main-slide-item-img">
                                                                                    <a href="<?php echo $row['link'] ?>" target="_blank"><img src="pictures/banners/<?php echo $row['banner_id'] ?>.jpg" alt="" style="height2: 400px" /></a>
										</div>
<?php
}
?>
									</div>
								</div>
								<div class="lx-clear-fix"></div>
							</div>
						</div>
						<!-- Main Slide -->
						<div class="lx-main-slide">
							<div class="lx-main-slide-bloc">
								<div class="lx-g1-f">
									<!-- Slide Item -->
									<div class="lx-main-slide-item" id="banner_slider_2" style="height: 430px; overflow: hidden;">
<?php
foreach(array_reverse($bannerslist) as $row)
{
    if($row['placement'] != "second") continue;
?>            
										<div class="lx-main-slide-item-img">
                                                                                    <a href="<?php echo $row['link'] ?>" target="_blank"><img src="pictures/banners/<?php echo $row['banner_id'] ?>.jpg" alt="" style="height2: 400px" /></a>
										</div>
<?php
}
?>
									</div>
								</div>
<?php
foreach($contentslist as $row)
{
    //var_dump($row);
?>            
								<div class="lx-g3-f">
									<!-- Slide Item -->
									<div class="lx-main-slide-item" style="height: 225px; overflow: hidden;">
										<div class="lx-main-slide-item-img">
											<a href="contents-view.php?code=<?php echo $row['article_id'] ?>"><img src="pictures/articles/<?php echo $row['article_id'] ?>_image.jpg" alt="<?php echo $row['headline'] ?>" /></a>
										</div>
										<div class="lx-main-slide-item-shadow">
											<div class="lx-main-slide-item-border">
												<div class="lx-main-slide-item-text">
													<h2><a href="contents-view.php?code=<?php echo $row['article_id'] ?>"><?php echo $row['headline'] ?></a></h2>
													<span class="lx-main-slide-item-category"><?php echo $row['categoryname'] ?></span>
													<span class="lx-main-slide-item-date"><i class="fa fa-clock-o"></i>&nbsp;<?php echo $showstartdate; //date("d M Y H:i",strtotime($row['thedate'])) ?></span>
												</div>
											</div>
										</div>
									</div>
								</div>
<?php
}
?>
								<div class="lx-clear-fix"></div>
							</div>
						</div>
						<div class="lx-g1-f">
							<!-- Breaking News -->
							<div class="lx-breaking-news lx-width-100per">
								<span>BREAKING NEWS</span>
								<ul>
<?php
foreach($breakingnewslist as $row)
{
?>
                                                                    <li><a href="<?php echo $row['link'] ?>" target="_blank"><?php echo $row['name'] ?></a></li>
<?php
}
?>
								</ul>
								<div class="lx-clear-fix"></div>
							</div>						
						</div>
						<div class="lx-g3-2-f">
							<!-- Main Content -->
							<div class="lx-body-main-content">
								<!-- News Container -->
								<div class="lx-news-container">
									<!-- News Container Title -->
									<div class="lx-news-container-title">
										<h2><?php echo $sectioncategories_1 ?></h2>
									</div>
									<!-- News Container Content -->
									<div class="lx-news-container-content">
<?php
foreach($sectioncontents_1 as $row)
{
?>
										<div class="lx-g3-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-13">
												<div class="lx-news-item-img">
													<a href="contents-view.php?code=<?php echo $row['article_id'] ?>"><img src="pictures/articles/<?php echo $row['article_id'] ?>_image.jpg" alt="<?php echo $row['headline'] ?>" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="contents-view.php?code=<?php echo $row['article_id'] ?>"><?php echo $row['headline'] ?></a></h3>
													<span><i class="fa fa-clock-o"></i>&nbsp;<?php echo $showstartdate; //date("d M Y H:i",strtotime($row['thedate'])) ?></span>
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
								<!-- News Container -->
								<div class="lx-news-container">
									<!-- News Container Title -->
									<div class="lx-news-container-title">
										<h2><?php echo $sectioncategories_2 ?></h2>
									</div>
									<!-- News Container Content -->
									<div class="lx-news-container-content">
<?php
foreach($sectioncontents_2 as $row)
{
?>
										<div class="lx-g2-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-10">
												<div class="lx-news-item-img large">
													<a href="contents-view.php?code=<?php echo $row['article_id'] ?>"><img src="pictures/articles/<?php echo $row['article_id'] ?>_image.jpg" alt="<?php echo $row['headline'] ?>" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="contents-view.php?code=<?php echo $row['article_id'] ?>"><?php echo $row['headline'] ?></a></h3>
													<span style="display: none;"><i class="fa fa-clock-o"></i>&nbsp;<?php echo $showstartdate; //date("d M Y H:i",strtotime($row['thedate'])) ?></span>
													<p style="height: 5px;"><?php //echo $row['caption'] ?></p>
												</div>											
											</div>
										</div>
<?php
}
?>
										<div class="lx-clear-fix"></div>
									</div>
								</div>
								<!-- News Container -->
								<div class="lx-news-container">
									<!-- News Container Title -->
									<div class="lx-news-container-title">
										<h2><?php echo $sectioncategories_3 ?></h2>
									</div>
									<!-- News Container Content -->
									<div class="lx-news-container-content">
<?php
foreach($sectioncontents_3 as $row)
{
?>
										<div class="lx-g3-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-13">
												<div class="lx-news-item-img">
													<a href="contents-view.php?code=<?php echo $row['article_id'] ?>"><img src="pictures/articles/<?php echo $row['article_id'] ?>_image.jpg" alt="<?php echo $row['headline'] ?>" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="contents-view.php?code=<?php echo $row['article_id'] ?>"><?php echo $row['headline'] ?></a></h3>
													<span><i class="fa fa-clock-o"></i>&nbsp;<?php echo $showstartdate; //date("d M Y H:i",strtotime($row['thedate'])) ?></span>
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
								<!-- News Container -->
								<div class="lx-news-container">
									<!-- News Container Title -->
									<div class="lx-news-container-title">
										<h2>TRAILERS</h2>
									</div>
									<!-- News Container Content -->
									<div class="lx-news-container-content">
										<div class="lx-g2-f">
											<!-- News Item Sticky -->
<?php
foreach($trailerslist as $row)
{
    $picture = "pictures/trailers/{$row['trailer_id']}.jpg";
    if(!file_exists($picture)) $picture = "http://img.youtube.com/vi/".getYouTubeVideoId($row['youtube'])."/0.jpg";
    //var_dump($row);
?>            
											<div class="lx-news-item lx-sticky lx-mr-10">
												<div class="lx-news-item-img" style="height: 270px;">
                                                                                                    <a href="<?php echo $row['youtube'] ?>" target="_blank"><img src="<?php echo $picture ?>" alt="<?php echo $row['headline'] ?>" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3 style="height: 50px"><a href="<?php echo $row['youtube'] ?>" target="_blank"><?php echo $row['headline'] ?></a></h3>
													<p><?php echo $row['caption'] ?></p>
												</div>											
											</div>
<?php
    break;
}
?>
										</div>
										<div class="lx-g2-f">
											<!-- News Item -->
<?php
$first = true;
foreach($trailerslist as $row)
{
    if($first)
    {
        $first = false;
        continue;
    }
    $picture = "pictures/trailers/{$row['trailer_id']}.jpg";
    if(!file_exists($picture)) $picture = "http://img.youtube.com/vi/".getYouTubeVideoId($row['youtube'])."/0.jpg";
    
    //var_dump($row);
?>            
											<div class="lx-news-item lx-news-item-minimal lx-ml-10">
												<div class="lx-news-item-img small lx-width-120">
													<a href="trailers-view.php?code=<?php echo $row['trailer_id'] ?>"><img src="<?php echo $picture ?>" alt="<?php echo $row['headline'] ?>" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="trailers-view.php?code=<?php echo $row['trailer_id'] ?>"><?php echo $row['headline'] ?></a></h3>
													<span><i class="fa fa-clock-o"></i>&nbsp;<?php echo $showstartdate; //$showstartdate; //date("d M Y H:i",strtotime($row['thedate'])) ?></span>
												</div>
												<div class="lx-clear-fix"></div>
											</div>
<?php
}
?>
                                                                                </div>
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
			<!-- Popup -->
			<div class="lx-popup">
				<a href="javascript:;"><i class="fa fa-remove"></i></a>
				<div class="lx-popup-inside">
					<a href="javascript:;"><i class="fa fa-caret-left"></i></a>
					<a href="javascript:;"><i class="fa fa-caret-right"></i></a>
					<div class="lx-popup-content">
						<div class="lx-popup-image">
							<img src="#" alt="image title here" />
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