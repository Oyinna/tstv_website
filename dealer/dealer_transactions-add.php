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
                     <h2>Submit Payment information</h2>   
                        <h5>Submit information about your recent payment/deposit for product purchase </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                    <div class="panel-heading">
                      Payment information
                    </div>
                      <div class="panel-body">
                    <form action="actionmanager.php" method="post" target="actionframe" role="form" enctype="multipart/form-data">
                        <div class="form-group oneline two">
                          <label for="payment_method">Method of payment</label>
                            <select name="payment_method" id="payment_method" class="form-control">
                                  <option value="1" selected="selected">Bank Transfer</option>
                                  <option value="2">Bank Deposit</option>
                                  <option value="3">Cheque / Draft</option>
                                  <option value="4">Cash</option>
                            </select>
                        </div>
                        <div class="form-group oneline two">
                          <label for="code">Amount</label>
                          <input name="code" type="text" class="form-control" id="code" value="">
                        </div>
                        <div class="form-group oneline three bankpayment">
                          <label for="code">Bank name</label>
                          <input name="code" type="text" class="form-control" id="code" value="">
                        </div>
                        <div class="form-group oneline three bankpayment">
                          <label for="surname">Account number</label>
                          <input name="surname" type="text" class="form-control" id="surname" value="">
                        </div>
                        <div class="form-group oneline three bankpayment">
                          <label for="surname">Ref/Cheque/Teller Number</label>
                          <input name="surname" type="text" class="form-control" id="surname" value="">
                        </div>
                        <div class="form-group oneline two cashpayment">
                          <label for="surname">Paid to</label>
                          <input name="surname" type="text" class="form-control" id="surname" value="">
                        </div>
                        <div class="form-group oneline two cashpayment">
                          <label for="surname">Receipt number</label>
                          <input name="surname" type="text" class="form-control" id="surname" value="">
                        </div>
                        <div class="form-group oneline">
                          <label for="surname">Purpose of payment</label>
                          <input name="surname" type="text" class="form-control" id="surname" value="">
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
  
<script type="text/javascript">
    $("div.cashpayment").hide();
    $("#payment_method").on("change",function(){
        $("div.cashpayment").hide();
        $("div.bankpayment").show();
        if($(this).val() === "4") 
        {
            $("div.cashpayment").show();
            $("div.bankpayment").hide();
        }
    })
    </script>
</body>
</html>
