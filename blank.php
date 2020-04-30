<?php
require_once("config.php");
require_once("inc_dbfunctions.php");
$mycon = databaseConnect();

$dataRead = New DataRead();
$bannerslist = $dataRead->banners_list($mycon);
$contentslist = $dataRead->articles_list($mycon, " ORDER BY rand() LIMIT 3", "");
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
    if($count == 1) 
    {
        $sectioncategories_1 = $row['name'];
        $sectioncontents_1 = $dataRead->articles_listbycategory($mycon, $row['category_id'], " ORDER BY thedate LIMIT 3", "");
        continue;
    }
    if($count == 2) 
    {
        $sectioncategories_2 = $row['name'];
        $sectioncontents_2 = $dataRead->articles_listbycategory($mycon, $row['category_id'], " ORDER BY thedate LIMIT 2", "");
        continue;
    }
    if($count == 3) 
    {
        $sectioncategories_3 = $row['name'];
        $sectioncontents_3 = $dataRead->articles_listbycategory($mycon, $row['category_id'], " ORDER BY thedate LIMIT 3", "");
        continue;
    }
}

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
											<li><a href="#">Home</a></li>
											<li><i class="fa fa-caret-right"></i></li>
											<li><a href="#">World</a></li>
											<li><i class="fa fa-caret-right"></i></li>
											<li><strong>Trump's 'Muslim ban' is not an exception in US history</strong></li>
										</ul>
										<div class="lx-clear-fix"></div>
									</div>
									<!-- Single Post Content -->
									<div class="lx-single-post-content">
										<h1>Trump's 'Muslim ban' is not an exception in US history</h1>
										<div class="lx-single-post-img">
											<img src="http://placehold.it/1650x1100" alt="alternative title" />
											<figcaption>Trump's 'Muslim ban' is not an exception in US history</figcaption>
										</div>										
										<p>Even with his name splashed in the headlines and his story cast as "breaking news", the last thing this is about is Milo Yiannopoulos. To precis, in case you sensibly missed the whole thing: this hate-spouting, Donald Trump-supporting, far-right trollster had a lucrative book deal cancelled and a major speaking engagement at the American Conservative Union's CPAC conference revoked after comments he made, apparently saying sex between "younger boys" and older men was OK, surfaced online.</p>
										<p>He then resigned from the far-right Breitbart news - following reports that some of his colleagues had threatened to quit if he wasn't sacked over those comments seeming to condone paedophilia (though Milo says they were taken out of context).</p>
										<!-- Share -->
										<div class="lx-share">
											<?php include("inc_social_share.php") ?>
											<div class="lx-clear-fix"></div>											
										</div>
									</div>
									<!-- Tags -->
									<div class="lx-tags">
										<ul>
											<li><span>Tags:</span></li>
											<li><a href="#">Post</a></li>
											<li><a href="#">News</a></li>
											<li><a href="#">World</a></li>
											<li><a href="#">Photos</a></li>
											<li><a href="#">Blog</a></li>
											<li><a href="#">Magazin</a></li>
										</ul>
										<div class="lx-clear-fix"></div>
									</div>
									<!-- Author -->
								</div>	
								<!-- News Container -->
								<div class="lx-news-container">
									<!-- News Container Content -->
									<div class="lx-news-container-content">
										<div class="lx-g3-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-13">
												<div class="lx-news-item-img">
													<a href="#"><img src="http://placehold.it/1650x1100" alt="alternative title" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="single-post-hero-fullwidth-1.html">Wilkinson's advice on winning the England cap</a></h3>
												</div>											
											</div>
										</div>
										<div class="lx-g3-f">
											<!-- News Item -->
											<div class="lx-news-item lx-mrl-6">
												<div class="lx-news-item-img">
													<a href="#"><img src="http://placehold.it/1650x1100" alt="alternative title" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="single-post-hero-fullwidth-1.html">2024 Olympics: Budapest to drop bid to host Games</a></h3>
												</div>											
											</div>
										</div>
										<div class="lx-g3-f">
											<!-- News Item -->
											<div class="lx-news-item lx-ml-13">
												<div class="lx-news-item-img">
													<a href="#"><img src="http://placehold.it/1650x1100" alt="alternative title" /></a>
												</div>
												<div class="lx-news-item-text">
													<h3><a href="single-post-hero-fullwidth-1.html">New Formula 1 cars will be a 'massive challenge'</a></h3>
												</div>											
											</div>
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