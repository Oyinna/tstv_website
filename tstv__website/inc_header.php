<?php
require_once("config.php");
$currentuserid = getCookie("userid");

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

?>
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-62062844-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());

  gtag('config', 'UA-62062844-2');
</script>

<div class="lx-header lx-header-horizontal">
        <!-- Header Mobile Menu Button -->
        <div class="lx-header-content">
                <div class="lx-header-content-top">
                        <!-- Header Date -->
                        <div class="lx-header-date toplinks">
                            <a href="wheretobuy.php" class="active">Where to buy</a> |
                            <a href="selfcare/" class="active">Self Service</a> |
                            <a href="dealer_register.php" class="active">Become a dealer</a> |
                            <a href="billing/dealer/index.php" target="_blank" class="active">Dealers Portal</a>
                        </div>
                        <div class="lx-header-date">
                                <span><?php echo date("D, d") ?><sup>th</sup> <?php echo date("F Y") ?></span>
                        </div>
                        <div class="lx-clear-fix"></div>
                </div>
                <div class="lx-header-content-bottom">
                        <!-- Header Logo -->
                        <div class="lx-header-logo">
                            <a href="index.php"><img src="images/logo.png" style="height: 70px; width: auto;" /></a>
                        </div>
                        <!-- Header Menu -->
                        <div class="lx-header-main-menu">
                                <a href="javascript:;"><i class="fa fa-bars"></i></a>
                                <ul>
                                        <li><a href="index.php" class="active">HOME</a></li>
                                        <li><a href="transmissions.php">TRANSMISSION</a></li>
                                        <li><a href="#">MY TStv<i class="fa fa-caret-down"></i></a>
                                                <!-- Header Sub Menu -->
                                                <ul class="lx-header-sub-menu">
                                                    <li><a href="aboutus.php">Now Showing</a></li>
                                                    <li><a href="channels.php">All Channels</a></li>
                                                    <li><a href="tstvbox.php">TStv Box</a></li>
                                                    <li><a href="wheretobuy.php">Where to Buy</a></li>
                                                    <li><a href="usingtstv.php">Using TStv</a></li>
                                                </ul>									
                                        </li>
                                        <li><a href="#">HELP & SUPPORT<i class="fa fa-caret-down"></i></a>
                                                <!-- Header Sub Menu -->
                                                <ul class="lx-header-sub-menu">
                                                    <li><a href="faq.php">Fix a Problem</a></li>
                                                    <li><a href="wheretobuy.php">Where to buy</a></li>
                                                    <li><a href="faq.php">FAQ</a></li>
                                                </ul>										
                                        </li>
                                        <li><a href="#">TELCOMSAT<i class="fa fa-caret-down"></i></a>
                                                <!-- Header Sub Menu -->
                                                <ul class="lx-header-sub-menu">
                                                    <li><a href="aboutus.php">About</a></li>
                                                    <li><a href="partners.php">Partners</a></li>
                                                </ul>										
                                        </li>
                                        <li><a href="#">MEDIA<i class="fa fa-caret-down"></i></a>
                                                <!-- Header Sub Menu -->
                                                <ul class="lx-header-sub-menu">
                                                    <li><a href="news.php">TStv in the News</a></li>
                                                </ul>										
                                        </li>
                                        <li><a href="contactus.php">CONTACT</a></li>
                                <div class="lx-clear-fix"></div>
                        </div>
                </div>
        </div>
</div>
