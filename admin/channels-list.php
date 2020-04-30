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

$channelslist = $dataRead->channels_list($mycon);

function deleteChannel($mycon, $channel_id)
{
    $dataWrite = New DataWrite();
    $done = $dataWrite->channels_delete($mycon, $channel_id);
    if($done != false) @unlink("../pictures/channels/$channel_id.jpg");
    
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
                     <h2>Channels</h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                        <div class="col-md-12">
                    
                  <div class="panel panel-default" id="list_div">
                    <div class="panel-heading">
                      List of channels
                    </div>
                    <!-- /.box-header -->
                    <div class="panel-body table-responsive">
                      <table id="tbl_lgas" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>code</th>
                            <th>Category</th>
                            <th>Position</th>
                            <th>Programs</th>
                            <th>logo</th>
                          </tr>
                        </thead>
                        <tbody>
<?php
//get the list of the lgas

foreach($channelslist as $row)
{
?>                        
                          <tr>
                              <td><a href="channels-view.php?code=<?php echo $row['channel_id'] ?>"><?php echo $row['name'] ?></a></td>
                            <td><?php echo $row['code'] ?></td>
                            <td><?php echo $row['categoryname'] ?></td>
                            <td><?php echo $row['position'] ?></td>
                            <td><?php echo $row['programcount'] ?></td>
                            <td><a href="channels-view.php?code=<?php echo $row['channel_id'] ?>"><img src="../pictures/channels/<?php echo $row['channel_id'] ?>.jpg" style="height: 80px" /></a></td>
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
	$('#update_channel_id').val(xid);
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
