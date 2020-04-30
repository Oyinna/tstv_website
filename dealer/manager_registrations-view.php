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
	showAlert("No registration was specified. Please click on the registration to view.");
	openPage("manager_registrations-list.php");
	exit;
}

$code = $_GET['code'];

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

$registrationdetails = $dataRead->registrations_get($mycon,$code);

if($registrationdetails == false)
{
	showAlert("The details of the specified registration could not be loaded. Please click on the registration to view.");
	openPage("manager_registrations-list.php");
	exit;
}

if(isset($_GET['approve']) && $_GET['approve'] == "yes")
{
    $dataWrite = New DataWrite();
    $done = $dataWrite->registrations_approve($mycon, $registrationdetails['registration_id']);
    //var_dump($done);
    if($done == 0)
    {
        openPage("manager_registrations-list.php");
        exit;
    }
    else
    {
        if($done == 1) showAlert("Registration details not found");
        if($done == 2) showAlert("There is no dealer in {$registrationdetails['state']} to assign this retailer to.");
        if($done == 3) showAlert("There was an error approving this registration");
    }
}
if(isset($_GET['delete']) && $_GET['delete'] == "yes")
{
    $dataWrite = New DataWrite();
    $done = $dataWrite->registrations_delete($mycon, $registrationdetails['registration_id']);
    openPage("manager_registrations-list.php");
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
                     <h2><?php echo $registrationdetails['company'] ?></h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                    <div class="row">
                        <div class="col-md-3">
                
                            <!-- Block buttons -->
                            <?php require("manager_inc-options-registrations.php") ?>
                        </div>
                        <div class="col-md-6">
                    
                  <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div id="step2">
                      <div class="box-body">
                      <table width="100%" border="1" class="details">
                        <tr>
                          <td width="25%" class="question">Registration Id</td>
                          <td width="75%"><?php echo $registrationdetails['registration_id'] ?></td>
                        </tr>
                        <tr>
                          <td width="25%" class="question">Dealer type</td>
                          <td width="75%"><?php echo $registrationdetails['type'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Company name</td>
                          <td><?php echo $registrationdetails['company'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Username</td>
                          <td><?php echo $registrationdetails['username'] ?></td>
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
                                    $filename = "files/registrations/".$registrationdetails['registration_id']."_".$file.".jpg";
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
                          <td><?php echo $registrationdetails['surname'].", ".$registrationdetails['firstname']." ".$registrationdetails['othernames'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Address</td>
                          <td><?php echo $registrationdetails['address'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Email</td>
                          <td><?php echo $registrationdetails['email'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Phone</td>
                          <td><?php echo $registrationdetails['phone'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Names of owners</td>
                          <td><?php echo $registrationdetails['owner1'].", ".$registrationdetails['owner2'].", ".$registrationdetails['owner3'].", ".$registrationdetails['owner4'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Type of business</td>
                          <td><?php echo $registrationdetails['business_type'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">How long in business</td>
                          <td><?php echo $registrationdetails['business_duration'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">No of staff</td>
                          <td><?php echo $registrationdetails['business_staff'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Takeoff quantity</td>
                          <td><?php echo $registrationdetails['quantity'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Capital</td>
                          <td><?php echo $registrationdetails['amount'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Knowledge of market</td>
                          <td><?php echo $registrationdetails['localmarket'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Office space</td>
                          <td><?php echo $registrationdetails['office'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">City</td>
                          <td><?php echo $registrationdetails['city'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">State</td>
                          <td><?php echo $registrationdetails['state'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">experience in PayTV sales</td>
                          <td><?php echo $registrationdetails['experience'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">currently marketting any DTH</td>
                          <td><?php echo $registrationdetails['marketting'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Number of installers</td>
                          <td><?php echo $registrationdetails['installers'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Notes</td>
                          <td><?php echo $registrationdetails['notes'] ?></td>
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
