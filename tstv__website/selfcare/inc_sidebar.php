<?php
require_once("config.php");
$currentuserid = getCookie("userid");

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

$contentslist_sidebar = $dataRead->articles_list($mycon, "ORDER BY rand() LIMIT 4", "");
$categorieslist_sidebar = $dataRead->categories_list($mycon);

?>
<style>
    .lx-news-item-text h3 {
        height: 35px;
        overflow: hidden;
    }
    .lx-news-item-text p {
        height: 50px;
        overflow: hidden;
    }
    .lx-news-item-img.large {
        height: 210px;
    }
    .lx-news-item-img.small {
        height: 80px;
    }
    .lx-news-item {
        width: 90%;
         margin-bottom: 20px;
        border-bottom: 1px solid #34A84B33;
   }
    .lx-news-item-img img {
        height: 30px;
        margin-bottom: 20px;
    }
    .lx-single-post-content {
        padding-left: 20px;
    }
    .lx-news-item-text h3 a {
        font-size: 13px;
        color: #424242;
    }
    .lx-news-item-img img {
        margin-bottom: 10px;
    }
</style>                

<div class="lx-sidebar">
            <div class="lx-sidebar-item-title">
                <h2>&nbsp;</h2>
            </div>
<div class="lx-news-container">
        <!-- News Container Content -->
        <div class="lx-news-container-content">
                <div class="lx-g2-f">
                        <!-- News Item Sticky -->
                        <div class="lx-news-item lx-mr-14">
                                <div class="lx-news-item-img">
                                    <a href="#"><img src="images/user-128.png" alt="" /></a>
                                </div>
                                <div class="lx-news-item-text">
                                        <h3><a href="#">My Account</a></h3>
                                </div>											
                        </div>
                </div>
                <div class="lx-g2-f">
                        <!-- News Item Sticky -->
                        <div class="lx-news-item lx-mr-14">
                                <div class="lx-news-item-img">
                                    <a href="#"><img src="images/pay-128.png" alt="" /></a>
                                </div>
                                <div class="lx-news-item-text">
                                        <h3><a href="#">Pay Subscription</a></h3>
                                </div>											
                        </div>
                </div>
                <div class="lx-g2-f">
                        <!-- News Item Sticky -->
                        <div class="lx-news-item lx-mr-14">
                                <div class="lx-news-item-img">
                                    <a href="#"><img src="images/fix-128.png" alt="" /></a>
                                </div>
                                <div class="lx-news-item-text">
                                        <h3><a href="#">Fix a problem</a></h3>
                                </div>											
                        </div>
                </div>
                <div class="lx-g2-f">
                        <!-- News Item Sticky -->
                        <div class="lx-news-item lx-mr-14">
                                <div class="lx-news-item-img">
                                    <a href="#"><img src="images/instruction-128.png" alt="" /></a>
                                </div>
                                <div class="lx-news-item-text">
                                        <h3><a href="#">Instruction Videos</a></h3>
                                </div>											
                        </div>
                </div>
                <div class="lx-g2-f">
                        <!-- News Item Sticky -->
                        <div class="lx-news-item lx-mr-14">
                                <div class="lx-news-item-img">
                                    <a href="#"><img src="images/contact-128.png" alt="" /></a>
                                </div>
                                <div class="lx-news-item-text">
                                        <h3><a href="#">Contact Support</a></h3>
                                </div>											
                        </div>
                </div>
                <div class="lx-g2-f">
                        <!-- News Item Sticky -->
                        <div class="lx-news-item lx-mr-14">
                                <div class="lx-news-item-img">
                                    <a href="#"><img src="images/hdtv-128.png" alt="" /></a>
                                </div>
                                <div class="lx-news-item-text">
                                        <h3><a href="#">TStv Guide</a></h3>
                                </div>											
                        </div>
                </div>
                <div class="lx-g2-f">
                        <!-- News Item Sticky -->
                        <div class="lx-news-item lx-mr-14">
                                <div class="lx-news-item-img">
                                    <a href="#"><img src="images/channels-128.png" alt="" /></a>
                                </div>
                                <div class="lx-news-item-text">
                                        <h3><a href="#">TStv Channels</a></h3>
                                </div>											
                        </div>
                </div>
                <div class="lx-g2-f">
                        <!-- News Item Sticky -->
                        <div class="lx-news-item lx-mr-14">
                                <div class="lx-news-item-img">
                                    <a href="#"><img src="images/hdtv-128.png" alt="" /></a>
                                </div>
                                <div class="lx-news-item-text">
                                        <h3><a href="#">Trailers</a></h3>
                                </div>											
                        </div>
                </div>
                <div class="lx-g2-f">
                        <!-- News Item Sticky -->
                        <div class="lx-news-item lx-mr-14">
                                <div class="lx-news-item-img">
                                    <a href="#"><img src="images/trailer-128.png" alt="" /></a>
                                </div>
                                <div class="lx-news-item-text">
                                        <h3><a href="#">TStv Installers</a></h3>
                                </div>											
                        </div>
                </div>
                <div class="lx-g2-f">
                        <!-- News Item Sticky -->
                        <div class="lx-news-item lx-mr-14">
                                <div class="lx-news-item-img">
                                    <a href="#"><img src="images/sms-128.png" alt="" /></a>
                                </div>
                                <div class="lx-news-item-text">
                                        <h3><a href="#">USSD/SMS Commands</a></h3>
                                </div>											
                        </div>
                </div>
                <div class="lx-clear-fix"></div>
        </div>
</div>

        <!-- Side Bar Item -->
</div>