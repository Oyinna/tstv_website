<?php
require_once("config.php");

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

//get the counts
$myrec = $mycon->query("SELECT `dealer_id`, (SELECT COUNT(`dealer_id`) FROM `dealers`) AS dealercount, "
        . " (SELECT COUNT(`retailer_id`) FROM `retailers`) AS retailercount, "
        . " (SELECT COUNT(`manager_id`) FROM `managers`) AS managercount, "
        . "(SELECT COUNT(`sale_id`) FROM `sales`) AS salescount FROM `dealers` LIMIT 1");
$dashboard = $myrec->fetch(PDO::FETCH_ASSOC);

$param = array();
$filter = " ORDER BY `dealer_id` DESC LIMIT 10";
$dealerslist = $dataRead->dealers_list($mycon, $filter, $param);
$filter = " ORDER BY `sale_id` DESC LIMIT 10";
$saleslist = $dataRead->sales_list($mycon, $filter, $param);
        

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
        <?php require_once("admin_inc_sidebar.php") ?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>TStv Dealers' Portal</h2>   
                     <h5>Welcome <?php echo getCookie("companyname") ?>. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-user"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $dashboard['managercount'] ?> Managers</p>
                    <p class="text-muted">Zonal Heads</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-user"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $dashboard['dealercount'] ?> Dealers</p>
                    <p class="text-muted">Distributors</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-user"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $dashboard['retailercount'] ?> Retailers</p>
                    <p class="text-muted">Installers</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $dashboard['salescount'] ?> Decoders</p>
                    <p class="text-muted">Sold</p>
                </div>
             </div>
		     </div>
			</div>
                 <!-- /. ROW  -->
                <hr />                
                <div class="row" >
                    <div class="col-md-6 col-sm-12 col-xs-12">
               
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Recent Dealers
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Company</th>
                                            <th>Phone</th>
                                            <th>State</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
foreach($dealerslist as $row)
{
?>
                                        <tr>
                                            <td><?php echo $row['company'] ?></td>
                                            <td><?php echo $row['phone'] ?></td>
                                            <td><?php echo $row['state'] ?></td>
                                        </tr>
<?php                                        
}
?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
               
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Recent Sales
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Decoder #</th>
                                            <th>Customer</th>
                                            <th>Retailer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
foreach($saleslist as $row)
{
?>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo $row['thedate'] ?></td>
                                            <td><?php echo $row['decoder'] ?></td>
                                            <td><?php echo $row['customername'] ?></td>
                                            <td><?php echo $row['company'] ?></td>
                                        </tr>
<?php                                        
}
?>

                                    </tbody>
                                </table>
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
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
