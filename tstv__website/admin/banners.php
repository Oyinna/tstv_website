<?php
require_once("config.php");
$currentuserid = getCookie("userid");

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

//check if deleting
if(isset($_GET['delete']) && $_GET['delete'] != "")
{
    $dataWrite = New DataWrite();
    $done = $dataWrite->banners_delete($mycon, $_GET['delete']);
    if($done) @unlink("../pictures/banners/".$_GET['delete'].".jpg");
}

$accountlist = $dataRead->banners_list($mycon,"","");


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
                     <h2>Banners</h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-md-12">

                    
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      Add new banner
                    </div>
                    <!-- /.box-header -->
                    <div class="panel-body table-responsive">
                       <form method="post" role="form" action="actionmanager.php" target="actionframe" enctype="multipart/form-data">
                    <div>
                      <div class="box-body">
                        <div class="form-group oneline three">
                          <label for="name">Select banner</label>
                          <input name="banner" type="file" class="form-control" id="banner">
                        </div>
                        <div class="form-group oneline three">
                          <label for="placement">Banner placement</label>
                          <select name="placement" class="form-control" id="placement">
                              <option value="first">First</option>
                              <option value="second">Second</option>
                              <option value="selfcare">Selfcare</option>
                          </select>
                        </div>
                        <div class="form-group oneline three">
                          <label for="url">Go to url</label>
                          <input name="url" type="text" class="form-control" id="url">
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <input type="hidden" name="command" value="banners_add" />
                      </div>
                      </div>
                    
                    </form>
                    </div>
                    <!-- /.box-body -->
                  </div>
                    
                    
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      List of banners
                    </div>
                    <!-- /.box-header -->
                    <div class="panel-body table-responsive">
                      <table id="tbl_lgas" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Placement</th>
                            <th>Link</th>
                            <th>Banner</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
<?php
//get the list of the lgas

foreach($accountlist as $row)
{
?>                        
                          <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['placement'] ?></td>
                            <td><?php echo $row['link'] ?></td>
                            <td><img src="image.php?image=../pictures/banners/<?php echo $row['banner_id'] ?>.jpg&s=70" /></td>
                            <td><button class="btn btn-danger" onclick="if(confirm('Do you want to delete this banner?')) location.href='?delete=<?php echo $row['banner_id'] ?>'">Delete</button></td>
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
    
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
