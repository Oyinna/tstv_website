<?php
require_once("config.php");
$currentuserid = getCookie("userid");

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();


//check if deleting
if(isset($_GET['delete']) && $_GET['delete'] != "")
{
    deleteChannel($mycon, $_GET['delete']);
}

$transmissionslist = $dataRead->transmissions_list($mycon);

function deleteChannel($mycon, $transmission_id)
{
    $dataWrite = New DataWrite();
    $done = $dataWrite->transmissions_delete($mycon, $transmission_id);
    if($done != false) @unlink("../pictures/transmissions/$transmission_id.jpg");
    
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
                     <h2>Test Transmissions</h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                        <div class="col-md-12">
                    
                  <div class="panel panel-default" id="list_div">
                    <div class="panel-heading">
                      List of transmissions
                    </div>
                    <!-- /.box-header -->
                    <div class="panel-body table-responsive">
                      <table id="tbl_lgas" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Reviews</th>
                            <th>Picture</th>
                          </tr>
                        </thead>
                        <tbody>
<?php
//get the list of the lgas

foreach($transmissionslist as $row)
{
?>                        
                          <tr>
                              <td><a href="transmissions-view.php?code=<?php echo $row['transmission_id'] ?>"><?php echo $row['name'] ?></a></td>
                            <td><?php echo $row['commentscount'] ?></td>
                            <td><a href="transmissions-view.php?code=<?php echo $row['transmission_id'] ?>"><img src="../pictures/transmissions/<?php echo $row['transmission_id'] ?>.jpg" style="height: 80px" /></a></td>
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
        </script>
            
<script type="text/javascript">
function showUpdateCategory(xid, xname, xposition)
{
	$('#update_transmission_id').val(xid);
	$('#update_name').val(xname);
	$('#update_position').val(xposition);
	$('#update_div').show(300);
	$('#list_div').hide();
}
</script>   
    
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
