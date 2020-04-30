<?php
require_once("config.php");
$currentuserid = getCookie("userid");
if(getCookie("managerlogin") != "YES")
{
    showAlert("You do not have access to perform this action");
    openPage("index.php");
    exit;
}

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();


$sql = "";
$param = Array();

$datefrom = date("Y-m-d",strtotime("- 1 week"));
//$sql.= " AND (p.`createdby` = :createdby)";
//$param[":createdby"] = $currentuserid;
if(isset($_POST['search']) && $_POST['search'] != "")
{
    $search = $_POST['search'];
    $sql .= " AND (`company` LIKE :company OR `firstname` LIKE :firstname OR `surname` LIKE :surname) ";
    $param[":company"] = "%$search%";
    $param[":firstname"] = "%$search%";
    $param[":surname"] = "%$search%";
}
if(isset($_POST['regtype']) && $_POST['regtype'] != "")
{
    $search = $_POST['regtype'];
    $sql .= " AND (`type` = :type) ";
    $param[":type"] = "$search";
}
if(isset($_POST['state']) && $_POST['state'] != "")
{
    $search = $_POST['state'];
    $sql .= " AND (`state` = :state) ";
    $param[":state"] = "$search";
}
if(isset($_POST['datefrom']) && $_POST['datefrom'] != "")
{
    $search = $_POST['datefrom'];
    $sql .= " AND (`thedate` >= :datefrom) ";
    $param[":datefrom"] = "$search 00:00:00";
}
if(isset($_POST['dateto']) && $_POST['dateto'] != "")
{
    $search = $_POST['dateto'];
    $sql .= " AND (`thedate` <= :dateto) ";
    $param[":dateto"] = "$search 23:59:59";
}
	
if($sql == "")
{
    $sql = " AND (`status` = 0) ORDER BY `registration_id` DESC LIMIT 1200";
    $param = array();
}
else
{
    $sql .= " AND (`status` = 0)";
}

//$sql .= " AND `registration_type` = '5' ORDER BY `thedate` DESC";


$registrationslist = $dataRead->registrations_list($mycon,$sql,$param);


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
    <style>
        /* modified for E-save */
.form-group.oneline.five {
	margin-right:1%;
	width:19%;
	float:left;
}

    </style>

</head>
<body>
    <div id="wrapper">
        <?php require("manager_inc_sidebar.php"); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Dealer registrations pending approval</h2>   
                        <h5> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                    <div class="panel-heading">
                      Search
                    </div>
                      <div class="panel-body">
                    <form action="" method="post" role="form" enctype="multipart/form-data">
                        <div class="form-group oneline five">
                          <label for="search">Search text</label>
                          <input name="search" type="text" class="form-control" value="<?php if(isset($_POST['search'])) echo $_POST['search'] ?>">
                        </div>
                        <div class="form-group oneline five">
                          <label for="state">Type</label>
                            <select name="regtype" class="form-control">
                                  <option value="" selected="selected">- All -</option>
                                  <option value="Super Dealer" <?php if(isset($_POST['regtype']) && $_POST['regtype'] == "Super Dealer") echo "selected" ?>>Super Dealer</option>
                                  <option value="Sub Dealer" <?php if(isset($_POST['regtype']) && $_POST['regtype'] == "Sub Dealer") echo "selected" ?>>Sub Dealer</option>
                                  <option value="Retailer" <?php if(isset($_POST['regtype']) && $_POST['regtype'] == "Retailer") echo "selected" ?>>Retailer</option>
                            </select>
                        </div>
                        <div class="form-group oneline five">
                          <label for="state">State</label>
                            <select name="state" class="form-control">
                                  <option value="" selected="selected">- All -</option>
                <?php foreach(getStatesList() as $state) { ?>
                                  <option value="<?php echo $state ?>" <?php if(isset($_POST['state']) && $_POST['state'] == $state) echo "selected" ?>><?php echo $state ?></option>
                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group oneline five">
                          <label for="datefrom">Date from</label>
                          <input name="datefrom" type="text" class="form-control datepicker" value="<?php if(isset($_POST['datefrom'])) echo $_POST['datefrom'] ?>">
                        </div>
                        <div class="form-group oneline five">
                          <label for="dateto">Date to</label>
                          <input name="dateto" type="text" class="form-control datepicker" value="<?php if(isset($_POST['dateto'])) echo $_POST['dateto'] ?>">
                        </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Go!</button>
                      </div>
                      
                    </form>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      List of registrations
                    </div>
                    <!-- /.box-header -->
                    <div class="panel-body table-responsive">
                      <table id="tbl_lgas" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Reg ID</th>
                            <th>Type</th>
                            <th>Company Name</th>
                            <th>Contact Person</th>
                            <th>State</th>
                            <th>Email</th>
                            <th>Phone</th>
                          </tr>
                        </thead>
                        <tbody>
<?php
//get the list of the lgas

foreach($registrationslist as $row)
{
?>                        
                          <tr>
                            <td><?php echo formatDate($row['thedate'],"no") ?></td>
                            <td><a href="manager_registrations-view.php?code=<?php echo $row['registration_id'] ?>"><?php echo $row['registration_id'] ?></a></td>
                            <td><?php echo $row['type'] ?></td>
                            <td><a href="manager_registrations-view.php?code=<?php echo $row['registration_id'] ?>"><?php echo $row['company'] ?></a></td>
                            <td><?php echo $row['firstname']." ".$row['surname'] ?></td>
                            <td><?php echo $row['state'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
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
