<?php
	$loginpage = "yes";
	require_once("config.php");
	require_once("inc_dbfunctions.php");
	
$actionmanager = New Actionmanager();
	
//Check what to do

//var_dump($_POST);
if(isset($_POST['command']) && $_POST['command'] == "login")
{
	$actionmanager->admin_login();
}
elseif(isset($_POST['command']) && $_POST['command'] == "transmissions_comments_add")
{
	$actionmanager->transmissions_comments_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "nctv_personalinfo_add")
{   
    $actionmanager->nctv_personalinfo_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "hitsafrica_personalinfo_add")
{   
    $actionmanager->hitsafrica_personalinfo_add();
}

class Actionmanager
{
    //Process login form
    function transmissions_comments_add()
    {
	$transmission_id = $_POST['transmission_id'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$rate_sound = $_POST['rate_sound'];
	$rate_picture = $_POST['rate_picture'];
	$rate_channel = $_POST['rate_channel'];
	$comment = $_POST['comment'];
	$picture = $_FILES['picture'];
        
        $currentuserid = getCookie("userid");
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($name) < 1) $msg .= "**Please enter your name";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
                
        $ip = "";
        $location = "";
        $comment_id = $datawrite->transmissions_comments_add($mycon, $transmission_id, $name, $email, $phone, $rate_sound, $rate_picture, $rate_channel, $comment, $ip, $location);

        if(!$comment_id)
        {
            showAlert("There was an error saving this review. Please try again.");
            return;
        }
                
        if(strpos(strtoupper($picture['type']),"IMAGE") > -1) 
        {
            move_uploaded_file($picture['tmp_name'],"pictures/transmissions/comments/{$comment_id}.jpg");
        }
        
        showAlert("Thank you, your review has been submitted.");

        openPage("transmissions-view.php?code=$transmission_id");
    }
 
     function nctv_personalinfo_add()
    {        //   showAlert("hereooo");
         
            $mycon = databaseConnect();
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $state = $_POST['state'];
            $email = $_POST['email'];
            $video_title = $_POST['video_title'];
            $video = $_FILES['video'];
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                 $error_mgs  = "$email is not a valid email address";
                 //return;
             } 
            
             $mycon = databaseConnect();
             $datawrite = New DataWrite();
            
                
//        $ip = "";
//        $location = "";
        $send_info_id = $datawrite->nctv_personalinfo_create($mycon, $name, $phone, $address, $state, $email, $video_title,$channel_id);
       
        
        if(!$send_info_id)
        {
            //var_dump($mycon->errorInfo());
            showAlert("There was an error processing your information. Please try again later");
            return;
        }
       // var_dump($video);
        if(strpos(strtoupper($video['type']),"VIDEO") > -1)
        {
           // echo "GOT HERE";
            move_uploaded_file($video['tmp_name'],"video/{$send_info_id}.mp4");
        }
        
        {
            showAlert("Thank you! you have successfully uploaded you vieo.");
            //header("Location: actionmanager.php?fake=yes");
             openPage("nctv_video_upload_view.php");
        }
    }
function hitsafrica_personalinfo_add()
    {        //   showAlert("hereooo");
         
            $mycon = databaseConnect();
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $state = $_POST['state'];
            $email = $_POST['email'];
            $video_title = $_POST['video_title'];
            $video = $_FILES['video'];
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                 $error_mgs  = "$email is not a valid email address";
                 //return;
             } 
            
             $mycon = databaseConnect();
             $datawrite = New DataWrite();
            
                
//        $ip = "";
//        $location = "";
        $send_info_id = $datawrite->hitsafrica_personalinfo_create($mycon, $name, $phone, $address, $state, $email, $video_title,$channel_id);
       
        
        if(!$send_info_id)
        {
            //var_dump($mycon->errorInfo());
            showAlert("There was an error processing your information. Please try again later");
            return;
        }
       // var_dump($video);
        if(strpos(strtoupper($video['type']),"VIDEO") > -1)
        {
           // echo "GOT HERE";
            move_uploaded_file($video['tmp_name'],"video/{$send_info_id}.mp4");
        }
        
        {
            showAlert("Thank you! you have successfully uploaded you vieo.");
            //header("Location: actionmanager.php?fake=yes");
             openPage("hitsafrica_video_upload_view.php");
        }
    }
    
    
    
}///// end class




?>