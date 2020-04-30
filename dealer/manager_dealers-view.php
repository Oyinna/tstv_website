<?php
require_once("config.php");

$currentuserid = getCookie("userid");
if(getCookie("managerlogin") != "YES")
{
    showAlert("You do not have access to perform this action");
    openPage("index.php");
    exit;
}

//check if code was specified
if(!isset($_GET['code']) || $_GET['code'] == "")
{
	showAlert("No dealer was specified. Please click on the dealer to view.");
	openPage("manager_dealers-list.php");
	exit;
}

$code = $_GET['code'];

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

$dealerdetails = $dataRead->dealers_get($mycon,$code);

if($dealerdetails == false)
{
	showAlert("The details of the specified dealer could not be loaded. Please click on the dealer to view.");
	openPage("manager_dealers-list.php");
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
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <?php require("manager_inc_sidebar.php"); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php echo $dealerdetails['company'] ?></h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                    <div class="row">
                        <div class="col-md-6">
                    
                  <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div id="step2">
                      <div class="box-body">
                      <table width="100%" border="1" class="details">
                        <tr>
                          <td width="25%" class="question">Registration Id</td>
                          <td width="75%"><?php echo $dealerdetails['dealer_id'] ?></td>
                        </tr>
                        <tr>
                          <td width="25%" class="question">Dealer type</td>
                          <td width="75%"><?php echo $dealerdetails['type'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Company name</td>
                          <td><?php echo $dealerdetails['company'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Username</td>
                          <td><?php echo $dealerdetails['username'] ?></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" class="question"> Attachments (click to enlarge)</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                
                                <?php
                                $files = "cac1,cac2,cac3,file_office1,file_office2,file_office3,file_passport";
                                foreach(explode(",",$files) as $file)
                                {
                                    $filename = "files/dealers/".$dealerdetails['dealer_id']."_".$file.".jpg";
                                    //echo $filename;
                                    if(file_exists($filename)) {
                                ?>
                                <div style="width: 150px; height: 150px; float: left; margin: 2px; overflow: hidden"><a href="<?php echo $filename ?>" target="_blank"><img src="image.php?image=<?php echo $filename ?>&s=400" width="100%" /></a></div>
                                <?php
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" class="question"> Dealer Information</td>
                        </tr>
                        <tr>
                          <td class="question">Contact person</td>
                          <td><?php echo $dealerdetails['surname'].", ".$dealerdetails['firstname']." ".$dealerdetails['othernames'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Address</td>
                          <td><?php echo $dealerdetails['address'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Email</td>
                          <td><?php echo $dealerdetails['email'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Phone</td>
                          <td><?php echo $dealerdetails['phone'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Names of owners</td>
                          <td><?php echo $dealerdetails['owner1'].", ".$dealerdetails['owner2'].", ".$dealerdetails['owner3'].", ".$dealerdetails['owner4'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Type of business</td>
                          <td><?php echo $dealerdetails['business_type'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">How long in business</td>
                          <td><?php echo $dealerdetails['business_duration'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">No of staff</td>
                          <td><?php echo $dealerdetails['business_staff'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Takeoff quantity</td>
                          <td><?php echo $dealerdetails['quantity'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Capital</td>
                          <td><?php echo $dealerdetails['amount'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Knowledge of market</td>
                          <td><?php echo $dealerdetails['localmarket'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Office space</td>
                          <td><?php echo $dealerdetails['office'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">City</td>
                          <td><?php echo $dealerdetails['city'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">State</td>
                          <td><?php echo $dealerdetails['state'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">experience in PayTV sales</td>
                          <td><?php echo $dealerdetails['experience'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">currently marketting any DTH</td>
                          <td><?php echo $dealerdetails['marketting'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Number of installers</td>
                          <td><?php echo $dealerdetails['installers'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Notes</td>
                          <td><?php echo $dealerdetails['notes'] ?></td>
                        </tr>
                      </table>
                      
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
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
