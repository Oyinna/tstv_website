<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../config.php");
require_once("../inc_dbfunctions.php");

//trap the calling url
$getvalues = "";
$thedate = date("Y-m-d H:i:s");
$server = $_SERVER['REMOTE_ADDR'];
$getvalues .= "<br>=========== START NEW REQUEST FROM ($server) ============ $thedate ================";
$getvalues .= "<br> ------------- URL PARA  ------------------";

foreach ( $_GET as $key => $value ) 
{
        //other code go here
    $getvalues .= "<br>Index : " . $key . " & Value : " . $value;
    $getvalues .= "<br/>";
}

file_put_contents("api_parameter_mobile.htm",$getvalues,FILE_APPEND);

$getvalues = "<br>=========== FORM PARA ============ $thedate ================";

foreach ( $_POST as $key => $value ) 
{
        //other code go here
    $getvalues .= "<br>Index : " . $key . " & Value : " . $value;
    $getvalues .= "<br/>";
}

file_put_contents("api_parameter_mobile.htm",$getvalues,FILE_APPEND);

$thedate = date("Y-m-d H:i:s");
$getvalues = "<br>=========== PAGE WAS CALLED ============ $thedate ================";

file_put_contents("api_parameter_mobile.htm",$getvalues,FILE_APPEND);

//var_dump($_GET);

if(isset($_GET['action']) && $_GET['action'] == "channels_list")
{
    channels_list();
}
if(isset($_GET['action']) && $_GET['action'] == "channels_categories")
{
    channels_categories();
}
if(isset($_GET['action']) && $_GET['action'] == "channels_listbycategory")
{
    channels_listbycategory();
}
if(isset($_GET['action']) && $_GET['action'] == "trailers_list")
{
    trailers_list();
}
if(isset($_GET['action']) && $_GET['action'] == "trailers_details")
{
    trailers_details();
}
if(isset($_GET['action']) && $_GET['action'] == "dealers_list")
{
    dealers_list();
}
if(isset($_GET['action']) && $_GET['action'] == "dealers_states")
{
    dealers_states();
}
if(isset($_GET['action']) && $_GET['action'] == "checkupdates")
{
    checkupdates();
}


function getLanguage()
{
    //$device_id = $_GET['deviceid'];
    $mycon = databaseConnect();
    
    $sql = "SELECT * FROM `regions_language` WHERE `region_id` = (SELECT `region_id` FROM `mobileapps` WHERE `device_id` = :device_id)";
    $myrec = $mycon->prepare($sql);
    $myrec->bindValue(":device_id",$device_id);
    $myrec->execute();

    $settings = "";

    //loop through settings
    foreach($myrec->fetchAll(PDO::FETCH_ASSOC) as $row)
    {
        $key = $row['item_key'];
        $value = $row['item_value'];
        $settings .= "*/*".$key.":=".$value;
    }
        
    echo $settings;
    return;
}

function getAgencies()
{
    $device_id = $_GET['deviceid'];
    
    $mycon = databaseConnect();
    
    //get the device details
    $myrec = $mycon->prepare("SELECT * FROM `mobileapps` WHERE `device_id` = :device_id");
    $myrec->bindValue(":device_id",$device_id);
    $myrec->execute();
    
    if($myrec->rowCount() < 1)
    {
        echo "Error:Device information not found";
        return;
    }
    $devicedetails = $myrec->fetch(PDO::FETCH_ASSOC);
    
    $sql = "SELECT * FROM `agencies` WHERE `region_id` = :region_id";
    $myrec = $mycon->prepare($sql);
    $myrec->bindValue(":region_id",$devicedetails['region_id']);
    $myrec->execute();

    $imageurl = "http://trimsonline.org/admin/";//str_replace("app/webservice.php","",CurrentPageURL());
    //$imageurl = str_replace("app/webservice.php","",CurrentPageURL());

    $agencies = "";

    while($row = $myrec->fetch(PDO::FETCH_ASSOC))
    {
        $agency_id = $row['agency_id'];
        $code = $row['code'];
        $name = $row['name'];
        $fullname = $row['fullname'];
        $logo = $imageurl."pictures/logos/$agency_id.jpg";
        $banner = $imageurl."pictures/banners/$agency_id.jpg";
        $logo = getDataURI("../pictures/logos/$agency_id.jpg");
        $banner = getDataURI("../pictures/banners/$agency_id.jpg");
        $mandate = $row['mandate'];
        $information = $row['information'];
        $dutytime = $row['dutytime'];
        $email = $row['email'];
        $phone = $row['phone'];
        $website = $row['website'];
        $callnumber = $row['callnumber'];
        $messageemail = $row['messageemail'];
        $duties = $row['duties'];
        
        //format duties
        //if(count(explode("|",$row['duties'])) <> 16) $duties = "";
        //$duties = "";
        //$logo = "logo";
        //$banner = "banner";
                
        $agency = "*/*".$code."*|*".$name."*|*".$fullname."*|*".$logo."*|*".$banner."*|*".$mandate."*|*".$information."*|*".$dutytime."*|*".$email."*|*".$phone."*|*".$website."*|*".$callnumber."*|*".$messageemail."*|*".$duties;
        $agencies .= $agency;
    }

    echo $agencies;
    return;
}

