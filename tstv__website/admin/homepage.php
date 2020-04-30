<?php
require_once("config.php");

$currentuserid = getCookie("userid");

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

$contentsdetails = $dataRead->contents_get($mycon);

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
            new nicEditor({iconsPath : 'htmlEditor.gif'}).panelInstance('story');
            new nicEditor({iconsPath : 'htmlEditor.gif'}).panelInstance('fines');
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
                     <h2>Home page contents</h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                    <div class="panel-heading">
                      Update contents
                    </div>
                      <div class="panel-body">
                    <form action="actionmanager.php" method="post" target="actionframe" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="home_welcome_title">Welcome title</label>
                          <input name="contents[home_welcome_title]" type="text" class="form-control" id="home_welcome_title" value="<?php echo (isset($contentsdetails['home_welcome_title'])) ? $contentsdetails['home_welcome_title'] : '' ?>">
                        </div>
                        <div class="form-group oneline three">
                          <label for="home_box1_title">Column 1 title</label>
                          <input name="contents[home_box1_title]" type="text" class="form-control" id="home_box1_title" value="<?php echo (isset($contentsdetails['home_box1_title'])) ? $contentsdetails['home_box1_title'] : '' ?>">
                        </div>
                        <div class="form-group oneline three">
                          <label for="home_box2_title">Column 2 title</label>
                          <input name="contents[home_box2_title]" type="text" class="form-control" id="home_box2_title" value="<?php echo (isset($contentsdetails['home_box2_title'])) ? $contentsdetails['home_box2_title'] : '' ?>">
                        </div>
                        <div class="form-group oneline three">
                          <label for="home_box3_title">Column 3 title</label>
                          <input name="contents[home_box3_title]" type="text" class="form-control" id="home_box3_title" value="<?php echo (isset($contentsdetails['home_box3_title'])) ? $contentsdetails['home_box3_title'] : '' ?>">
                        </div>
                        <div class="form-group oneline three">
                          <label for="home_box1_caption">Column 1 caption</label>
                          <textarea name="contents[home_box1_caption]" rows="3" class="form-control" id="home_box1_caption"><?php echo (isset($contentsdetails['home_box1_caption'])) ? $contentsdetails['home_box1_caption'] : '' ?></textarea>
                        </div>
                        <div class="form-group oneline three">
                          <label for="home_box2_caption">Column 2 caption</label>
                          <textarea name="contents[home_box2_caption]" rows="3" class="form-control" id="home_box2_caption"><?php echo (isset($contentsdetails['home_box2_caption'])) ? $contentsdetails['home_box2_caption'] : '' ?></textarea>
                        </div>
                        <div class="form-group oneline three">
                          <label for="home_box3_caption">Column 3 caption</label>
                          <textarea name="contents[home_box3_caption]" rows="3" class="form-control" id="home_box3_caption"><?php echo (isset($contentsdetails['home_box3_caption'])) ? $contentsdetails['home_box3_caption'] : '' ?></textarea>
                        </div>
                        <div class="form-group oneline three">
                          <label for="home_box1_image">Column 1 image</label>
                          <input name="pictures[home_box1_image]" type="file" class="form-control" id="home_box1_image">
                        </div>
                        <div class="form-group oneline three">
                          <label for="home_box2_image">Column 2 image</label>
                          <input name="pictures[home_box2_image]" type="file" class="form-control" id="home_box2_image">
                        </div>
                        <div class="form-group oneline three">
                          <label for="home_box3_image">Column 3 image</label>
                          <input name="pictures[home_box3_image]" type="file" class="form-control" id="home_box3_image">
                        </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update Contents</button>
                        <input name="command" type="hidden" id="command" value="contents_edit">
                      </div>
                      
                    </form>
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
