        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">TStv Dealers</a> 
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
                        <a class=" <?php if(strpos(CurrentPageURL(),"manager_dashboard.php") !== false) echo 'active-menu' ?>"  href="manager_dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"manager_registrations-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-plus fa-3x"></i> Registrations<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"manager_registrations-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="manager_registrations-list.php">View Registrations</a>
                            </li>
                            <li>
                                <a href="manager_registrations-old-list.php">Old Registrations</a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"manager_dealers-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-user fa-3x"></i> Dealers<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"manager_dealers-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="manager_dealers-list.php">View Dealers</a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"reports-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-bar-chart-o fa-3x"></i> Reports<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"reports-") !== false) echo 'collapse in' ?>">
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