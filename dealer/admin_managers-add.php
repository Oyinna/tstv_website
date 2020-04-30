<?php
require_once("config.php");

$currentuserid = getCookie("userid");
if(getUserAccessRight($currentuserid,"managers_add") <> 1)
{
    showAlert("You do not have access to perform this action");
    openPage("dashboard.php");
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
        <?php require("admin_inc_sidebar.php"); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Add New Zonal manager</h2>   
                        <h5>Create a new zonal manager account. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                    <div class="panel-heading">
                      Manager Information
                    </div>
                      <div class="panel-body">
                    <form action="actionmanager.php" method="post" target="actionframe" role="form" enctype="multipart/form-data">
                        <div class="form-group oneline">
                          <label for="name">Title</label>
                          <input name="name" type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group oneline three">
                          <label for="surname">Surname</label>
                          <input name="surname" type="text" class="form-control" id="surname">
                        </div>
                        <div class="form-group oneline three">
                          <label for="firstname">First name</label>
                          <input name="firstname" type="text" class="form-control" id="firstname">
                        </div>
                        <div class="form-group oneline three">
                          <label for="othernames">Othernames</label>
                          <input name="othernames" type="text" class="form-control" id="othernames">
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
                          <input name="password2" type="password" class="form-control" id="password2">
                        </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save Manager</button>
                        <input name="command" type="hidden" id="command" value="admin_managers-add">
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
