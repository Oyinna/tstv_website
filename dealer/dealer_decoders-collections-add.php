<?php
require_once("config.php");

$currentuserid = getCookie("userid");
if(getCookie("dealerlogin") != "YES")
{
    showAlert("You do not have access to perform this action");
    openPage("index.php");
    exit;
}

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

$dealerdetails = $dataRead->dealers_get($mycon, getCookie("userid"));
if(!$dealerdetails)
{
    showAlert("There was an error loading your account details. Please login again.");
    openPage("index.php");
    exit;
}

$productname = "";
if($_GET['product'] == "1001") $productname = "TStv Normal Decoders";
if($_GET['product'] == "1002") $productname = "TStv Internet Decoders";
if($productname == "")
{
    showAlert("The details of the specified product could not be loaded. Please click on the product to request.");
    openPage("dealer_decoders-collections-list.php");
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
        <?php require("dealer_inc_sidebar.php"); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Product Collection request</h2>   
                        <h5>Submit request to collect purchased uncollected products. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                    <div class="panel-heading">
                      Quantity to collect
                    </div>
                      <div class="panel-body">
                    <form action="actionmanager.php" method="post" target="actionframe" role="form" enctype="multipart/form-data">
                        <div class="form-group oneline">
                          <label for="quantity">Enter the Quantity of <?php echo $productname ?> to collect</label>
                          <input name="quantity" type="text" class="form-control" id="quantity" value="0">
                        </div>
                        <div class="form-group">
                          <label for="notes">Notes</label>
                          <textarea name="notes" rows="3" class="form-control" id="notes"></textarea>
                        </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit Request</button>
                        <input name="command" type="hidden" id="command" value="dealer_decoders-collections-add">
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
