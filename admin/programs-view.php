<?php
require_once("config.php");

//check if code was specified
if(!isset($_GET['code']) || $_GET['code'] == "")
{
	showAlert("No program was specified. Please click on the program to view.");
	openPage("programs-list.php");
	exit;
}

$code = $_GET['code'];

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

$programdetails = $dataRead->programs_get($mycon,$code);

if($programdetails == false)
{
	showAlert("The details of the specified program could not be loaded. Please click on the program to view.");
	openPage("programs-list.php");
	exit;
}

//check if deleting
if(isset($_GET['delete']) && $_GET['delete'] == "yes")
{
    deleteProgram($mycon, $programdetails);
}

function deleteProgram($mycon, $programdetails)
{
    global $dataRead;
    $dataWrite = New DataWrite();
    if(count($dataRead->schedules_list($mycon, $programdetails['channel_id'], $programdetails['program_id']))) return showAlert ("You must first delete all the schedules in this program");
    $done = $dataWrite->programs_delete($mycon, $programdetails['channel_id'], $programdetails['program_id']); 
    if(!$done) return showAlert ("There was an error deleting this program");
    //delete the picture
    unlink("../pictures/programs/{$programdetails['program_id']}.jpg");
    openPage("channels-programs-list.php?code=".$programdetails['channel_id']);
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
        <?php require("inc_sidebar.php"); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php echo $programdetails['channelname']." | ".$programdetails['name'] ?></h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                    <div class="row">
                        <div class="col-md-3">
                
                            <!-- Block buttons -->
                            <?php require("inc-options-programs.php") ?>
                        </div>
                        <div class="col-md-6">
                    
                  <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div id="step2">
                      <div class="box-body">
                      <table width="100%" border="1" class="details">
                        <tr>
                          <td width="25%" class="question">Program Id</td>
                          <td width="75%"><?php echo $programdetails['program_id'] ?></td>
                        </tr>
                        <tr>
                          <td width="25%" class="question">Channel</td>
                          <td width="75%"><?php echo $programdetails['channelname'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Status</td>
                          <td><?php echo getChannelStatusName($programdetails['status']) ?></td>
                        </tr>
                        <tr>
                          <td class="question">Name</td>
                          <td><?php echo $programdetails['name'] ?></td>
                        </tr>
                        <tr>
                          <td class="question">Information</td>
                          <td><?php echo $programdetails['caption'] ?></td>
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
