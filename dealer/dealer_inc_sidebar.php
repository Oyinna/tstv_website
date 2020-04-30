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
                        <a class=" <?php if(strpos(CurrentPageURL(),"dealer_dashboard.php") !== false) echo 'active-menu' ?>"  href="dealer_dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"dealer_decoders-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-arrow-circle-right fa-3x"></i> Decoders<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"dealer_decoders-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="dealer_decoders-purchases-add.php">New Purchase</a>
                            </li>
                            <li>
                                <a href="dealer_decoders-purchases-list.php">View Purchases</a>
                            </li>
                            <li>
                                <a href="dealer_decoders-collections-list.php">Decoder Collection</a>
                            </li>
                            <li>
                                <a href="#">Decoder Returns</a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"dealer_sales-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-arrow-circle-right fa-3x"></i> Sales<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"dealer_sales-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="dealer_sales-add.php">New Sale</a>
                            </li>
                            <li>
                                <a href="dealer_sales-list.php">View Sales</a>
                            </li>
                            <li>
                                <a href="#">Customer Registration</a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"dealer_activations-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-arrow-circle-right fa-3x"></i> Activations<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"dealer_activations-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="dealer_activations-find.php">Customer information</a>
                            </li>
                            <li>
                                <a href="dealer_activations-add.php">New Activation</a>
                            </li>
                            <li>
                                <a href="dealer_activations-find.php">Re-activations</a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"dealer_transactions-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-arrow-circle-right fa-3x"></i> Transactions<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"dealer_transactions-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="dealer_transactions-add.php">Submit Payment information</a>
                            </li>
                            <li>
                                <a href="dealer_transactions-list.php">View Transactions</a>
                            </li>
                            <li>
                                <a href="dealer_transactions-commissions.php">View Commissions</a>
                            </li>
                            <li>
                                <a href="#">Receipts & Waybills</a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"dealer_reports-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-bar-chart-o fa-3x"></i> Reports<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"dealer_reports-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="#">Transaction Reports</a>
                            </li>
                            <li>
                                <a href="#">Purchase Reports</a>
                            </li>
                            <li>
                                <a href="#">Sales Reports</a>
                            </li>
                            <li>
                                <a href="#">Subscription Reports</a>
                            </li>
                            <li>
                                <a href="#">Commission Reports</a>
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