function channels_categories()
{
    //$device_id = $_GET['deviceid'];
    
    $mycon = databaseConnect();
    $dataRead = New DataRead();
    
    $channelslist = $dataRead->channels_categories_list($mycon);
    
    //generate the array from the object
    $list = "#xtstv#";
    foreach($channelslist as $row)
    {
        $mylist = array();
        $mylist["id"] = $row['category_id'];
        $mylist["name"] = ucwords($row['name']);
        $caption = $row['caption'];
        $list .= "#xtstv#".$row['category_id']."*|*".$row['name']."*|*".$caption;
    }
    
    echo $list;//json_encode($list);
    exit;
}

function channels_listbycategory()
{
    //$device_id = $_GET['deviceid'];
    $category_id = $_GET['category'];
    
    $mycon = databaseConnect();
    $dataRead = New DataRead();
    
    $channelslist = $dataRead->channels_listbycategory($mycon, $category_id);
    
    //generate the array from the object
    $list = "#xtstv#";
    foreach($channelslist as $row)
    {
        $mylist = array();
        $mylist["id"] = $row['channel_id'];
        $mylist["name"] = ucwords($row['name']);
        $caption = $row['caption'];
        //$picture = "http://localhost/bright/tstv/pictures/channels/{$row['channel_id']}.jpg";
        $picture = "http://tstvafrica.com/pictures/channels/{$row['channel_id']}.jpg";
        
        $list .= "#xtstv#".$row['channel_id']."*|*".$row['name']."*|*".$caption."*|*".$picture;
    }
    
    echo $list;//json_encode($list);
    exit;
}

function channels_list()
{
    //$device_id = $_GET['deviceid'];
    
    $mycon = databaseConnect();
    $dataRead = New DataRead();
    
    $channelslist = $dataRead->channels_categories_list($mycon);
    
    //generate the array from the object
    $list = array();
    foreach($channelslist as $row)
    {
        $mylist = array();
        $mylist["id"] = $row['category_id'];
        $mylist["name"] = $row['name'];
        $list[] = $mylist;
    }
    
    echo json_encode($list);
    exit;
    
    //get the device details
    $myrec = $mycon->prepare("SELECT * FROM `mobileapps` WHERE `device_id` = :device_id");
    $myrec->bindValue(":device_id",$device_id);
    $myrec->execute();
    
    if($myrec->rowCount() < 1)
    {
        echo "Error:Device information not found";
        return;
    }
    $devicedetails = $myrec->fetch(PDO::FETCH_ASSOC);
    
    $sql = "SELECT * FROM `agencies` WHERE `region_id` = :region_id";
    $myrec = $mycon->prepare($sql);
    $myrec->bindValue(":region_id",$devicedetails['region_id']);
    $myrec->execute();

    $imageurl = "http://trimsonline.org/admin/";//str_replace("app/webservice.php","",CurrentPageURL());
    //$imageurl = str_replace("app/webservice.php","",CurrentPageURL());

    $agencies = "";

    while($row = $myrec->fetch(PDO::FETCH_ASSOC))
    {
        $agency_id = $row['agency_id'];
        $code = $row['code'];
        $name = $row['name'];
        $fullname = $row['fullname'];
        $logo = $imageurl."pictures/logos/$agency_id.jpg";
        $banner = $imageurl."pictures/banners/$agency_id.jpg";
        $logo = getDataURI("../pictures/logos/$agency_id.jpg");
        $banner = getDataURI("../pictures/banners/$agency_id.jpg");
        $mandate = $row['mandate'];
        $information = $row['information'];
        $dutytime = $row['dutytime'];
        $email = $row['email'];
        $phone = $row['phone'];
        $website = $row['website'];
        $callnumber = $row['callnumber'];
        $messageemail = $row['messageemail'];
        $duties = $row['duties'];
        
        //format duties
        //if(count(explode("|",$row['duties'])) <> 16) $duties = "";
        //$duties = "";
        //$logo = "logo";
        //$banner = "banner";
                
        $agency = "*/*".$code."*|*".$name."*|*".$fullname."*|*".$logo."*|*".$banner."*|*".$mandate."*|*".$information."*|*".$dutytime."*|*".$email."*|*".$phone."*|*".$website."*|*".$callnumber."*|*".$messageemail."*|*".$duties;
        $agencies .= $agency;
    }

    echo $agencies;
    return;
}


