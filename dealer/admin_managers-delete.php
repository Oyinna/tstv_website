<?php
require_once("config.php");

$currentuserid = getCookie("userid");
if(getUserAccessRight($currentuserid,"managers_view") <> 1)
{
	showAlert("You do not have access to perform this action");
	openPage("dashboard.php");
	exit;
}

//check if code was specified
if(!isset($_GET['code']) || $_GET['code'] == "")
{
	showAlert("No manager was specified. Please click on the manager to view.");
	openPage("admin_managers-list.php");
	exit;
}

$code = $_GET['code'];

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

$managerdetails = $dataRead->managers_get($mycon,$code);

if($managerdetails == false)
{
	showAlert("The details of the specified manager could not be loaded. Please click on the manager to view.");
	openPage("admin_managers-list.php");
	exit;
}


//get status history
$managerslist = $dataRead->managers_list($mycon,"","");


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
                     <h2><?php echo $managerdetails['surname'].", ".$managerdetails['firstname']." ".$managerdetails['othernames'] ?></h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                    <div class="row">
                        <div class="col-md-3">
                
                            <!-- Block buttons -->
                            <?php require("admin_inc-options-managers.php") ?>
                        </div>
                        <div class="col-md-8">
                    
                  <div class="panel panel-default">
                    <!-- /.box-header -->
                    <div class="panel-heading">
                      Delete this manager
                    </div>
                      <div class="panel-body">
                    <form action="actionmanager.php" method="post" target="actionframe" role="form">
                        <div class="form-group oneline">
                          <label for="transfer">Transfer all dealers of this manager to</label>
                          <select name="transfer" class="form-control">
                          	<option value="">Select..</option>
                <?php
                    foreach($managerslist as $row) {
                        if($row['manager_id'] == $managerdetails['manager_id']) continue;
                ?>
                            <option value="<?php echo $row['manager_id'] ?>"><?php echo $row['name']." (".$row['firstname']." ".$row['surname'].")" ?></option>
                <?php
                    }
                ?>
                          </select>
                        </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-danger">Delete now</button>
                        <input name="command" type="hidden" id="command" value="admin_managers-delete">
                        <input name="manager_id" type="hidden" id="manager_id" value="<?php echo $managerdetails['manager_id'] ?>">
                      </div>
                    </form>
                      <!-- /.box-body -->
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
