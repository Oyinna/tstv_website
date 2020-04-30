<?php
require_once("config.php");

$currentuserid = getCookie("userid");
if(getUserAccessRight($currentuserid,"users_view") <> 1)
{
	showAlert("You do not have access to perform this action");
	openPage("dashboard.php");
	exit;
}

//check if code was specified
if(!isset($_GET['code']) || $_GET['code'] == "")
{
	showAlert("No admin was specified. Please click on the admin to view.");
	openPage("admins-list.php");
	exit;
}

$code = $_GET['code'];

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

$admindetails = $dataRead->admins_get($mycon,$code);

if($admindetails == false)
{
	showAlert("The details of the specified admin could not be loaded. Please click on the admin to view.");
	openPage("admins-list.php");
	exit;
}

$usergroups = $dataRead->admins_groups_list($mycon);

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
</head>
<body>
    <div id="wrapper">
        <?php require("admin_inc_sidebar.php"); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php echo $admindetails['surname']." ".$admindetails['firstname'] ?></h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                    <div class="row">
                        <div class="col-md-3">
                
                            <!-- Block buttons -->
                            <?php require("inc-options-admins.php") ?>
                        </div>
                        <div class="col-md-8">
                    
                  <div class="panel panel-default">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="panel-heading">
                      Update Admin Information
                    </div>
                      <div class="panel-body">
                    <form action="actionmanager.php" method="post" target="actionframe" role="form">
                        <div class="form-group oneline two">
                          <label for="group_id">Admin Status</label>
                          <select name="status" class="form-control">
                          	<option value="0" <?php if($admindetails['status'] == "0") echo "selected" ?>>Disabled</option>
                          	<option value="5" <?php if($admindetails['status'] == "5") echo "selected" ?>>Active</option>
                          </select>
                        </div>
                        <div class="form-group oneline three">
                          <label for="surname">Surname</label>
                          <input name="surname" type="text" class="form-control" id="surname" value="<?php echo $admindetails['surname'] ?>">
                        </div>
                        <div class="form-group oneline three">
                          <label for="firstname">First name</label>
                          <input name="firstname" type="text" class="form-control" id="firstname" value="<?php echo $admindetails['firstname'] ?>">
                        </div>
                        <div class="form-group oneline three">
                          <label for="othernames">Other names</label>
                          <input name="othernames" type="text" class="form-control" id="othernames" value="<?php echo $admindetails['othernames'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="email">Email Address</label>
                          <input name="email" type="text" class="form-control" id="email" value="<?php echo $admindetails['email'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="phone">Phone number</label>
                          <input name="phone" type="text" class="form-control" id="phone" value="<?php echo $admindetails['phone'] ?>">
                        </div>
                        <div class="form-group oneline two">
                          <label for="password">Change Password</label>
                          <input name="password" type="password" class="form-control" id="password" placeholder="leave blank unless changing">
                        </div>
                        <div class="form-group oneline two">
                          <label for="password2">Confirm Password</label>
                          <input name="password2" type="password" class="form-control" id="password2" placeholder="leave blank unless changing">
                        </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update Admin</button>
                        <input name="admin_id" type="hidden" id="admin_id" value="<?php echo $admindetails['admin_id'] ?>">
                        <input name="command" type="hidden" id="command" value="admins-edit">
                      </div>
                      
                    </form>
                      </div>
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
        </script>
    
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
