<?php
require_once("config.php");

$currentuserid = getCookie("userid");
if(getCookie("adminlogin") != "YES")
{
    showAlert("You do not have access to perform this action");
    openPage("index.php");
    exit;
}



$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

$registrationslist = $dataRead->registrations_list_old($mycon,"","");

$emails = "";
$phones = "";
foreach($registrationslist as $row)
{
    $emails = ($emails == "") ? $row['email'] : $emails.",".$row['email'];
    $phones = ($phones == "") ? $row['phone'] : $phones.",".$row['phone'];
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
                new nicEditor({iconsPath : 'htmlEditor.gif'}).panelInstance('message_email');
        });
        </script>        
</head>
<body>
    <div id="wrapper">
        <?php require("admin_inc_sidebar.php"); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Message all Registrations</h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                    <div class="row">
                        <div class="col-md-8">
                    
                  <div class="panel panel-default">
                    <!-- /.box-header -->
                    <div class="panel-heading">
                      Message Registrations
                    </div>
                      <div class="panel-body">
                    <form action="actionmanager.php" method="post" target="actionframe" role="form">
                    <div id="step1">
                      <div class="box-body">
                        <div class="form-group oneline two">
                          <label for="message_type">Message type</label>
                          <select name="message_type" class="form-control" id="message_type">
                            <option value="email">Email</option>
                            <option value="sms">SMS</option>
                          </select>
                        </div>
                        <div class="form-group oneline two">
                          <label for="subject">Subject</label>
                          <input name="subject" type="text" class="form-control" id="subject">
                        </div>
                        <div class="form-group" id="div_message_email">
                          <label for="message_email">Message</label>
                          <textarea name="message_email" type="text" class="form-control" rows="5" id="message_email"></textarea>
                        </div>
                        <div class="form-group" id="div_message_sms" style="display: none;">
                          <label for="message_sms">Message</label>
                          <textarea name="message_sms" type="text" class="form-control" rows="5" id="message_sms"></textarea>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Send Message</button>
                        <input name="command" type="hidden" id="command" value="admin_registrations-messageall-old">
                      </div>
                      </div>
                      

                    </form>
                    
                      </div>
                      

                  </div>
                      
                  <div class="panel panel-default">
                    <!-- /.box-header -->
                    <div class="panel-heading">
                      Contacts extract
                    </div>
                      <div class="panel-body">
                    <div id="step1">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="message_email">Email addresses of dealers</label>
                          <textarea name="message_email" type="text" class="form-control" rows="5" id="message_email"><?php echo $emails ?></textarea>
                        </div>
                        <div class="form-group" id="div_message_sms">
                          <label for="message_sms">Phone numbers</label>
                          <textarea name="message_sms" type="text" class="form-control" rows="5" id="message_sms"><?php echo $phones ?></textarea>
                        </div>
                      </div>
                      <!-- /.box-body -->
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
