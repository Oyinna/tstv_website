<?php
require_once("config.php");

$mycon = databaseConnect();
require_once("inc_dbfunctions.php");
$dataRead = New DataRead();

$advertcode = "";
function show_advert_horizontal()
{
    global $mycon, $dataRead;
    $advert = $dataRead->adverts_getone($mycon, "0");
    if(!$advert) return "";
        $code = $advert['code'];
        if(strlen($code) < 10)
        {
            $filename = "pictures/adverts/{$advert['advert_id']}.jpg";
            $link = ($advert['link'] == "") ? "" : $advert['link'];
            $href = ($advert['link'] == "") ? "href2" : "href";
            if(file_exists($filename)) $code = '<a '.$href.'="'.$link.'" target="_blank"><img src="'.$filename.'" style="width: 100%; heigth: auto" /></a>';
        if(strlen($code) < 10) return "";
            echo $code;
        }
}

function show_advert_box()
{
    global $mycon, $dataRead;
    $advert = $dataRead->adverts_getone($mycon, "1");
    if(!$advert) return "";
        $code = $advert['code'];
        if(strlen($code) < 10)
        {
            $filename = "pictures/adverts/{$advert['advert_id']}.jpg";
            $link = ($advert['link'] == "") ? "" : $advert['link'];
            $href = ($advert['link'] == "") ? "href2" : "href";
            if(file_exists($filename)) $code = '<a '.$href.'="'.$link.'" target="_blank"><img src="'.$filename.'" style="width: 100%; heigth: auto" /></a>';
        if(strlen($code) < 10) return "";
        }
?>
    <div class="col-md-12">
        <div style="margin-bottom: 20px"><?php echo $code ?></div>
    </div>
<?php
}

function display_advert($code)
{
?>


<div class="col-md-12">
    <div style="height: 50px; background: green"><?php echo $code ?></div>
</div>
<?php 
}
?>
