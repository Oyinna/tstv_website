<?php
require_once("config.php");

$currentuserid = getCookie("userid");
$currentusername = getCookie("username");

//prevent non admin from accessing page 
if($currentusername != "administrator")
{
    openPage("user_articles-add.php");
    exit;
}

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

$categorieslist = $dataRead->categories_list($mycon);


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
                     <h2>Add New Content</h2>   
                        <h5>Create a new content item </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
            <form action="actionmanager.php" method="post" target="actionframe" role="form" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel panel-default">
                    <div class="panel-heading">
                      Content Information
                    </div>
                      <div class="panel-body">
                        <div class="form-group">
                          <label for="category_id">Category</label>
                          <select name="category_id" class="form-control">
                              <option value="">Select..</option>
                    <?php foreach ($categorieslist as $row) { ?>
                              <option value="<?php echo $row['category_id'] ?>"><?php echo $row['name'] ?></option>
                    <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="code">Headline</label>
                          <input name="headline" type="text" class="form-control" id="headline">
                        </div>
                        <div class="form-group">
                          <label for="caption">Caption</label>
                          <textarea name="caption" rows="3" class="form-control" id="caption"></textarea>
                        </div>
                        <div class="form-group oneline two">
                          <label for="image">Image</label>
                          <input name="image" type="file" class="form-control" id="image">
                        </div>
                        <div class="form-group oneline two">
                          <label for="banner">Banner</label>
                          <input name="banner" type="file" class="form-control" id="banner">
                        </div>
                        <div class="form-group">
                          <label for="content">Content</label>
                          <textarea name="content" rows="3" class="form-control" id="content"></textarea>
                        </div>
                      
                      </div>
                      <!-- /.box-body -->
                    </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                  <div class="box-footer" style="display: block">
                    <button type="submit" class="btn btn-primary">Save Content</button>
                    <input name="command" type="hidden" id="command" value="articles_add">
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
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
            
<link rel="stylesheet" type="text/css" href="jquery.datepick/jquery.datepick.css"> 
<script type="text/javascript" src="jquery.datepick/jquery.plugin.js"></script> 
<script type="text/javascript" src="jquery.datepick/jquery.datepick.js"></script>     
<script type="text/javascript">
$('.datepicker').datepick({dateFormat: 'yyyy-mm-dd'});
</script>   
  
</body>
</html>
