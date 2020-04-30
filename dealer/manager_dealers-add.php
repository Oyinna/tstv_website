<?php
require_once("config.php");

$currentuserid = getCookie("userid");
if(getCookie("managerlogin") != "YES")
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
</head>
<body>
    <div id="wrapper">
        <?php require("manager_inc_sidebar.php"); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Add New Dealer</h2>   
                        <h5>Create a new dealer. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                    <div class="panel-heading">
                      Dealer Information
                    </div>
                      <div class="panel-body">
                    <form action="actionmanager.php" method="post" target="actionframe" role="form" enctype="multipart/form-data">
                        <div class="form-group oneline">
                          <label for="company">Company Name</label>
                          <input name="company" type="text" class="form-control" id="company">
                        </div>
                        <div class="form-group oneline two">
                          <label for="surname">Contact Surname</label>
                          <input name="surname" type="text" class="form-control" id="surname">
                        </div>
                        <div class="form-group oneline two">
                          <label for="firstname">Contact First name</label>
                          <input name="firstname" type="text" class="form-control" id="firstname">
                        </div>
                        <div class="form-group">
                          <label for="address">Address</label>
                          <textarea name="address" rows="3" class="form-control" id="address"></textarea>
                        </div>
                        <div class="form-group oneline two">
                          <label for="city">City</label>
                          <input name="city" type="text" class="form-control" id="city">
                        </div>
                        <div class="form-group oneline two">
                          <label for="state">State</label>
                            <select name="state" id="state" class="form-control">
                                  <option value="" selected="selected">- Select -</option>
                <?php foreach(getStatesList() as $state) { ?>
                                  <option value="<?php echo $state ?>"><?php echo $state ?></option>
                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group oneline two">
                          <label for="email">Email Address</label>
                          <input name="email" type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group oneline two">
                          <label for="phone">Phone number</label>
                          <input name="phone" type="text" class="form-control" id="phone">
                        </div>
                        <div class="form-group">
                          <label for="notes">Notes</label>
                          <textarea name="notes" rows="3" class="form-control" id="notes"></textarea>
                        </div>
                        <div class="form-group oneline three">
                          <label for="username">Login username</label>
                          <input name="username" type="text" class="form-control" id="username">
                        </div>
                        <div class="form-group oneline three">
                          <label for="password">Password</label>
                          <input name="password" type="password" class="form-control" id="password">
                        </div>
                        <div class="form-group oneline three">
                          <label for="password2">Retype Password</label>
                          <input name="password2" type="password" class="form-control" id="password">
                        </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save Dealer</button>
                        <input name="command" type="hidden" id="command" value="manager_dealers-add">
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
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
            
<link rel="stylesheet" type="text/css" href="jquery.datepick/jquery.datepick.css"> 
<script type="text/javascript" src="jquery.datepick/jquery.plugin.js"></script> 
<script type="text/javascript" src="jquery.datepick/jquery.datepick.js"></script>     
<script type="text/javascript">
$('.datepicker').datepick({dateFormat: 'yyyy-mm-dd'});
</script>   
  
</body>
</html>
