<?php
require_once("config.php");

$currentuserid = getCookie("userid");
if(getCookie("adminlogin") != "YES")
{
    showAlert("You do not have access to perform this action");
    openPage("index.php");
    exit;
}

//check if code was specified
if(!isset($_GET['code']) || $_GET['code'] == "")
{
	showAlert("No registration was specified. Please click on the registration to view.");
	openPage("admin_registrations-list.php");
	exit;
}

$code = $_GET['code'];

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

$registrationdetails = $dataRead->registrations_get($mycon,$code);

if($registrationdetails == false)
{
	showAlert("The details of the specified registration could not be loaded. Please click on the registration to view.");
	openPage("admin_registrations-list.php");
	exit;
}

//var_dump($registrationdetails);


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo pageTitle() ?></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

        <script src="htmlEditor.js" type="text/javascript"></script>
        <script type="text/javascript">bkLib.onDomLoaded(function() {
                //new nicEditor().panelInstance('txtName');
                new nicEditor({iconsPath : 'htmlEditor.gif'}).panelInstance('message_email');
        });
        </script>        
</head>
<body>
    <div id="wrapper">
        <?php require("admin_inc_sidebar.php"); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php echo $registrationdetails['company'] ?></h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                    <div class="row">
                        <div class="col-md-3">
                
                            <!-- Block buttons -->
                            <?php require("admin_inc-options-registrations.php") ?>
                        </div>
                        <div class="col-md-8">
                    
                        <div class="panel panel-default">
                    <div class="panel-heading">
                      Update Retailer Information
                    </div>
                      <div class="panel-body">
                    <form action="actionmanager.php" method="post" target="actionframe" role="form" enctype="multipart/form-data">
                        <div class="form-group oneline">
                          <label for="type">Select dealership type*</label>
                            <select name="type" id="type" class="form-control">
                                  <option value="Super Dealer" <?php if($registrationdetails['type'] == "Super Dealer") echo "selected" ?>>Super Dealer</option>
                                  <option value="Sub Dealer" <?php if($registrationdetails['type'] == "Sub Dealer") echo "selected" ?>>Sub Dealer</option>
                                  <option value="Retailer" <?php if($registrationdetails['type'] == "Retailer") echo "selected" ?>>Retailer</option>
                            </select>
                        </div>
                        <div class="form-group oneline three">
                          <label for="surname">Surname*</label>
                          <input name="surname" type="text" class="form-control" id="surname" value="<?php echo $registrationdetails['surname'] ?>">
                        </div>
                        <div class="form-group oneline three">
                          <label for="firstname">First name*</label>
                          <input name="firstname" type="text" class="form-control" id="firstname" value="<?php echo $registrationdetails['firstname'] ?>">
                        </div>
                        <div class="form-group oneline three">
                          <label for="othernames">Othername</label>
                          <input name="othernames" type="text" class="form-control" id="othernames" value="<?php echo $registrationdetails['othernames'] ?>">
                        </div>
                        <div class="form-group oneline">
                          <label for="company">Registered Business name*</label>
                          <input name="company" type="text" class="form-control" id="company" value="<?php echo $registrationdetails['company'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="address">Business Address*</label>
                          <textarea name="address" rows="3" class="form-control" id="address"><?php echo $registrationdetails['address'] ?></textarea>
                        </div>
                        <div class="form-group oneline two">
                          <label for="phone">Telephone*</label>
                          <input name="phone" type="text" class="form-control" id="phone" value="<?php echo $registrationdetails['phone'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="email">Email Address*</label>
                          <input name="email" type="text" class="form-control" id="email" value="<?php echo $registrationdetails['email'] ?>">
                        </div>
                        <div class="form-group oneline">
                          <label for="owner1">Names of owners of the business*</label>
                        </div>
                        <div class="form-group oneline two">
                          <label for="owner1">1</label>
                          <input name="owner1" type="text" class="form-control" id="owner1" value="<?php echo $registrationdetails['owner1'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="owner2">2</label>
                          <input name="owner2" type="text" class="form-control" id="owner2" value="<?php echo $registrationdetails['owner2'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="owner3">3</label>
                          <input name="owner3" type="text" class="form-control" id="owner3" value="<?php echo $registrationdetails['owner3'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="owner4">4</label>
                          <input name="owner4" type="text" class="form-control" id="owner4" value="<?php echo $registrationdetails['owner4'] ?>">
                        </div>
                        <div class="form-group oneline">
                          <label for="business_type">Type of business you are into*</label>
                          <input name="business_type" type="text" class="form-control" id="business_type" value="<?php echo $registrationdetails['business_type'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="business_duration">How long has the business been*</label>
                          <input name="business_duration" type="text" class="form-control" id="business_duration" value="<?php echo $registrationdetails['business_duration'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="business_staff">How many staff do you have*</label>
                          <input name="business_staff" type="number" class="form-control" id="business_staff" value="<?php echo $registrationdetails['business_staff'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="quantity">Current volume takeof quantity*</label>
                          <input name="quantity" type="number" class="form-control" id="quantity" value="<?php echo $registrationdetails['quantity'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="amount">Kindly state the available capital for the business*</label>
                          <input name="amount" type="number" class="form-control" id="amount" value="<?php echo $registrationdetails['amount'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="localmarket">Do you have knowledge of the local market</label>
                          <input name="localmarket" type="text" class="form-control" id="localmarket" value="<?php echo $registrationdetails['localmarket'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="office">Do you have office space</label>
                            <select name="office" id="office" class="form-control">
                                  <option value="Yes" <?php if($registrationdetails['office'] == "Yes") echo "selected" ?>>Yes</option>
                                  <option value="No" <?php if($registrationdetails['office'] == "No") echo "selected" ?>>No</option>
                            </select>
                        </div>
                        <div class="form-group oneline two">
                          <label for="city">City*</label>
                          <input name="city" type="text" class="form-control" id="city" value="<?php echo $registrationdetails['city'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="state">State*</label>
                            <select name="state" id="state" class="form-control">
                                  <option value="" selected="selected">- Select -</option>
                <?php foreach(getStatesList() as $state) { ?>
                                  <option value="<?php echo $state ?>" <?php if($registrationdetails['office'] == "Yes") echo "selected" ?>><?php echo $state ?></option>
                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group oneline two">
                          <label for="experience">Any experience in PayTV sales?</label>
                            <select name="experience" id="experience" class="form-control">
                                  <option value="Yes" <?php if($registrationdetails['experience'] == "Yes") echo "selected" ?>>Yes</option>
                                  <option value="No" <?php if($registrationdetails['experience'] == "No") echo "selected" ?>>No</option>
                            </select>
                        </div>
                        <div class="form-group oneline two">
                          <label for="marketting">Are you currently marketting any DTH?</label>
                            <select name="marketting" id="marketting" class="form-control">
                                  <option value="Yes" <?php if($registrationdetails['marketting'] == "Yes") echo "selected" ?>>Yes</option>
                                  <option value="No" <?php if($registrationdetails['marketting'] == "No") echo "selected" ?>>No</option>
                            </select>
                        </div>
                        <div class="form-group oneline">
                          <label for="installers">How many installers do you have?*</label>
                          <input name="installers" type="number" class="form-control" id="installers" value="<?php echo $registrationdetails['installers'] ?>">
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
                          <textarea name="notes" rows="3" class="form-control" id="notes"><?php echo $registrationdetails['notes'] ?></textarea>
                        </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update Registrations</button>
                        <input name="registration_id" type="hidden" id="registration_id" value="<?php echo $registrationdetails['registration_id'] ?>">
                        <input name="command" type="hidden" id="command" value="admin_registrations-edit">
                      </div>
                      
                    </form>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    </div>
                    
                    </div>
                 <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>

        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#tbl_lgas").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
            
$("#message_type").on("change",function(){
    if($(this).val() == "sms")
    {
        $("#div_message_sms").show();
        $("#div_message_email").hide();
    }
    else
    {
        $("#div_message_sms").hide();
        $("#div_message_email").show();
    }
})            
        </script>
    
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
