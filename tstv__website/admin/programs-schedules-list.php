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
if(isset($_GET['delete']) && $_GET['delete'] != "")
{
    deleteSchedule($mycon, $programdetails);
}

function deleteSchedule($mycon, $programdetails)
{
    global $dataRead;
    $dataWrite = New DataWrite();
    $done = $dataWrite->schedules_delete($mycon, $programdetails['channel_id'], $programdetails['program_id'], $_GET['delete']); 
    if(!$done) return showAlert ("There was an error deleting this schedule");
}

$scheduleslist = $dataRead->schedules_list($mycon, $programdetails['channel_id'], $programdetails['program_id']);

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

        <script src="htmlEditor.js" type="text/javascript"></script>
        <script type="text/javascript">bkLib.onDomLoaded(function() {
                //new nicEditor().panelInstance('txtName');
                new nicEditor({iconsPath : 'htmlEditor.gif'}).panelInstance('message_email');
        });
        </script>        
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
                        <div class="col-md-8">
                    
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      List of scheduled time for this program
                    </div>
                    <!-- /.box-header -->
                    <div class="panel-body table-responsive">
                      <table id="tbl_lgas" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Show Id</th>
                            <th>Start time</th>
                            <th>End time</th>
                            <th>caption</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
<?php
//get the list of the lgas

foreach($scheduleslist as $row)
{
?>                        
                          <tr>
                            <td><?php echo $row['schedule_id'] ?></td>
                            <td><?php echo $row['startdate'] ?></td>
                            <td><?php echo $row['enddate'] ?></td>
                            <td><?php echo $row['caption'] ?></td>
                            <td><a href="?code=<?php echo $row['program_id']."&delete=".$row['schedule_id'] ?>" onclick="if(!confirm('Are you sure you want to delete this schedule')) return false;"><button class="btn btn-danger">Delete</button></a></td>
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
                $('#tbl_lgas').dataTable({
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": false,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
            
$("#message_type").on("change",function(){
    if($(this).val() == "sms")
    {
        $("#div_message_sms").show();
        $("#div_message_email").hide();
    }
    else
    {
        $("#div_message_sms").hide();
        $("#div_message_email").show();
    }
})            
        </script>
    
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
