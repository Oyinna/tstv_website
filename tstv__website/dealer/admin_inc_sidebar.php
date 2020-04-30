        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">TStv Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Welcome <?php echo getCookie("fullname") ?> &nbsp; <a href="index.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                                    <div style="padding: 10px"><img style="width: 100%; opacity: 0.5" src="../images/logo_footer.png" /></div>
					</li>
				
					
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"dashboard.php") !== false) echo 'active-menu' ?>"  href="admin_dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"admin_registrations-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-plus fa-3x"></i> Registrations<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"admin_registrations-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="admin_registrations-add.php">Add New Registrations</a>
                            </li>
                            <li>
                                <a href="admin_registrations-list.php">View Registrations</a>
                            </li>
                            <li>
                                <a href="admin_registrations-messageall.php">Message All Registrations</a>
                            </li>
                            <li>
                                <a href="admin_registrations-old-list.php">Old Registrations</a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"admin_managers-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-user fa-3x"></i> Zonal Managers<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"admin_managers-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="admin_managers-list.php">View Zonal Managers</a>
                            </li>
                            <li>
                                <a href="admin_managers-add.php">Add Zonal Manager</a>
                            </li>
                            <li>
                                <a href="admin_managers-messageall.php">Message Zonal Manager</a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"admin_dealers-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-user fa-3x"></i> Dealers<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"admin_dealers-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="admin_dealers-list.php">View Dealers</a>
                            </li>
                            <li>
                                <a href="admin_dealers-messageall.php">Message Dealers</a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"admin_retailers-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-user fa-3x"></i> Retailers<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"admin_retailers-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="admin_retailers-list.php">View Retailers</a>
                            </li>
                            <li>
                                <a href="admin_retailers-messageall.php">Message Retailers</a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"reports-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-bar-chart-o fa-3x"></i> Reports<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"reports-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="#">Zonal Managers' Reports</a>
                            </li>
                            <li>
                                <a href="#">Dealers' Reports</a>
                            </li>
                            <li>
                                <a href="#">Retailers' Reports</a>
                            </li>
                            <li>
                                <a href="#">Sales Reports</a>
                            </li>
                        </ul>
                     </li>  
                </ul>
               
            </div>
<iframe name="actionframe" id="actionframe" width="300px" height="300px" frameborder="0"></iframe> 
            
        </nav>  
           
<script type="text/javascript">
	window.setTimeout(function(){
    	document.location.href="index.php?logout=yes";
    },900000);
</script>