function trailers_list()
{
    //$device_id = $_GET['deviceid'];
    
    $mycon = databaseConnect();
    $dataRead = New DataRead();
    
    $channelslist = $dataRead->trailers_list($mycon,"","");
    
    //generate the array from the object
    $list = "#xtstv#";
    foreach($channelslist as $row)
    {
        $picture = "../../pictures/trailers/{$row['trailer_id']}.jpg";
        if(!file_exists($picture)) $picture = "http://img.youtube.com/vi/".getYouTubeVideoId($row['youtube'])."/0.jpg";
        
        $embedlink = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$row['youtube']);
        
        $mylist = array();
        $list .= "#xtstv#".$row['trailer_id']."*|*".$row['headline']."*|*".$picture."*|*".$embedlink;
    }
    
    echo $list;//json_encode($list);
    exit;
}

function trailers_details()
{
    $trailer_id = $_GET['trailer_id'];
    
    $mycon = databaseConnect();
    $dataRead = New DataRead();
    
    $trailerdetails = $dataRead->trailers_get($mycon,$trailer_id);
    
    if(!$trailerdetails)
    {
        echo "ERROR: Trailer information not found";
        exit;
    }
    
    //$embedlink = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$trailerdetails['youtube']);
    $embedlink = '<iframe class="iframe-placeholder" width="100%" height="315" src="https://www.youtube.com/embed/'.getYouTubeVideoId($trailerdetails['youtube']).'" frameborder="0" allowfullscreen></iframe>';
    $list = $trailerdetails['headline']."*|*".$embedlink;
    
    echo $list;//json_encode($list);
    exit;
}

function dealers_states()
{
    
    $mycon = databaseConnect();
    $myconDealers = databaseConnectDealers();

    $dataRead = New DataRead();
    
    $myrec = $myconDealers->query("SELECT DISTINCT(`state`) FROM `dealers` ORDER BY `state` ASC");
    $stateslist = $myrec->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($retailerslist);
    
    //generate the array from the object
    $list = "";
    foreach($stateslist as $row)
    {    
        $list .= "*|*".$row['state'];
    }
    
    echo $list;//json_encode($list);
    exit;
}

function dealers_list()
{
    //echo "SFSDFSD";
    $state = $_GET['state'];
    
    $mycon = databaseConnect();
    $myconDealers = databaseConnectDealers();

    $dataRead = New DataRead();
    
    $myrec = $myconDealers->prepare("SELECT * FROM `dealers` WHERE `status` = 5 AND `country` = :country AND `state` = :state ORDER BY rand()");
    $myrec->bindValue(":country","Nigeria");
    $myrec->bindValue(":state",$state);
    $myrec->execute();
    $retailerslist = $myrec->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($retailerslist);
    
    //generate the array from the object
    $list = "#xtstv#";
    foreach($retailerslist as $row)
    {    
        $details = $row['email']."<br>".$row['address']." ".$row['city']." ".$row['state'];
        $list .= "#xtstv#".$row['company']."*|*".$details;
    }
    
    echo $list;//json_encode($list);
    exit;
}


function getDataURI($imagePath) {
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $type = $finfo->file($imagePath);
    return 'data:'.$type.';base64,'.base64_encode(file_get_contents($imagePath));
}
        
