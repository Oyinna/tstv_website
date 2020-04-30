<?php
require_once("config.php");
$currentuserid = getCookie("userid");

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

$sql = "";
$param = Array();

$datefrom = date("Y-m-d",strtotime("- 1 week"));
$dateto = date("Y-m-d");
if(isset($_POST['datefrom'])) $datefrom = $_POST['datefrom'];
if(isset($_POST['dateto'])) $dateto = $_POST['dateto'];

	if(isset($_POST['vehicle_capacity']) && $_POST['vehicle_capacity'] != "")
	{
		$sql.= " AND (`vehicle_capacity` = :vehicle_capacity)";
		$param[":vehicle_capacity"] = $_POST['vehicle_capacity'];
	}
	if(isset($_POST['vehicle_make']) && $_POST['vehicle_make'] != "")
	{
		$sql.= " AND (`vehicle_make` = :vehicle_make)";
		$param[":vehicle_make"] = $_POST['vehicle_make'];
	}
	if(isset($_POST['vehicle_model']) && $_POST['vehicle_model'] != "")
	{
		$sql.= " AND (`vehicle_model` = :vehicle_model)";
		$param[":vehicle_model"] = $_POST['vehicle_model'];
	}
	if(isset($_POST['vehicle_regno']) && $_POST['vehicle_regno'] != "")
	{
		$sql.= " AND (`vehicle_regno` = :vehicle_regno)";
		$param[":vehicle_regno"] = $_POST['vehicle_regno'];
	}
	if($datefrom != "")
	{
		//$sql.= " AND (`startdate` >= :startdate)";
		//$param[":startdate"] = $datefrom;
	}
	if($dateto != "")
	{
		//$sql.= " AND (`startdate` <= :dateto)";
		//$param[":dateto"] = $dateto;
	}
//$sql.= " AND (p.`createdby` = :createdby)";
//$param[":createdby"] = $currentuserid;
	

$sql .= " AND `dealer_type` = '10' ORDER BY `thedate` DESC";


$dealerslist = $dataRead->dealers_list($mycon,$sql,$param);


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
                     <h2>Retailers / Installers</h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-md-12">

                    
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      List of retailers
                    </div>
                    <!-- /.box-header -->
                    <div class="panel-body table-responsive">
                      <table id="tbl_lgas" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Retailer ID</th>
                            <th>Company Name</th>
                            <th>Contact Person</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Email</th>
                            <th>Phone</th>
                          </tr>
                        </thead>
                        <tbody>
<?php
//get the list of the lgas

foreach($dealerslist as $row)
{
?>                        
                          <tr>
                            <td><a href="admin_dealers-view.php?code=<?php echo $row['dealer_id'] ?>"><?php echo $row['dealer_id'] ?></a></td>
                            <td><a href="admin_dealers-view.php?code=<?php echo $row['dealer_id'] ?>"><?php echo $row['company'] ?></a></td>
                            <td><?php echo $row['firstname']." ".$row['surname'] ?></td>
                            <td><?php echo $row['state'] ?></td>
                            <td><?php echo $row['country'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                          </tr>
<?php
}
?>                          
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Dealer ID</th>
                            <th>Company Name</th>
                            <th>Contact Person</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Email</th>
                            <th>Phone</th>
                          </tr>
                        </tfoot>
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
