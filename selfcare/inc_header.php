<?php
require_once("config.php");
$currentuserid = getCookie("userid");

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

?>

<div class="lx-header lx-header-horizontal">
        <!-- Header Mobile Menu Button -->
        <div class="lx-header-content">
                <div class="lx-header-content-top">
                        <!-- Header Date -->
                        <div class="lx-header-date toplinks">
                            <a href="../" class="active">TStv Website</a> |
                            <a href="#" class="active">Login</a> |
                            <a href="#" class="active">Log Out</a> |
                            <a href="#" target="_blank" class="active">Register</a>
                        </div>
                        <div class="lx-header-date">
                                <span><?php echo date("D, d") ?><sup>th</sup> <?php echo date("F Y") ?></span>
                        </div>
                        <div class="lx-clear-fix"></div>
                </div>
                <div class="lx-header-content-bottom">
                        <!-- Header Logo -->
                        <div class="lx-header-logo">
                            <a href="../index.php"><img src="images/logo.png" style="height: 70px" /></a>
                        </div>
                        <!-- Header Menu -->
                        <div class="lx-header-main-menu">
                                <a href="javascript:;"><i class="fa fa-bars"></i></a>
                                <ul>
                                        <li><a href="index.php">HOME</a></li>
                                        <li><a href="#">TV GUIDE</a></li>
                                        <li><a href="#">WATCH TStv<i class="fa fa-caret-down"></i></a>
                                                <!-- Header Sub Menu -->
                                                <ul class="lx-header-sub-menu">
                                                    <li><a href="#">TStv Channels</a></li>
                                                    <li><a href="#">TStv Programs</a></li>
                                                    <li><a href="#">Trailers</a></li>
                                                </ul>									
                                        </li>
                                        <li><a href="#">SUBSCRIPTIONS<i class="fa fa-caret-down"></i></a>
                                                <!-- Header Sub Menu -->
                                                <ul class="lx-header-sub-menu">
                                                    <li><a href="#">Pay Subscription</a></li>
                                                    <li><a href="#">Where to buy</a></li>
                                                    <li><a href="#">Fix a Problem</a></li>
                                                </ul>										
                                        </li>
                                        <li><a href="#">HOW TO..<i class="fa fa-caret-down"></i></a>
                                                <!-- Header Sub Menu -->
                                                <ul class="lx-header-sub-menu">
                                                    <li><a href="#">Instruction Videos</a></li>
                                                    <li><a href="#">SMS Commands</a></li>
                                                    <li><a href="#">USSD Commands</a></li>
                                                </ul>										
                                                									
                                        </li>
                                        <li><a href="contactus.php">CONTACT</a>
                                            <ul class="lx-header-sub-menu">
                                                <li><a href="#">Customer care</a></li>
                                                <li><a href="#">Service centers</a></li>
                                            </ul>	
                                        </li>
                                <div class="lx-clear-fix"></div>
                        </div>
                </div>
        </div>
</div>
