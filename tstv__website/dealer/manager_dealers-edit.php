<?php
require_once("config.php");

$currentuserid = getCookie("userid");
if(getCookie("managerlogin") != "YES")
{
    showAlert("You do not have access to perform this action");
    openPage("index.php");
    exit;
}

//check if code was specified
if(!isset($_GET['code']) || $_GET['code'] == "")
{
	showAlert("No dealer was specified. Please click on the dealer to view.");
	openPage("manager_dealers-list.php");
	exit;
}

$code = $_GET['code'];

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

$dealerdetails = $dataRead->dealers_get($mycon,$code);

if($dealerdetails == false || $dealerdetails['manager_id'] != $currentuserid)
{
	showAlert("The details of the specified dealer could not be loaded. Please click on the dealer to view.");
	openPage("manager_dealers-list.php");
	exit;
}



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
        <?php require("manager_inc_sidebar.php"); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php echo $dealerdetails['company'] ?></h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                    <div class="row">
                        <div class="col-md-3">
                
                            <!-- Block buttons -->
                            <?php require("manager_inc-options-dealers.php") ?>
                        </div>
                        <div class="col-md-8">
                    
                        <div class="panel panel-default">
                    <div class="panel-heading">
                      Update Dealer Information
                    </div>
                      <div class="panel-body">
                    <form action="actionmanager.php" method="post" target="actionframe" role="form" enctype="multipart/form-data">
                        <div class="form-group oneline">
                          <label for="company">Company Name</label>
                          <input name="company" type="text" class="form-control" id="company" value="<?php echo $dealerdetails['company'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="surname">Contact Surname</label>
                          <input name="surname" type="text" class="form-control" id="surname" value="<?php echo $dealerdetails['surname'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="firstname">Contact First name</label>
                          <input name="firstname" type="text" class="form-control" id="firstname" value="<?php echo $dealerdetails['firstname'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="address">Address</label>
                          <textarea name="address" rows="3" class="form-control" id="address"><?php echo $dealerdetails['address'] ?></textarea>
                        </div>
                        <div class="form-group oneline three">
                          <label for="city">City</label>
                          <input name="city" type="text" class="form-control" id="city" value="<?php echo $dealerdetails['city'] ?>">
                        </div>
                        <div class="form-group oneline three">
                          <label for="state">State</label>
                            <select name="state" id="state" class="form-control">
                                  <option value="" selected="selected">- Select -</option>
                <?php foreach(getStatesList() as $state) { ?>
                                  <option value="<?php echo $state ?>" <?php if($state == $dealerdetails['state']) echo "selected" ?>><?php echo $state ?></option>
                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group oneline three">
                          <label for="country">Country</label>
                          <input name="country" type="text" class="form-control" id="country" value="<?php echo $dealerdetails['country'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="email">Email Address</label>
                          <input name="email" type="text" class="form-control" id="email" value="<?php echo $dealerdetails['email'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="phone">Phone number</label>
                          <input name="phone" type="text" class="form-control" id="phone" value="<?php echo $dealerdetails['phone'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="notes">Notes</label>
                          <textarea name="notes" rows="3" class="form-control" id="notes"></textarea>
                        </div>
                        <div class="form-group oneline two">
                          <label for="username">Login username</label>
                          <input name="username" type="text" class="form-control" id="username" value="<?php echo $dealerdetails['username'] ?>" disabled>
                        </div>
                        <div class="form-group oneline two">
                          <label for="password">Password (leave blank unless changing)</label>
                          <input name="password" type="password" class="form-control" id="password">
                        </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update Dealer</button>
                        <input name="dealer_id" type="hidden" id="dealer_id" value="<?php echo $dealerdetails['dealer_id'] ?>">
                        <input name="command" type="hidden" id="command" value="manager_dealers-edit">
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
