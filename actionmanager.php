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
 
    
    
    
}///// end class




?>