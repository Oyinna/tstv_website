<?php
require_once("config.php");

$currentuserid = getCookie("userid");
if(getCookie("dealerlogin") != "YES")
{
    showAlert("You do not have access to perform this action");
    openPage("index.php");
    exit;
}

//check if code was specified
if(!isset($_GET['code']) || $_GET['code'] == "")
{
	showAlert("No retailer was specified. Please click on the retailer to view.");
	openPage("dealer_retailers-list.php");
	exit;
}

$code = $_GET['code'];

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

$retailerdetails = $dataRead->retailers_get($mycon,$code);

if($retailerdetails == false || $retailerdetails['dealer_id'] != $currentuserid)
{
	showAlert("The details of the specified retailer could not be loaded. Please click on the retailer to view.");
	openPage("dealer_retailers-list.php");
	exit;
}


//get status history
$statuslist = $dataRead->retailers_statuslist($mycon,$retailerdetails['retailer_id']);


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
        <?php require("dealer_inc_sidebar.php"); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php echo $retailerdetails['company'] ?></h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                    <div class="row">
                        <div class="col-md-3">
                
                            <!-- Block buttons -->
                            <?php require("dealer_inc-options-retailers.php") ?>
                        </div>
                        <div class="col-md-8">
                    
                  <div class="panel panel-default">
                    <!-- /.box-header -->
                    <div class="panel-heading">
                      Change retailer status
                    </div>
                      <div class="panel-body">
                    <form action="actionmanager.php" method="post" target="actionframe" role="form">
                        <div class="form-group oneline two">
                          <label for="account_type">Status</label>
                          <select name="status" class="form-control">
                          <?php if($retailerdetails['status'] == "0") { ?>
                          	<option value="0" <?php if($retailerdetails['status'] == "0") echo "selected" ?>>Pending</option>
                          <?php } ?>
                            <option value="2" <?php if($retailerdetails['status'] == "2") echo "selected" ?>>Disabled</option>
                          	<option value="5" <?php if($retailerdetails['status'] == "5") echo "selected" ?>>Active</option>
                          </select>
                        </div>
                        <div class="form-group oneline two">
                          <label for="reason">Reason</label>
                          <input name="reason" type="text" class="form-control" id="reason">
                        </div>
                        <div class="form-group">
                          <input name="notify" type="checkbox" value="yes">
                          <label for="notify">Notify retailer</label>
                        </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <input name="command" type="hidden" id="command" value="dealer_retailers-edit-status">
                        <input name="retailer_id" type="hidden" id="retailer_id" value="<?php echo $retailerdetails['retailer_id'] ?>">
                      </div>
                    </form>
                      <!-- /.box-body -->
                      </div>
                      

                  </div>
                    </div>
                    
                <div class="col-md-8">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      Status history
                    </div>
                    <!-- /.box-header -->
                    <div class="panel-body table-responsive">
                      <table id="tbl_lgas" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Reason</th>
                          </tr>
                        </thead>
                        <tbody>
<?php
//get the list of the lgas

foreach($statuslist as $row)
{
?>                        
                          <tr>
                            <td><?php echo formatDate($row['thedate'],"yes") ?></td>
                            <td><?php echo getDealerStatusName($row['status']) ?></td>
                            <td><?php echo $row['reason'] ?></td>
                          </tr>
<?php
}
?>                          
                        </tbody>
                      </table>
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
        </script>
    
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
