<?php
require_once("config.php");
require_once("inc_dbfunctions.php");
$mycon = databaseConnect();

$dataRead = New DataRead();

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