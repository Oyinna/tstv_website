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
                                    <img src="" class="user-image img-responsive"/>
					</li>
				
	<?php if(getCookie("adminlogin") == "YES") { ?>				
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"breakingnews.php") !== false) echo 'active-menu' ?>"  href="breakingnews.php"><i class="fa fa-arrow-circle-right fa-3x"></i> Breaking News</a>
                    </li>
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"banners.php") !== false) echo 'active-menu' ?>"  href="banners.php"><i class="fa fa-arrow-circle-right fa-3x"></i> Banners</a>
                    </li>
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"adverts.php") !== false) echo 'active-menu' ?>"  href="adverts.php"><i class="fa fa-arrow-circle-right fa-3x"></i> Adverts</a>
                    </li>
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"newsletter_subscribers.php") !== false) echo 'active-menu' ?>"  href="newsletter_subscribers.php"><i class="fa fa-arrow-circle-right fa-3x"></i> Newsletter Subscribers</a>
                    </li>
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"transmissions-") !== false || strpos(CurrentPageURL(),"transmissions-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-arrow-circle-right fa-3x"></i> Test Transmission<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"transmissions-") !== false || strpos(CurrentPageURL(),"transmissions-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="transmissions-add.php">Add Transmission</a>
                            </li>
                            <li>
                                <a href="transmissions-list.php">View Transmissions</a>
                            </li>
                            <li>
                                <a href="programs-list.php">View Reports</a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"channels-") !== false || strpos(CurrentPageURL(),"channels-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-arrow-circle-right fa-3x"></i> Channels<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"channels-") !== false || strpos(CurrentPageURL(),"programs-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="channels-add.php">Create new channel</a>
                            </li>
                            <li>
                                <a href="channels-list.php">View Channels</a>
                            </li>
                            <li>
                                <a href="programs-list.php">View Programs</a>
                            </li>
                            <li>
                                <a href="channels-categories.php">Channel Categories</a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"pages-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-arrow-circle-right fa-3x"></i> Edit Pages<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"pages-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="pages-about.php">About page</a>
                            </li>
                            <li>
                                <a href="pages-partners.php">Partners page</a>
                            </li>
                            <li>
                                <a href="pages-channels.php">Channels page</a>
                            </li>
                            <li>
                                <a href="pages-tstvbox.php">TStv Box</a>
                            </li>
                            <li>
                                <a href="pages-wheretobuy.php">Where to buy</a>
                            </li>
                            <li>
                                <a href="pages-usingtstv.php">Using TStv</a>
                            </li>
                            <li>
                                <a href="pages-faq.php">FAQ</a>
                            </li>
                            <li>
                                <a href="pages-contact.php">Contact Page</a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"articles-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-arrow-circle-right fa-3x"></i> Contents<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"articles-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="articles-categories.php">Categories</a>
                            </li>
                            <li>
                                <a href="articles-list.php">View Contents</a>
                            </li>
                            <li>
                                <a href="articles-add.php">Create new content</a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"trailers-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-arrow-circle-right fa-3x"></i> Trailers<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"trailers-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="trailers-list.php">View Trailers</a>
                            </li>
                            <li>
                                <a href="trailers-add.php">Create new trailer</a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"news-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-arrow-circle-right fa-3x"></i> News<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"news-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="news-list.php">View News</a>
                            </li>
                            <li>
                                <a href="news-add.php">Add News</a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"admins-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-users fa-3x"></i> Administrators<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"admins-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="admins-list.php">View Administrators</a>
                            </li>
                            <li>
                                <a href="admins-add.php">Add New Administrator</a>
                            </li>
                        </ul>
                    </li>  
        <?php } if(getCookie("departmentlogin") == "YES") { ?>				
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"gallery.php") !== false) echo 'active-menu' ?>"  href="departments-gallery.php"><i class="fa fa-arrow-circle-right fa-3x"></i> Photo Gallery</a>
                    </li>
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"content.php") !== false) echo 'active-menu' ?>"  href="departments-content.php"><i class="fa fa-arrow-circle-right fa-3x"></i> Content page</a>
                    </li>
                    <li>
                        <a class=" <?php if(strpos(CurrentPageURL(),"articles-") !== false) echo 'active-menu' ?>" href="#"><i class="fa fa-arrow-circle-right fa-3x"></i> Articles<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php if(strpos(CurrentPageURL(),"articles-") !== false) echo 'collapse in' ?>">
                            <li>
                                <a href="departments-articles-list.php">View Articles</a>
                            </li>
                            <li>
                                <a href="departments-articles-add.php">Create new article</a>
                            </li>
                        </ul>
                    </li>  
                    
        <?php } ?>            
                </ul>
               
            </div>
<iframe name="actionframe" id="actionframe" width="300px" height="300px" frameborder="0"></iframe> 
            
        </nav>  
           
<script type="text/javascript">
	window.setTimeout(function(){
    	document.location.href="index.php?logout=yes";
    },900000);
</script>