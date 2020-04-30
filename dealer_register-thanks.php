<?php
require_once("config.php");
require_once("inc_dbfunctions.php");
$mycon = databaseConnect();
$myconDealers = databaseConnectDealers();

$dataRead = New DataRead();

$contentsdetails = $dataRead->contents_get($mycon);

$selectedcountry = "Nigeria";
$selectedstate = "Lagos";
if(isset($_POST['country'])) $selectedcountry = $_POST['country'];
if(isset($_POST['state'])) $selectedstate = $_POST['state'];
$myrec = $myconDealers->prepare("SELECT * FROM `retailers` WHERE `country` = :country AND `state` = :state ORDER BY `company` ASC");
$myrec->bindValue(":country",$selectedcountry);
$myrec->bindValue(":state",$selectedstate);
$myrec->execute();
$retailerslist = $myrec->fetchAll(PDO::FETCH_ASSOC);
$myrec = $myconDealers->query("SELECT DISTINCT(`country`) FROM `retailers` ORDER BY `country` ASC");
$countrylist = $myrec->fetchAll(PDO::FETCH_ASSOC);
$myrec = $myconDealers->query("SELECT `state`, `country` FROM `retailers` ORDER BY `state` ASC");
$stateslist = $myrec->fetchAll(PDO::FETCH_ASSOC);
$contentslist = $dataRead->articles_list($mycon, " LIMIT 8", Array());

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
                <link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/general_style.css">
		<!-- Main Style of the template -->
		<link rel="stylesheet" href="css/main_style.css" title="main">
		<!-- Landing Page Style -->
		<link rel="stylesheet" href="css/reset_style.css">
		<!-- Fav Icon -->
                <link rel="icon" type="image/png" href="images/favicon.png" />
                <style>
                    .lx-news-item-text {
                        height: 200px;
                        overflow: auto;
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
						<div class="lx-g1-f">
							<!-- Main Content -->
							<div class="lx-body-main-content">
								<!-- Single Container -->
								<div class="lx-single-post-container">
									<!-- Page Trees -->
									<div class="lx-page-tree">
										<ul>
											<li><a href="index.php">Home</a></li>
											<li><i class="fa fa-caret-right"></i></li>
											<li><a href="#">Dealers registration</a></li>
										</ul>
										<div class="lx-clear-fix"></div>
									</div>
									<!-- Single Post Content -->
									<div class="lx-single-post-content" style="padding-left: 20px;">
										<h1 style="color: green;">Registration Submitted for review</h1>
                                                                                <p>Thank you for your application. Upon verification of information sent, our sales team will contact you on the next step within 72 hours</p>
                          <p>Thanks.</p>
										<!-- Share -->
									<!-- News Container Content -->
										<div class="lx-clear-fix" style="height: 30px"></div>
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
										<div class="lx-g4-f">
											<!-- News Item Sticky -->
											<div class="lx-news-item lx-mr-13">
												<div class="lx-news-item-img">
													<a href="contents-view.php?code=<?php echo $row['article_id'] ?>"><img src="pictures/articles/<?php echo $row['article_id'] ?>_image.jpg" alt="<?php echo $row['headline'] ?>" /></a>
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
                    $("option.stateslist").hide();
                    $("option[data-country='<?php echo $selectedcountry ?>'").show();
                    $(document).on("change","#country",function(){
                        $("option.stateslist").hide();
                        $("option[data-country='" + $(this).val() + "'").show();
                        $("#state").val("");
                    });
                </script>
                
	</body>
</html>