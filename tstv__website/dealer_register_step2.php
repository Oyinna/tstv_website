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

//check if code was specified
if(!isset($_GET['code']) || $_GET['code'] == "")
{
    showAlert("No registration was specified. Please fill the new registration.");
    openPage("dealer_register.php");
    exit;
}

$code = $_GET['code'];

$mycon = databaseConnect();
require_once("dealer/inc_dbfunctions.php");
$dataRead = New DataRead();

$registrationdetails = $dataRead->registrations_getpending($mycon,$code);

if($registrationdetails == false)
{
    showAlert("Invalid registration.");
    openPage("dealer_register.php");
    exit;
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
										<h1>TStv Dealer Registration > Attach files</h1>
                      <table width="100%" border="1" class="details">
                        <tr>
                          <td width="25%" class="question">Registration Id</td>
                          <td width="75%"><?php echo $registrationdetails['registration_id'] ?></td>
                        </tr>
                        <tr>
                          <td width="25%" class="question">Dealer type</td>
                          <td width="75%"><?php echo $registrationdetails['type'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Company name</td>
                          <td><?php echo $registrationdetails['company'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Username</td>
                          <td><?php echo $registrationdetails['username'] ?></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" class="question"> Attachments (click to enlarge)</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                
                                <?php
                                $files = "cac1,cac2,cac3,file_office1,file_office2,file_office3,file_passport";
                                foreach(explode(",",$files) as $file)
                                {
                                    $filename = "files/registrations/".$registrationdetails['registration_id']."_".$file.".jpg";
                                    //echo $filename;
                                    if(file_exists($filename)) {
                                ?>
                                <div style="width: 150px; height: 150px; float: left; margin: 2px; overflow: hidden"><a href="<?php echo $filename ?>" target="_blank"><img src="image.php?image=<?php echo $filename ?>&s=400" width="100%" /></a></div>
                                <?php
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" class="question"> Dealer Information</td>
                        </tr>
                        <tr>
                          <td class="question">Contact person</td>
                          <td><?php echo $registrationdetails['surname'].", ".$registrationdetails['firstname']." ".$registrationdetails['othernames'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Address</td>
                          <td><?php echo $registrationdetails['address'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Email</td>
                          <td><?php echo $registrationdetails['email'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Phone</td>
                          <td><?php echo $registrationdetails['phone'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Names of owners</td>
                          <td><?php echo $registrationdetails['owner1'].", ".$registrationdetails['owner2'].", ".$registrationdetails['owner3'].", ".$registrationdetails['owner4'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Type of business</td>
                          <td><?php echo $registrationdetails['business_type'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">How long in business</td>
                          <td><?php echo $registrationdetails['business_duration'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">No of staff</td>
                          <td><?php echo $registrationdetails['business_staff'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Takeoff quantity</td>
                          <td><?php echo $registrationdetails['quantity'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Capital</td>
                          <td><?php echo $registrationdetails['amount'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Knowledge of market</td>
                          <td><?php echo $registrationdetails['localmarket'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Office space</td>
                          <td><?php echo $registrationdetails['office'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">City</td>
                          <td><?php echo $registrationdetails['city'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">State</td>
                          <td><?php echo $registrationdetails['state'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">experience in PayTV sales</td>
                          <td><?php echo $registrationdetails['experience'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">currently marketting any DTH</td>
                          <td><?php echo $registrationdetails['marketting'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Number of installers</td>
                          <td><?php echo $registrationdetails['installers'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Notes</td>
                          <td><?php echo $registrationdetails['notes'] ?></td>
                        </tr>
                      </table>
                                                                                                      
                    <form action="dealer/actionmanager.php" method="post" target="actionframe" role="form" enctype="multipart/form-data" style="max-width: 800px">
                        <div class="form-group oneline">
                          <label for="type">Select dealership type*</label>
                            <select name="type" id="marketting" class="form-control">
                                  <option value="">--Select--</option>
                                  <option value="Super Dealer">Super Dealer</option>
                                  <option value="Sub Dealer">Sub Dealer</option>
                                  <option value="Retailer">Retailer</option>
                            </select>
                        </div>
                        <div class="form-group oneline three">
                          <label for="surname">Surname*</label>
                          <input name="surname" type="text" class="form-control" id="surname">
                        </div>
                        <div class="form-group oneline three">
                          <label for="firstname">First name*</label>
                          <input name="firstname" type="text" class="form-control" id="firstname">
                        </div>
                        <div class="form-group oneline three">
                          <label for="othernames">Othername</label>
                          <input name="othernames" type="text" class="form-control" id="othernames">
                        </div>
                        <div class="form-group oneline">
                          <label for="company">Registered Business name*</label>
                          <input name="company" type="text" class="form-control" id="company">
                        </div>
                        <div class="form-group">
                          <label for="address">Business Address*</label>
                          <textarea name="address" rows="3" class="form-control" id="address"></textarea>
                        </div>
                        <div class="form-group oneline two">
                          <label for="phone">Telephone*</label>
                          <input name="phone" type="text" class="form-control" id="phone">
                        </div>
                        <div class="form-group oneline two">
                          <label for="email">Email Address*</label>
                          <input name="email" type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group oneline">
                          <label for="owner1">Names of owners of the business*</label>
                        </div>
                        <div class="form-group oneline two">
                          <label for="owner1">1</label>
                          <input name="owner1" type="text" class="form-control" id="owner1">
                        </div>
                        <div class="form-group oneline two">
                          <label for="owner2">2</label>
                          <input name="owner2" type="text" class="form-control" id="owner2">
                        </div>
                        <div class="form-group oneline two">
                          <label for="owner3">3</label>
                          <input name="owner3" type="text" class="form-control" id="owner3">
                        </div>
                        <div class="form-group oneline two">
                          <label for="owner4">4</label>
                          <input name="owner4" type="text" class="form-control" id="owner4">
                        </div>
                        <div class="form-group oneline">
                          <label for="business_type">Type of business you are into*</label>
                          <input name="business_type" type="text" class="form-control" id="business_type">
                        </div>
                        <div class="form-group oneline two">
                          <label for="business_duration">How long has the business been*</label>
                          <input name="business_duration" type="text" class="form-control" id="business_duration">
                        </div>
                        <div class="form-group oneline two">
                          <label for="business_staff">How many staff do you have*</label>
                          <input name="business_staff" type="number" class="form-control" id="business_staff">
                        </div>
                        <div class="form-group oneline two">
                          <label for="quantity">Current volume takeof quantity*</label>
                          <input name="quantity" type="number" class="form-control" id="quantity">
                        </div>
                        <div class="form-group oneline two">
                          <label for="amount">Kindly state the available capital for the business*</label>
                          <input name="amount" type="number" class="form-control" id="amount">
                        </div>
                        <div class="form-group oneline two">
                          <label for="localmarket">Do you have knowledge of the local market</label>
                          <input name="localmarket" type="text" class="form-control" id="localmarket">
                        </div>
                        <div class="form-group oneline two">
                          <label for="office">Do you have office space</label>
                            <select name="office" id="office" class="form-control">
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group oneline two">
                          <label for="city">City*</label>
                          <input name="city" type="text" class="form-control" id="city">
                        </div>
                        <div class="form-group oneline two">
                          <label for="state">State*</label>
                            <select name="state" id="state" class="form-control">
                                  <option value="" selected="selected">- Select -</option>
                <?php foreach(getStatesList() as $state) { ?>
                                  <option value="<?php echo $state ?>"><?php echo $state ?></option>
                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group oneline two">
                          <label for="experience">Any experience in PayTV sales?</label>
                            <select name="experience" id="experience" class="form-control">
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group oneline two">
                          <label for="marketting">Are you currently marketting any DTH?</label>
                            <select name="marketting" id="marketting" class="form-control">
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group oneline">
                          <label for="installers">How many installers do you have?*</label>
                          <input name="installers" type="number" class="form-control" id="installers" value="0">
                        </div>
                        <div class="form-group oneline four">
                          <label for="file_cac1">CAC Certificate</label>
                          <input name="file_cac1" type="file" class="form-control" id="file_cac1">
                        </div>
                        <div class="form-group oneline four">
                          <label for="file_cac2">CAC Form 2</label>
                          <input name="file_cac2" type="file" class="form-control" id="file_cac2">
                        </div>
                        <div class="form-group oneline four">
                          <label for="file_cac3">CAC Form 7</label>
                          <input name="file_cac3" type="file" class="form-control" id="file_cac3">
                        </div>
                        <div class="form-group oneline four">
                          <label for="file_passport">Passport photo*</label>
                          <input name="file_passport" type="file" class="form-control" id="file_passport">
                        </div>
                        <div class="form-group oneline four">
                          <label for="file_office1">Office picture</label>
                          <input name="file_office1" type="file" class="form-control" id="file_office1">
                        </div>
                        <div class="form-group oneline four">
                          <label for="file_office2">Office picture</label>
                          <input name="file_office2" type="file" class="form-control" id="file_office2">
                        </div>
                        <div class="form-group oneline four">
                          <label for="file_office3">Office picture</label>
                          <input name="file_office3" type="file" class="form-control" id="file_office3">
                        </div>
                        <div class="form-group oneline four">
                          <label for="file_office4">Office picture</label>
                          <input name="file_office4" type="file" class="form-control" id="file_office4">
                        </div>
                        <div class="form-group">
                          <label for="notes">Notes</label>
                          <textarea name="notes" rows="3" class="form-control" id="notes"></textarea>
                        </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <input name="command" type="hidden" id="command" value="register">
                      </div>
                      
                    </form>
                          
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
													<a href="contents-view.php?code=<?php echo $row['article_id'] ?>"><img src="image.php?image=pictures/articles/<?php echo $row['article_id'] ?>_image.jpg&s=400" alt="<?php echo $row['headline'] ?>" /></a>
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