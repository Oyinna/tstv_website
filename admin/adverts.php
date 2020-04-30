<?php
require_once("config.php");
$currentuserid = getCookie("userid");

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();


//check if deleting
if(isset($_GET['delete']) && $_GET['delete'] != "")
{
    deleteAdvert($mycon, $_GET['delete']);
}

$advertslist = $dataRead->adverts_list($mycon);

function deleteAdvert($mycon, $advert_id)
{
    $dataWrite = New DataWrite();
    $done = $dataWrite->adverts_delete($mycon, $advert_id);
    if($done != false) @unlink("../pictures/adverts/$advert_id.jpg");
    
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
                     <h2>Adverts</h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                        <div class="col-md-12">
                    
                  <div class="panel panel-default" id="list_div">
                    <div class="panel-heading">
                      List of adverts
                    </div>
                    <!-- /.box-header -->
                    <div class="panel-body table-responsive">
                      <table id="tbl_lgas" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Views</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
<?php
//get the list of the lgas

foreach($advertslist as $row)
{
?>                        
                          <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['viewcount'] ?></td>
                            <td>
                                <a href="#" onclick="if(confirm('Do you want to delete this advert?')) document.location.href='?delete=<?php echo $row['advert_id'] ?>'">Delete</a>
                            </td>
                          </tr>
<?php
}
?>                          
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                    
                    
                  </div>
                    
                  <div class="panel panel-default">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="panel-heading">
                      Add new advert
                    </div>
                      <div class="panel-body">
                    <form action="actionmanager.php" method="post" target="actionframe" role="form" enctype="multipart/form-data">
                    <div id="step1">
                        <div class="form-group oneline two">
                          <label for="name">Name</label>
                          <input name="name" type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group oneline two">
                          <label for="type">Placement</label>
                          <select name="type" class="form-control">
                              <option value="0">Side Bar</option>
                              <option value="1">Footer</option>
                          </select>
                        </div>
                        <div class="form-group oneline">
                          <label for="link">Link to (optional)</label>
                          <input name="link" type="url" class="form-control" id="link">
                        </div>
                      </div>
                        <div class="form-group oneline">
                          <label for="banner">Banner (optional)</label>
                          <input name="banner" type="file" class="form-control" id="banner">
                        </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <input name="command" type="hidden" id="command" value="adverts_add">
                      </div>
                    </form>
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
	$('#update_advert_id').val(xid);
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
