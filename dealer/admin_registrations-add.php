<?php
require_once("config.php");
$currentuserid = getCookie("userid");
if(getCookie("adminlogin") != "YES")
{
    showAlert("You do not have access to perform this action");
    openPage("index.php");
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
    <style>
        /* modified for E-save */
.form-group.oneline.five {
	margin-right:1%;
	width:19%;
	float:left;
}

    </style>
</head>
<body>
    <div id="wrapper">
        <?php require("admin_inc_sidebar.php"); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>New Dealer registration</h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-md-12">
                    
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      Create New Registration
                    </div>
                    <!-- /.box-header -->
                    <div class="panel-body table-responsive">
                       <form action="actionmanager.php" method="post" target="actionframe" role="form" enctype="multipart/form-data" style="max-width: 800px">
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
                        <button type="submit" class="btn btn-primary">Ssave</button>
                        <input name="command" type="hidden" id="command" value="admin_registrations-add">
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
            
<link rel="stylesheet" type="text/css" href="jquery.datepick/jquery.datepick.css"> 
<script type="text/javascript" src="jquery.datepick/jquery.plugin.js"></script> 
<script type="text/javascript" src="jquery.datepick/jquery.datepick.js"></script>     
<script type="text/javascript">
$('.datepicker').datepick({dateFormat: 'yyyy-mm-dd'});
</script>   

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
        </script>
    
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
