<?php
require_once("config.php");

$currentuserid = getCookie("userid");

//check if code was specified
if(!isset($_GET['code']) || $_GET['code'] == "")
{
	showAlert("No admins was specified. Please click on the admins to view.");
	openPage("admins-list.php");
	exit;
}

$code = $_GET['code'];

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

$contentdetails = $dataRead->admins_get($mycon,$code);

if($contentdetails == false)
{
	showAlert("The details of the specified content could not be loaded. Please click on the content to view.");
	openPage("admins-list.php");
	exit;
}

$categorieslist = $dataRead->categories_list($mycon);

function checkIfAdminHasCategory($admin_categories, $category_id)
{
    foreach($admin_categories as $cat)
    {
    //var_dump($cat);
        if($category_id == $cat['category_id']) return true;
    }
    return false;
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
    <script src="htmlEditor.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(function() {
            //new nicEditor().panelInstance('txtName');
            new nicEditor({iconsPath : 'htmlEditor.gif'}).panelInstance('content');
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
                     <h2><?php echo $contentdetails['name'] ?></h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
            
            <form action="actionmanager.php" method="post" target="actionframe" role="form" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel panel-default">
                    <div class="panel-heading">
                      Admin Information
                    </div>
                      <div class="panel-body">
                        <div class="form-group">
                          <label for="name">name</label>
                          <input name="name" type="text" class="form-control" id="name" value="<?php echo $contentdetails['name'] ?>">
                        </div>
                        <div class="form-group oneline three">
                          <label for="username">Username</label>
                          <input name="username" type="text" class="form-control" id="username" value="<?php echo $contentdetails['username'] ?>" readonly disabled>
                        </div>
                        <div class="form-group oneline three">
                          <label for="password">Password</label>
                          <input name="password" type="password" class="form-control" id="password">
                        </div>
                        <div class="form-group oneline three">
                          <label for="password2">Password</label>
                          <input name="password2" type="password" class="form-control" id="password2">
                        </div>
                      
                      </div>
                      <!-- /.box-body -->
                    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                    <div class="panel-heading">
                      Admin categories
                    </div>
                    <div class="panel-body table-responsive">
                      <table id="tbl_lgas" class="table table-bordered table-hover">
                        <tbody>
<?php
//get the list of the lgas

foreach($categorieslist as $row)
{
?>                        
                          <tr>
                              <td><input type="checkbox" name="category_id[<?php echo $row['category_id'] ?>]" value="<?php echo $row['category_id'] ?>" <?php if(checkIfAdminHasCategory($contentdetails['categories'], $row['category_id'])) echo "checked" ?> /> <?php echo $row['name'] ?></td>
                          </tr>
<?php
    foreach($row['subcategories'] as $row)
    {
?>                        
                          <tr>
                            <td style="padding-left: 30px"><input type="checkbox" name="category_id[<?php echo $row['category_id'] ?>]" value="<?php echo $row['category_id'] ?>" <?php if(checkIfAdminHasCategory($contentdetails['categories'], $row['category_id'])) echo "checked" ?>  /> <?php echo $row['name'] ?></td>
                          </tr>
<?php
        
    }
}
?>                          
                        </tbody>
                      </table>
                    </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                <div class="col-md-12">
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Update Admin</button>
                      <input name="command" type="hidden" id="command" value="admins_edit">
                      <input name="admin_id" type="hidden" id="admin_id" value="<?php echo $contentdetails['admin_id'] ?>">
                    </div>
                </div>
                
                </div>
            </form>
                  
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
           
<link rel="stylesheet" type="text/css" href="jquery.datepick/jquery.datepick.css"> 
<script type="text/javascript" src="jquery.datepick/jquery.plugin.js"></script> 
<script type="text/javascript" src="jquery.datepick/jquery.datepick.js"></script>     
<script type="text/javascript">
$('.datepicker').datepick({dateFormat: 'yyyy-mm-dd'});
</script>   
    
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
