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
                     <h2>New Decoder sales</h2>   
                        <h5>record your sold decoders here to continue earning commissions on their subscriptions. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                    <div class="panel-heading">
                      Sales information
                    </div>
                      <div class="panel-body">
                    <form action="actionmanager.php" method="post" target="actionframe" role="form" enctype="multipart/form-data">
                        <div class="form-group oneline two">
                          <label for="decoder">Product sold</label>
                            <select name="decoder" id="decoder" class="form-control">
                                  <option value="1001" selected="selected">TStv Normal Decoder</option>
                                  <option value="1002">TStv Internet Decoder</option>
                            </select>
                        </div>
                        <div class="form-group oneline two">
                          <label for="quantity">Quantity sold</label>
                          <input name="quantity" type="text" class="form-control" id="quantity" value="1000">
                        </div>
                        <div class="form-group oneline two">
                          <label for="customer_type">Sold to</label>
                            <select name="customer_type" id="customer_type" class="form-control">
                                  <option value="1" selected="selected">Sub Dealer</option>
                                  <option value="2">Retailer</option>
                                  <option value="3">End user</option>
                            </select>
                        </div>
                        <div class="form-group oneline two">
                          <label for="customer_id" id="lbl_customer_id">Enter sub dealer's Code</label>
                          <input name="customer_id" type="text" class="form-control" id="customer_id" value="">
                        </div>
                        <div class="form-group oneline three customerfields">
                          <label for="customer_surname" id="lbl_customer_name">Surname</label>
                          <input name="customer_surname" type="text" class="form-control" id="customer_surname" value="">
                        </div>
                        <div class="form-group oneline three customerfields">
                          <label for="customer_othernames" id="lbl_customer_name">Othernames</label>
                          <input name="customer_othernames" type="text" class="form-control" id="customer_othernames" value="">
                        </div>
                        <div class="form-group oneline three customerfields">
                          <label for="customer_email" id="lbl_customer_name">Email Address</label>
                          <input name="customer_email" type="text" class="form-control" id="customer_email" value="">
                        </div>
                        <div class="form-group">
                          <label for="codes">Decoders' TStv Codes seperated by comma (,)</label>
                          <textarea name="codes" rows="3" class="form-control" id="codes" placeholder="2514785632,5698742365,74452369581,2255874695,1185663548"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="notes">Notes</label>
                          <textarea name="notes" rows="3" class="form-control" id="notes"></textarea>
                        </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <input name="command" type="hidden" id="command" value="dealer_decoders-purchase-add">
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
  
<script type="text/javascript">
    $("div.customerfields").hide();
    $("#customer_type").on("change",function(){
        if($(this).val() === "1") $("#lbl_customer_id").text("Enter Sub dealer's Code");
        if($(this).val() === "2") $("#lbl_customer_id").text("Enter Retailer's Code");
        if($(this).val() === "3") 
        {
            $("#lbl_customer_id").text("Enter Customer's phone number");
            $("div.customerfields").show();
        }
    })
    </script>
</body>
</html>
