<?php
require_once("config.php");

if(isset($_POST['username']) && isset($_POST['password']))
{
    $channels = array();
    $channels["hitsafrica"] = "histafrica1.";
    $channels["nctv"] = "nctv2.";
    //check if the username the user specified matched any key of the channels array
    username != $channels[username];
    echo ("Please enter the correct username");
    exit;
    password != $channels[password];
    echo ("Please enter the correct password");
    exit;
 
//    if(isset($_POST['username'])!= $channels);
//        showAlert("invalid username or password");
          openPage("video_upload_view.php");
        
}
//createCookie("channel_name",$channels['hitsafrica']);

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?php pageTitle() ?></title>
                <meta name="keywords" content="<?php seoPageContent() ?>" />
                <meta name="description" content="<?php seoPageDescriptions() ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Awesomefont -->
		<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<!-- General CSS Settings -->
		<link rel="stylesheet" href="css/general_style.css">
		<!-- Main Style of the template -->
		<link rel="stylesheet" href="css/main_style.css?v=<?php echo time() ?>" title="main">
		<!-- Landing Page Style -->
		<link rel="stylesheet" href="css/reset_style.css">
		<!-- Fav Icon -->
                <link rel="icon" type="image/png" href="images/favicon.png" />
                <link href="css/login.css" rel="stylesheet" type="text/css" />
    </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo" style="margin: 0px">
            <a href="#">
                <img src="images/logo.png" alt="" style="height: 60px" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content" style="margin-top: 10px">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="" method="post" target="actionframe">
                <h3 class="form-title font-green">TStv Africa</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter username and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                <div class="form-actions">
                    <input type="hidden" name="command"/>
                    <button type="submit" class="btn green uppercase">Login</button>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>     
        <iframe name="actionframe" id="actionframe" width="300" height="300"></iframe>
        <div class="copyright"> <?php echo date("Y") ?> © TStv Africa. </div>
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<script src="assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
    </body>

</html>