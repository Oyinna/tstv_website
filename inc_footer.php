<?php
require_once("config.php");
require_once("inc_dbfunctions.php");
$mycon = databaseConnect();

$dataRead = New DataRead();
$channelslist_footer = $dataRead->channels_list($mycon);

?>

<style>
/* Tiny Carousel */
#slider1 {
height: 1%;
overflow: hidden;
padding: 0 0 10px;
}
#slider1 .viewport {
float: left;
width: 100%;
height: 125px;
overflow: hidden;
position: relative;
}
#slider1 .buttons {
background: url("../images/buttons.png") no-repeat scroll 0 0 transparent;
display: block;
margin: 30px 10px 0 0;
background-position: 0 -38px;
text-indent: -999em;
float: left;
width: 39px;
height: 37px;
overflow: hidden;
position: relative;
}
#slider1 .next {
background-position: 0 0;
margin: 30px 0 0 10px;
}
#slider1 .disable {
visibility: hidden;
}
#slider1 .overview {
list-style: none;
position: absolute;
padding: 0;
margin: 0;
width: 240px;
left: 0 top: 0;
}
</style>
                                                                <!-- News Container -->
								<div class="lx-news-container" style="padding-top: 10px; overflow: hidden; max-height: 100px;">
									<!-- News Container Content -->
                                                                            <div id="slider1">
<div class="viewport">
<ul class="overview">
<?php
foreach($channelslist_footer as $row)
{
    break;
?>
    <li class="channels_logos"><img src="pictures/channels/<?php echo $row['channel_id'] ?>.jpg" alt="<?php echo $row['name'] ?>" /></li>
<?php
}
?>
</ul>
</div>
 </div>
										<div class="lx-clear-fix"></div>
								</div>
<div class="lx-footer-content">
        <!-- Footer Content Top -->
        <div class="lx-footer-content-top">
                <!-- Footer Newsletter -->
        <div style="width: 100%; max-width: 1170px; margin: 0 auto;">
                <div class="lx-footer-newsletter">
                    <form action="admin/actionmanager.php" method="post" target="actionframe">
                                <label for="email">Subscribe to our newsletter</label>
                                <input type="text" name="email" id="email" placeholder="Your email ..." />
                                <input type="hidden" name="command" id="command" value="newsletter_subscribe" />
                                <input type="submit" name="submit" value="SUBSCRIBE" />
                        </form>
                </div>
                <!-- Footer Social Media -->
                <div class="lx-footer-social-media">
                        <ul>
                                <li><a href="https://www.facebook.com/TSTVAfrica/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/tstvafrica"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/tstvafrica"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://www.youtube.com/tstvafrica"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="https://www.instagram.com/tstvafrica"><i class="fa fa-instagram"></i></a></li>
                        </ul>									
                </div>
        </div>
                <div class="lx-clear-fix"></div>
        </div>
        <!-- Footer Bottom -->
            <div class="lx-footer-content-bottom">
        <div style="width: 100%; max-width: 1170px; margin: 0 auto;">
                    <div class="lx-g3-f">
                            <!-- Footer Copyrights -->
                            <div class="lx-footer-copyrights">
                                    <img src="images/logo_footer.png" alt="alternative title" />
                                    <p style="margin-top: 20px; font-size: 12px;">&copy 2017 Telcomsat Limited. All rights reserved</p>
                            </div>									
                    </div>
                    <div class="lx-g5-f">
                            <!-- Footer Links -->
                            <div class="lx-footer-links">
                                    <h2>LINKS</h2>
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="channels.php">My TStv</a></li>
                                        <li><a href="faq.php">Help & Support</a></li>
                                        <li><a href="aboutus.php">Telcomsat</a></li>
                                            <li><a href="#">TV Schedule</a></li>
                                            <li><a href="news.php">Media</a></li>
                                            <li><a href="contactus.php">Contact Us</a></li>											
                                    </ul>
                            </div>
                    </div>
                    <div class="lx-g2-f" style="width: 46%">
                            <!-- Footer Links -->
                                <?php require_once("inc_adverts.php"); show_advert_box(); ?>
                    </div>
                    <div class="lx-clear-fix"></div>
            </div>
        </div>
    <iframe name="actionframe" id="actionframe" frameborder="0" height="301" width="301" ></iframe>
        
</div>
<script src="js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="js/jquery.tinycarousel.min.js"></script>

<script type="text/javascript">
(function ($) {    
$(document).ready(function(){
$('#slider1').tinycarousel({
start: 1, // where should the carousel start?
display: 3, // how many blocks do you want to move at a time?
axis: 'x', // vertical or horizontal scroller? 'x' or 'y' .
controls: false, // show left and right navigation buttons?
pager: false, // is there a page number navigation present?
interval: true, // move to the next block on interval.
intervaltime: 3000, // interval time in milliseconds.
animation: true, // false is instant, true is animate.
duration: 1000, // how fast must the animation move in milliseconds?
callback: null, // function that executes after every move
});
});
})(jQuery);
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/59bfc7394854b82732ff0b48/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->