//register new device	
function registerDevice()
{
    $mycon = databaseConnect();

    $device_type = $_POST['device_type'];
    $device_os = $_POST['device_os'];
    $device_model = $_POST['device_model'];
    $device_version = $_POST['device_version'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $thedate = date("Y-m-d H:i:s");
    
    $addressparts = getGeoAddress($longitude,$latitude);
    
    //save the feedback
    $sql = "INSERT INTO `mobileapps` SET `device_type` = :device_type
                    ,`device_os` = :device_os
                    ,`device_model` = :device_model
                    ,`device_version` = :device_version
                    ,`longitude` = :longitude
                    ,`latitude` = :latitude
                    ,`ip` = :ip
                    ,`location` = :location
                    ,`thedate` = :thedate";

    $myrec = $mycon->prepare($sql);
    $myrec->bindValue(":device_type",$device_type);
    $myrec->bindValue(":device_os",$device_os);
    $myrec->bindValue(":device_model",$device_model);
    $myrec->bindValue(":device_version",$device_version);
    $myrec->bindValue(":longitude",$longitude);
    $myrec->bindValue(":latitude",$latitude);
    $myrec->bindValue(":ip",$_SERVER['REMOTE_ADDR']);
    $myrec->bindValue(":location",  serialize($addressparts));
    $myrec->bindValue(":thedate",$thedate);
    $myrec->execute();

    if($myrec->rowCount() > 0)
    {
        $app_id = $mycon->lastInsertId();
        echo "Registered:$app_id";
    }
	
}

function checkupdates()
{
    $mycon = databaseConnect();

    $version = $_GET['version'];
    
    if($version != "tstv_version_1") echo "UPDATE:http://brightokona.com";
}

function saveAlert()
{
    $mycon = databaseConnect();
    $dataRead = New DataRead();
    $dataWrite = New DataWrite();

    $app_id = $_GET['deviceid'];
    $batch_id = $_GET['batch_id'];
    $alert_type = $_GET['type'];
    $latitude = $_GET['latitude'];
    $longitude = $_GET['longitude'];
    $speed = $_GET['speed'];
    $battery = $_GET['battery'];
    $plugged = $_GET['plugged'];
    $thedate = date("Y-m-d H:i:s");

    //get the device details
    $myrec = $mycon->prepare("SELECT * FROM `mobileapps` WHERE `app_id` = :app_id");
    $myrec->bindValue(":app_id",$app_id);
    $myrec->execute();
    
    if($myrec->rowCount() < 1)
    {
        echo "Error:App information not found";
        return;
    }
    $appdetails = $myrec->fetch(PDO::FETCH_ASSOC);

    //get the device details
    $myrec = $mycon->prepare("SELECT * FROM `devices` WHERE `app_id` = :app_id");
    $myrec->bindValue(":app_id",$app_id);
    $myrec->execute();
    
    if($myrec->rowCount() < 1)
    {
        echo "Error:Device information not found";
        return;
    }
    $devicedetails = $myrec->fetch(PDO::FETCH_ASSOC);

    //get the personnel details
    $dataRead = New DataRead();
    $dataWrite = New DataWrite();
    
    $personneldetails = $dataRead->personnels_get($mycon, $devicedetails['personnel_id']);    
    if(!$personneldetails)
    {
        echo "Error:Personnel information not found";
        return;
    }
    
    //check if the personnel can send this type of alert
    if(!isset($personneldetails['settings']['alert_shake']) || $personneldetails['settings']['alert_shake'] != "enabled")
    {
        return "";
    }
    
    $devicename = $devicedetails['device_model']." ".$devicedetails['device_version'];
    $address = getGeoAddress($longitude, $latitude);
    $alert_id = $dataWrite->alerts_add($mycon, $devicedetails['client_id'], $devicedetails['personnel_id'], $devicedetails['device_id'], $batch_id, $personneldetails['name'], $devicename, $alert_type, $longitude, $latitude, $speed, $address, $battery, $plugged);

    if(!$alert_id)
    {
        echo "Error:Emergency alert could not be processed. Please try again.";
        return;
    }
    
    $done = $dataWrite->locations_add($mycon, $devicedetails['client_id'], $devicedetails['personnel_id'], $devicedetails['device_id'], $longitude, $latitude, $speed, $address, $battery, $plugged);
    
    //get the contacts of the personnel
    $contactslist = $dataRead->personnels_contacts_list($mycon, $devicedetails['personnel_id']);
    
    //loop and notify the contacts about the alert and save
    foreach($contactslist as $row)
    {
        $dataWrite->alerts_contacts_add($mycon, $alert_id, $row['phone'], $row['email'], $row['name']);
        sendAlertNotification($alert_id, $row, $devicedetails, $personneldetails, $address);
    }
    
    echo "Done:Emergency alert sent.";
	
}

function savePicture()
{    
    $mycon = databaseConnect();
    $dataRead = New DataRead();
    $dataWrite = New DataWrite();

    $app_id = $_POST['deviceid'];
    $batch_id = $_POST['batch_id'];
    $picture = $_POST['picture'];
    $thedate = date("Y-m-d H:i:s");
    
    $picture = (is_array($picture)) ? $picture[0] : $picture;
    
    if(strlen($picture) < 200) return;    

    //get the device details
    $myrec = $mycon->prepare("SELECT * FROM `devices` WHERE `app_id` = :app_id");
    $myrec->bindValue(":app_id",$app_id);
    $myrec->execute();
    
    if($myrec->rowCount() < 1)  return;
    $devicedetails = $myrec->fetch(PDO::FETCH_ASSOC);

    //get the device details
    $myrec = $mycon->prepare("SELECT * FROM `alerts` WHERE `device_id` = :device_id AND `batch_id` = :batch_id");
    $myrec->bindValue(":device_id",$devicedetails['device_id']);
    $myrec->bindValue(":batch_id",$batch_id);
    $myrec->execute();
    
    if($myrec->rowCount() < 1) return;

    $alertdetails = $myrec->fetch(PDO::FETCH_ASSOC);

    $item_id = $dataWrite->alerts_media_add($mycon, $alertdetails['alert_id'], "picture");
    
    //save the image
    base64_to_jpeg($picture, "../alerts_files/{$alertdetails['alert_id']}_picture_{$item_id}.jpg");
$thedate = date("Y-m-d H:i:s");
$getvalues = "<br>=========== GOT TO SAVE PICTURE 3 ============ $thedate ================";

file_put_contents("api_parameter_mobile.htm",$getvalues,FILE_APPEND);
	
}

function base64_to_jpeg($base64_string, $output_file) {
    // open the output file for writing
    $ifp = fopen( $output_file, 'wb' ); 

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    //$data = explode( ',', $base64_string );

    // we could add validation here with ensuring count( $data ) > 1
    //fwrite( $ifp, base64_decode( $data[ 1 ] ) );
    fwrite( $ifp, base64_decode( $base64_string ) );

    // clean up the file resource
    fclose( $ifp ); 
$thedate = date("Y-m-d H:i:s");
$getvalues = "<br>=========== GOT TO SAVE X3 ============ $thedate ================";

file_put_contents("api_parameter_mobile.htm",$getvalues,FILE_APPEND);

    return true; 
}

function updateLocation()
{
    $mycon = databaseConnect();
    $dataRead = New DataRead();
    $dataWrite = New DataWrite();

    $app_id = $_GET['deviceid'];
    $latitude = $_GET['latitude'];
    $longitude = $_GET['longitude'];
    $speed = $_GET['speed'];
    $battery = $_GET['battery'];
    $plugged = $_GET['plugged'];
    $thedate = date("Y-m-d H:i:s");

    //get the device details
    $myrec = $mycon->prepare("SELECT * FROM `mobileapps` WHERE `app_id` = :app_id");
    $myrec->bindValue(":app_id",$app_id);
    $myrec->execute();
    
    if($myrec->rowCount() < 1)
    {
        echo "Error:App information not found";
        return;
    }
    $appdetails = $myrec->fetch(PDO::FETCH_ASSOC);

    //get the device details
    $myrec = $mycon->prepare("SELECT * FROM `devices` WHERE `app_id` = :app_id");
    $myrec->bindValue(":app_id",$app_id);
    $myrec->execute();
    
    if($myrec->rowCount() < 1)
    {
        echo "Error:Device information not found";
        return;
    }
    $devicedetails = $myrec->fetch(PDO::FETCH_ASSOC);

    $address = getGeoAddress($longitude, $latitude);
    $done = $dataWrite->locations_add($mycon, $devicedetails['client_id'], $devicedetails['personnel_id'], $devicedetails['device_id'], $longitude, $latitude, $speed, $address, $battery, $plugged);
    
    
    $result = sendAdvanceAlert($mycon, $devicedetails, $longitude, $latitude, $speed, $battery, $plugged);
        
    if($result != true) echo "Done:Location updated.";
    
    
}

function savePatrol()
{
    $mycon = databaseConnect();
    $dataRead = New DataRead();
    $dataWrite = New DataWrite();

    $app_id = $_GET['deviceid'];
    $tags = trim($_GET['tags']);
    $thedate = date("Y-m-d H:i:s");

    if($tags == "") return;
    
    $alltags = array();
    foreach(explode(",",$tags) as $tag)
    {
        $alltags[] = $tag;
    }
    
    if(count($alltags) < 1) return;
    
    //get the device details
    $myrec = $mycon->prepare("SELECT * FROM `mobileapps` WHERE `app_id` = :app_id");
    $myrec->bindValue(":app_id",$app_id);
    $myrec->execute();
    
    if($myrec->rowCount() < 1)
    {
        echo "Error:App information not found";
        return;
    }
    $appdetails = $myrec->fetch(PDO::FETCH_ASSOC);

    //get the device details
    $myrec = $mycon->prepare("SELECT * FROM `devices` WHERE `app_id` = :app_id");
    $myrec->bindValue(":app_id",$app_id);
    $myrec->execute();
    
    if($myrec->rowCount() < 1)
    {
        echo "Error:Device information not found";
        return;
    }
    $devicedetails = $myrec->fetch(PDO::FETCH_ASSOC);

    $result = processGuardPatrol($mycon, $devicedetails, $alltags);
        
    if($result != true) echo "Done:Location updated.";    
}

//process dynamic alerts based on device location
function sendAdvanceAlert($mycon, $devicedetails, $longitude, $latitude, $speed, $battery, $plugged)
{
    $batch_id = time()."dynamicalert";
    $alert_type = "SOS";
    $thedate = date("Y-m-d H:i:s");

    $dataRead = New DataRead();
    $dataWrite = New DataWrite();
    
    $personneldetails = $dataRead->personnels_get($mycon, $devicedetails['personnel_id']);
    if(!$personneldetails) return;
    //if($personneldetails['status'] != 5) return;
    
    //get the personnel settings
    $personnelsettings = $personneldetails['settings'];
    $mylong = (isset($personnelsettings['alert_proximity_longitude'])) ? $personnelsettings['alert_proximity_longitude'] : "";
    $mylat = (isset($personnelsettings['alert_proximity_latitude'])) ? $personnelsettings['alert_proximity_latitude'] : "";
    $mydistance = (isset($personnelsettings['alert_proximity_meters'])) ? $personnelsettings['alert_proximity_meters'] : "";
    $deadManTime = (isset($personnelsettings['alert_deadman'])) ? $personnelsettings['alert_deadman'] : "0";
    
    //get personnels last location
    $lastLocations = $dataRead->personnels_locations($mycon, $devicedetails['personnel_id'], "ORDER BY `id` DESC LIMIT 2", "");
    $oldDistance = false;
    if(isset($lastLocations[1]))
    {
        $oldDistance = getLocationDistance($longitude,$latitude,$lastLocations[1]['longitude'],$lastLocations[1]['latitude']);
    }
    //check if entry alert
    if(($mylong != "" && $mylat != "" && $mydistance != "") && isset($personnelsettings['alert_proximity']) && $personnelsettings['alert_proximity'] == "entry")
    {
        $currentDistance = getLocationDistance($longitude,$latitude,$mylong,$mylat);
        if($currentDistance <= $mydistance && ($oldDistance == false || $oldDistance >= $mydistance))
        {
            //echo "<br> gt here";
            //Send alert now
            $devicename = $devicedetails['device_model']." ".$devicedetails['device_version'];
            $address = getGeoAddress($longitude, $latitude);
            $alert_id = $dataWrite->alerts_add($mycon, $devicedetails['client_id'], $devicedetails['personnel_id'], $devicedetails['device_id'], $batch_id, $personneldetails['name'], $devicename, $alert_type, $longitude, $latitude, $speed, $address, $battery, $plugged);

            if(!$alert_id) return;

            $done = $dataWrite->locations_add($mycon, $devicedetails['client_id'], $devicedetails['personnel_id'], $devicedetails['device_id'], $longitude, $latitude, $speed, $address, $battery, $plugged);

            //get the contacts of the personnel
            $contactslist = $dataRead->personnels_contacts_list($mycon, $devicedetails['personnel_id']);

            //loop and notify the contacts about the alert and save
            foreach($contactslist as $row)
            {
                $dataWrite->alerts_contacts_add($mycon, $alert_id, $row['phone'], $row['email'], $row['name']);
                sendAlertNotification($alert_id, $row, $devicedetails, $personneldetails, $address);
            }
            
        }
    }
    //check if exit alert
    if(($mylong != "" && $mylat != "" && $mydistance != "") && isset($personnelsettings['alert_proximity']) && $personnelsettings['alert_proximity'] == "exit")
    {
        $currentDistance = getLocationDistance($longitude,$latitude,$mylong,$mylat);
        if($currentDistance > $mydistance && ($oldDistance == false || $oldDistance < $mydistance))
        {
            //Send alert now
            $devicename = $devicedetails['device_model']." ".$devicedetails['device_version'];
            $address = getGeoAddress($longitude, $latitude);
            $alert_id = $dataWrite->alerts_add($mycon, $devicedetails['client_id'], $devicedetails['personnel_id'], $devicedetails['device_id'], $batch_id, $personneldetails['name'], $devicename, $alert_type, $longitude, $latitude, $speed, $address, $battery, $plugged);

            if(!$alert_id) return;

            $done = $dataWrite->locations_add($mycon, $devicedetails['client_id'], $devicedetails['personnel_id'], $devicedetails['device_id'], $longitude, $latitude, $speed, $address, $battery, $plugged);

            //get the contacts of the personnel
            $contactslist = $dataRead->personnels_contacts_list($mycon, $devicedetails['personnel_id']);

            //loop and notify the contacts about the alert and save
            foreach($contactslist as $row)
            {
                $dataWrite->alerts_contacts_add($mycon, $alert_id, $row['phone'], $row['email'], $row['name']);
                sendAlertNotification($alert_id, $row, $devicedetails, $personneldetails, $address);
            }
            
        }
    }
    
    
    
}

//process if the personnel is a guard
function processGuardFunction($mycon, $devicedetails, $longitude, $latitude, $speed, $battery, $plugged)
{
    $batch_id = time()."dynamicalert";
    $alert_type = "SOS";
    $thedate = date("Y-m-d H:i:s");

    $dataRead = New DataRead();
    $dataWrite = New DataWrite();
    
    $personneldetails = $dataRead->personnels_get($mycon, $devicedetails['personnel_id']);
    if(!$personneldetails) return;

    $guarddetails = $dataRead->guards_getbypersonnel($mycon, $personneldetails['personnel_id']);
    if(!$guarddetails) return;
    //if($personneldetails['status'] != 5) return;
    
    //get the personnel settings
    $facilitydetails = $guarddetails['facilitydetails'];
    $mylong = (isset($facilitydetails['longitude'])) ? $facilitydetails['longitude'] : "";
    $mylat = (isset($facilitydetails['latitude'])) ? $facilitydetails['latitude'] : "";
    $mydistance = 100;
    
    //get personnels last location
    $lastLocations = $dataRead->personnels_locations($mycon, $devicedetails['personnel_id'], "ORDER BY `id` DESC LIMIT 2", "");
    $oldDistance = false;
    if(isset($lastLocations[1]))
    {
        $oldDistance = getLocationDistance($longitude,$latitude,$lastLocations[1]['longitude'],$lastLocations[1]['latitude']);
    }
    //check if entry alert
    if(($mylong != "" && $mylat != ""))
    {
        $currentDistance = getLocationDistance($longitude,$latitude,$mylong,$mylat);
        if($currentDistance <= $mydistance && ($oldDistance == false || $oldDistance >= $mydistance)) //came in to the facility
        {
            //echo "<br> gt here";
            //Send alert now
            $devicename = $devicedetails['device_model']." ".$devicedetails['device_version'];
            $attendance_id = $dataWrite->facilities_attendance_add($mycon, $guarddetails['client_id'], $guarddetails['facility_id'], $guarddetails['personnel_id']);

            if(!$attendance_id) return;            
        }
        if($currentDistance >= $mydistance && ($oldDistance == false || $oldDistance <= $mydistance)) //got out of the facility
        {
            //get the last attendance record
            $tenminutes = date("Y-m-d H:i:s",strtotime("-10 minutes"));
            $attendancedetails = $dataRead->facilities_attendance_getlast($mycon, $guarddetails['facility_id'], $guarddetails['personnel_id']);
            if($attendancedetails != false && $attendancedetails['status'] == 0 && $attendancedetails['thedate'] < $tenminutes)
            {
                $devicename = $devicedetails['device_model']." ".$devicedetails['device_version'];
                $done = $dataWrite->facilities_attendance_exit($mycon, $attendancedetails['attendance_id']);
                if(!$done) return;
            }
            return;
        }
    }
}

//process received bluetooth tags
function processGuardPatrol($mycon, $devicedetails, $tags)
{
    $thedate = date("Y-m-d H:i:s");

    $dataRead = New DataRead();
    $dataWrite = New DataWrite();
    
    $personneldetails = $dataRead->personnels_get($mycon, $devicedetails['personnel_id']);
    if(!$personneldetails) return;

    $guarddetails = $dataRead->guards_getbypersonnel($mycon, $personneldetails['personnel_id']);
    if(!$guarddetails) return;
    //if($personneldetails['status'] != 5) return;
    
    //get the personnel settings
    $facilitydetails = $guarddetails['facilitydetails'];
    $mylong = (isset($facilitydetails['longitude'])) ? $facilitydetails['longitude'] : "";
    $mylat = (isset($facilitydetails['latitude'])) ? $facilitydetails['latitude'] : "";
    $mydistance = 100;
    
    //get the current attendance
    $attendancedetails = $dataRead->facilities_attendance_getlast($mycon, $guarddetails['facility_id'], $guarddetails['personnel_id']);
    if(!$attendancedetails) return;
    $patroldetails = $dataRead->facilities_patrols_getlast($mycon, $guarddetails['facility_id'], $guarddetails['personnel_id']);
    if($patroldetails != false || $patroldetails['thedate'] < $guarddetails['patroltime']) return;
    
    //get the tag
    foreach($tags as $tag)
    {
        if($tag == "") continue;
        $tagdetails = $dataRead->facilities_tags_getbycode($mycon, $facilitydetails['facility_id'], $tag);
        if(!$tag) continue;
        
        facilities_patrols_add($mycon, $facilitydetails['client_id'], $facilitydetails['facility_id'], $personneldetails['personnel_id'], $attendancedetails['attendance_id'], $tag);
    }
    
    
}

function getLocationDistance($lon1,$lat1,$lon2,$lat2)
{
  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  
  $distance = $miles * 1609.34;
  //echo "$lon1,$lat1,$lon2,$lat2";
  return $distance;
    
}

function sendAlertNotification($alert_id, $contactdetails, $devicedetails, $personneldetails, $address)
{
    //return true;
    $hash = generatePassword($alert_id);
    $link = "http://www.intellitrack.me/monitor.php?id=$alert_id&hash=$hash";
    $message = "Dear {$contactdetails['name']}, <br><br>{$personneldetails['name']} seems to be in some kind of trouble as the panic button from his/her {$devicedetails['device_model']} {$devicedetails['device_version']} was triggered around {$address}.";
    $message .= "<p>Please use this link to view the alert</p>";
    $message .= "<p><a href=\"$link\">$link</a></p>";
    $message .= "<p>Thanks. </p>";

    $smsmessage = "Dear {$contactdetails['name']}, {$personneldetails['name']} seems to be in some kind of trouble as the panic button from his/her {$devicedetails['device_model']} {$devicedetails['device_version']} was triggered around {$address}.";
    $smsmessage .= "\n\nAlert Code: $alert_id";
    $smsmessage .= "\n\nVisit http://www.intellitrack.me/monitor to view alert.";
    $smsmessage .= "\nThanks.";
    if($contactdetails['phone'] != "") sendSMS($contactdetails['phone'],$smsmessage);

    $template = file_get_contents("../email_template.html");
    $message = str_replace("%email_body%",$message,$template);
    if($contactdetails['email'] != "") sendEmail($contactdetails['email'],"Notifications from IntelliTrack :::Genie", $message);
}

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
      return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
  } else {
      return $miles;
  }
}

function databaseConnectDealers()
{
	require("../../dealer/connectionstrings.php");


	$mycon = new PDO("mysql:host=$MYSQL_Server;dbname=$MYSQL_Database;charset=utf8", "$MYSQL_Username", "$MYSQL_Password");	
	$mycon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$mycon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);	
	return $mycon;
}

?>