<?php
require_once("config.php");
require_once("inc_dbfunctions.php");
$mycon = databaseConnect();

$dataRead = New DataRead();
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
<div class="lx-footer-content">
        <!-- Footer Content Top -->
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
                    <div class="lx-clear-fix"></div>
            </div>
        </div>
    <iframe name="actionframe" id="actionframe" frameborder="0" height="1" width="1" ></iframe>
        
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