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
                        <div class="col-md-6">
                    
                  <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div id="step2">
                    <div class="panel-body">
                      <table width="100%" border="1" class="details">
                        <tr>
                          <td width="25%" class="question">Account Id</td>
                          <td width="75%"><?php echo $admindetails['admin_id'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Date Created</td>
                          <td><?php echo formatDate($admindetails['thedate'],"yes") ?></td>
                        </tr>
                        <tr>
                          <td class="question">Username</td>
                          <td><?php echo $admindetails['username'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Group</td>
                          <td><?php echo $admindetails['username'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Last Login on</td>
                          <td><?php echo formatDate($admindetails['lastlogin'],"yes") ?></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" class="question"> Information</td>
                        </tr>
                        <tr>
                          <td class="question">Surname</td>
                          <td><?php echo $admindetails['surname'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Firstname</td>
                          <td><?php echo $admindetails['firstname'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Other names</td>
                          <td><?php echo $admindetails['othernames'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Phone number</td>
                          <td><?php echo $admindetails['phone'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Email address</td>
                          <td><?php echo $admindetails['email'] ?></td>
                        </tr>
                      </table>
                      <!-- /.box-body -->
                      <div class="box-footer"></div>
                    </div>
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
