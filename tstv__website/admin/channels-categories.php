<?php
require_once("config.php");
$currentuserid = getCookie("userid");

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();


//check if deleting
if(isset($_GET['delete']) && $_GET['delete'] != "")
{
    deleteCategory($mycon, $_GET['delete']);
}

$categorieslist = $dataRead->channels_categories_list($mycon);

function deleteCategory($mycon, $category_id)
{
    global $dataRead;
    $dataWrite = New DataWrite();
    $categorydetails = $dataRead->channels_categories_get($mycon, $category_id);
    if($categorydetails['channelscount'] > 0) return showAlert ("You can not delete this category because there are channels attached to it");
    $done = $dataWrite->channels_categories_delete($mycon, $category_id);
    
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
                     <h2>Channel Categories</h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                        <div class="col-md-12">

                  <div class="panel panel-default" id="update_div" style="display:none">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="panel-heading">
                      Update Category
                    </div>
                      <div class="panel-body">
                    <form action="actionmanager.php" method="post" target="actionframe" role="form" enctype="multipart/form-data">
                    <div id="step1">
                        <div class="form-group oneline">
                          <label for="name">Category</label>
                          <input name="name" type="text" class="form-control" id="update_name">     
                        </div>
                        <div class="form-group oneline ">
                          <label for="caption">Caption</label>
                          <textarea name="caption" row="5" class="form-control" id="update_caption"></textarea>
                        </div>
                        <div class="form-group oneline">
                          <label for="name">Position</label>
                          <input name="position" type="number" class="form-control" id="update_position">     
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button><a href="#" onClick="$('#update_div').hide(); $('#list_div').show(300); return false;">Cancel update</a>
                        <input name="category_id" type="hidden" id="update_category_id" value="">
                        <input name="command" type="hidden" id="command" value="channels_categories_edit">
                      </div>
                    </form>
                      </div>
                      

                  </div>
                    
                  <div class="panel panel-default" id="list_div">
                    <div class="panel-heading">
                      Categories
                    </div>
                    <!-- /.box-header -->
                    <div class="panel-body table-responsive">
                      <table id="tbl_lgas" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Category</th>
                            <th>Channels</th>
                            <th>Caption</th>
                            <th>Position</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
<?php
//get the list of the lgas

foreach($categorieslist as $row)
{
?>                        
                          <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['channelscount'] ?></td>
                            <td><?php echo $row['caption'] ?></td>
                            <td><?php echo $row['position'] ?></td>
                            <td><a href="#" onclick="showUpdateCategory('<?php echo $row['category_id'] ?>','<?php echo $row['name'] ?>','<?php echo $row['position'] ?>','<?php echo $row['caption'] ?>'); return false;">Edit</a></td>     
                            <td>
                                <a href="#" onclick="if(confirm('Do you want to delete this item?')) document.location.href='?delete=<?php echo $row['category_id'] ?>'">Delete</a>
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
                      Add new category
                    </div>
                      <div class="panel-body">
                    <form action="actionmanager.php" method="post" target="actionframe" role="form" enctype="multipart/form-data">
                    <div id="step1">
                        <div class="form-group oneline ">
                          <label for="name">Category</label>
                          <input name="name" type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group oneline ">
                          <label for="caption">Caption</label>
                          <textarea name="caption" row="5" class="form-control" id="caption"></textarea>
                        </div>
                        <div class="form-group oneline ">
                          <label for="name">Position</label>
                          <input name="position" type="number" class="form-control" id="position">
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <input name="command" type="hidden" id="command" value="channels_categories_add">
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
function showUpdateCategory(xid, xname, xposition, xcaption)
{
	$('#update_category_id').val(xid);
	$('#update_name').val(xname);
	$('#update_position').val(xposition);
	$('#update_caption').val(xcaption);
	$('#update_div').show(300);
	$('#list_div').hide();
}
</script>   
    
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
