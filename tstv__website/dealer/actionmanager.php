<?php
@ini_set( "upload_max_size" , "1024M ");
@ini_set( "post_max_size", "1024M");
@ini_set( "max_execution_time", 2000 );
@ini_set('memory_limit','1000M');

        $loginpage = "yes";
	require_once("config.php");
	require_once("inc_dbfunctions.php");
	
$actionmanager = New Actionmanager();
	
//Check what to do

//var_dump($_POST);
if(isset($_POST['command']) && $_POST['command'] == "login")
{
	$actionmanager->login();
}
elseif(isset($_POST['command']) && $_POST['command'] == "register")
{
	$actionmanager->register();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_registrations-add")
{
	$actionmanager->admin_registrations_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_registrations-edit")
{
	$actionmanager->admin_registrations_update();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_registrations-sendmessage")
{
	$actionmanager->admin_registrations_sendmessage();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_registrations-messageall")
{
	$actionmanager->admin_registrations_messageall();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_registrations-messageall-old")
{
	$actionmanager->admin_registrations_messageall_old();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_managers-add")
{
	$actionmanager->admin_managers_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_managers-edit")
{
	$actionmanager->admin_managers_update();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_managers-edit-status")
{
	$actionmanager->admin_managers_update_status();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_managers-sendmessage")
{
	$actionmanager->admin_managers_sendmessage();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_managers-messageall")
{
	$actionmanager->admin_managers_messageall();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_managers-delete")
{
	$actionmanager->admin_managers_delete();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_dealers-edit")
{
	$actionmanager->admin_dealers_update();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_dealers-edit-status")
{
	$actionmanager->admin_dealers_update_status();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_dealers-sendmessage")
{
	$actionmanager->admin_dealers_sendmessage();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_dealers-messageall")
{
	$actionmanager->admin_dealers_messageall();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_dealers-delete")
{
	$actionmanager->admin_dealers_delete();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_retailers-edit")
{
	$actionmanager->admin_retailers_update();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_retailers-edit-status")
{
	$actionmanager->admin_retailers_update_status();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_retailers-sendmessage")
{
	$actionmanager->admin_retailers_sendmessage();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_retailers-messageall")
{
	$actionmanager->admin_retailers_messageall();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admin_retailers-delete")
{
	$actionmanager->admin_retailers_delete();
}
elseif(isset($_POST['command']) && $_POST['command'] == "manager_dealers-add")
{
	$actionmanager->manager_dealers_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "manager_dealers-edit")
{
	$actionmanager->manager_dealers_update();
}
elseif(isset($_POST['command']) && $_POST['command'] == "manager_dealers-edit-status")
{
	$actionmanager->manager_dealers_update_status();
}
elseif(isset($_POST['command']) && $_POST['command'] == "manager_dealers-sendmessage")
{
	$actionmanager->manager_dealers_sendmessage();
}
elseif(isset($_POST['command']) && $_POST['command'] == "manager_dealers-messageall")
{
	$actionmanager->manager_dealers_messageall();
}
elseif(isset($_POST['command']) && $_POST['command'] == "dealer_agreement-send")
{
	$actionmanager->dealer_agreement_send();
}
elseif(isset($_POST['command']) && $_POST['command'] == "dealer_retailers-add")
{
	$actionmanager->dealer_retailers_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "dealer_retailers-edit")
{
	$actionmanager->dealer_retailers_update();
}
elseif(isset($_POST['command']) && $_POST['command'] == "dealer_retailers-sendmessage")
{
	$actionmanager->dealer_retailers_sendmessage();
}
elseif(isset($_POST['command']) && $_POST['command'] == "dealer_retailers-edit-status")
{
	$actionmanager->dealer_retailers_update_status();
}
elseif(isset($_POST['command']) && $_POST['command'] == "dealers-edit")
{
	$actionmanager->dealers_update();
}
elseif(isset($_POST['command']) && $_POST['command'] == "settings-pricing-add")
{
	$actionmanager->settings_pricing_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "settings-pricing-update")
{
	$actionmanager->settings_pricing_update();
}
elseif(isset($_POST['command']) && $_POST['command'] == "settings-offences-add")
{
	$actionmanager->settings_offences_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "settings-offences-update")
{
	$actionmanager->settings_offences_update();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admins-add")
{
	$actionmanager->admins_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admins-edit")
{
	$actionmanager->admins_update();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admins-groups-add")
{
	$actionmanager->admins_groups_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admins-groups-edit")
{
	$actionmanager->admins_groups_update();
}
elseif(isset($_POST['command']) && $_POST['command'] == "profile-edit")
{
	$actionmanager->profile_update();
}
elseif(isset($_POST['command']) && $_POST['command'] == "profile-password-edit")
{
	$actionmanager->profile_update_password();
}



class Actionmanager
{
    //Process login form
    function login()
    {
            $mycon = databaseConnect();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $thedate = date("Y-m-d H:i:s");

            //check if account exists

            if(strlen($username) < 1 || strlen($password) < 1)
            {
                showAlert("Please enter your username and pasword.");
                return;
            }
            
            if(strtoupper($username) == "ADMINISTRATOR")
            {
                return $this->admin_login($username,$password);
            }

            $password = generatePassword($password);
            
            if($this->login_manager($username,$password) != false) return;
            if($this->login_dealer($username,$password) != false) return;
            
            showAlert("You have provided an invalid login details.");
            return;

    }
    //End proLogin()//////////////////

    function login_manager($username, $password)
    {
            $mycon = databaseConnect();
            
            $dataread = New DataRead();
            $login = $dataread->managers_login($mycon,$username,$password);

            if(!$login) return false;
            
            if($login['status'] != "5")
            {
                    showAlert("Your account is not active. Please contact the administrator.");
                    return true;
            }

            createCookie("userid",$login['manager_id']);
            createCookie("adminlogin","NO");
            createCookie("managerlogin","YES");
            createCookie("dealerlogin","NO");
            createCookie("username",$login['username']);
            createCookie("fullname",$login['surname'].", ".$login['firstname']." ".$login['othernames']);

            $loginip = $_SERVER['REMOTE_ADDR'];
            $logindevice = $_SERVER['HTTP_USER_AGENT'];

            $datawrite = New DataWrite();
            //$datawrite->managers_logins($mycon,$login['manager_id'],$loginip,$logindevice);
            //$datawrite->lastlogin($mycon,$login['manager_id']);
			
            openPage("manager_dashboard.php");
            return true;

    }
    //End proLogin()//////////////////
    
    function login_dealer($username, $password)
    {
            $mycon = databaseConnect();
            
            $dataread = New DataRead();
            $login = $dataread->dealers_login($mycon,$username,$password);

            if(!$login) return false;
            
            if($login['status'] != "5")
            {
                    showAlert("Your account is not active. Please contact the administrator.");
                    return true;
            }
            
            //chekc if dealer is allowed to login
//            $allowed_ids = ",2,214,432,162,173,175,311,312,184,440,336,78,170,167,357,164,464,466,211,374,369,134,135,138,376,377,143,210,261,21,100,177,145,103,147,30,461,";
//            if(strpos($allowed_ids,",".trim($login['dealer_id']).",") === false)
            if(!file_exists("agreements/agreement_{$login['dealer_id']}.pdf"))
            {
                    showAlert("You are not allowed to access the dealers portal. Please contact the administrator.");
                    return true;
            }
            

            createCookie("userid",$login['dealer_id']);
            createCookie("adminlogin","NO");
            createCookie("managerlogin","NO");
            createCookie("dealerlogin","YES");
            createCookie("username",$login['username']);
            createCookie("fullname",$login['company']);

            $loginip = $_SERVER['REMOTE_ADDR'];
            $logindevice = $_SERVER['HTTP_USER_AGENT'];

            $datawrite = New DataWrite();
            //$datawrite->managers_logins($mycon,$login['manager_id'],$loginip,$logindevice);
            //$datawrite->lastlogin($mycon,$login['manager_id']);
			
            openPage("dealer_dashboard.php");
            return true;

    }
    //End proLogin()//////////////////
    
    function admin_login($username, $password)
    {

            if(strtoupper($username) != "ADMINISTRATOR" || strtoupper($password) != "BRIGHT")
            {
                    showAlert("You have provided an invalid login details.");
                    return;
            }
            

            //createCookie("userid",$login['admin']);
            createCookie("userid","admin");
            createCookie("adminlogin","YES");
            createCookie("managerlogin","NO");
            createCookie("dealerlogin","NO");
            createCookie("username","username");
            createCookie("fullname","Administrator");

            $openpage = "admin_dashboard.php";
            openPage($openpage);
        
    }
  
    function register()
    {
	$type = $_POST['type'];
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$othernames = $_POST['othernames'];
	$company = $_POST['company'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$owner1 = $_POST['owner1'];
	$owner2 = $_POST['owner2'];
	$owner3 = $_POST['owner3'];
	$owner4 = $_POST['owner4'];
	$business_type = $_POST['business_type'];
	$business_duration = $_POST['business_duration'];
	$business_staff = $_POST['business_staff'];
	$quantity = $_POST['quantity'];
	$amount = $_POST['amount'];
	$localmarket = $_POST['localmarket'];
	$office = $_POST['office'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = "Nigeria";//$_POST['country'];
	$experience = $_POST['experience'];
	$marketting = $_POST['marketting'];
	$installers = $_POST['installers'];
	$notes = $_POST['notes'];
	$username = $email;
        $file_cac1 = $_FILES["file_cac1"];
        $file_cac2 = $_FILES["file_cac2"];
        $file_cac3 = $_FILES["file_cac3"];
        $file_passport = $_FILES["file_passport"];
        $file_office1 = $_FILES["file_office1"];
        $file_office2 = $_FILES["file_office2"];
        $file_office3 = $_FILES["file_office3"];
        $file_office4 = $_FILES["file_office4"];

        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($type) < 1) $msg .= "**Select the dealership type to register.";
	if(strlen($surname) < 1) $msg .= "**Enter your surname.";
	if(strlen($firstname) < 1) $msg .= "**Enter your firstname.";
	if(strlen($company) < 1) $msg .= "**Enter your company or business name.";
	if(!is_numeric($phone) || strlen($phone) < 10) $msg .= "**Please enter a valid phone number.";
	if(count(explode("@",$email)) < 2) $msg .= "**Please provide a valid email address.";
	if(strlen($city) < 1) $msg .= "**Enter your state.";
	if(strlen($state) < 1) $msg .= "*select your state.";
        if($type == "Supper Dealer")
        {
            if(strpos(strtoupper($file_cac1['type']),"IMAGE") === false) $msg .= "**Attach your CAC certificate.";
            if(strpos(strtoupper($file_cac2['type']),"IMAGE") === false) $msg .= "**Attach your CAC Form 2.";
            if(strpos(strtoupper($file_cac3['type']),"IMAGE") === false) $msg .= "**Attach your CAC Form 7.";
        }
        if(strpos(strtoupper($file_passport['type']),"IMAGE") === false) $msg .= "**Attach your Passport photograph.";
	//if(strlen($username) < 1) $msg .= "**Enter a login username.";
	//if(strlen($password) < 1) $msg .= "**Enter a login password.";
	//if(strlen($password) > 0 && $password != $password2) $msg .= "**Password confirmation does not match.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before submitting:**$msg");
		return;
	}

        //generate username and password
        $password = "dealer12345";
        $password = generatePassword($password);

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //check if the username is in use
        if($dataread->registrations_getbyusername($mycon, $username) !== false)
        {
            showAlert("The specified email address is already in use. Please do NOT submit multiple registration to avoid disqualification.");
            return;            
        }
                
        $dealer_id = $datawrite->registrations_add($mycon, $type, $surname, $firstname, $othernames, $company, $phone, $address, $email, $owner1, $owner2, $owner3, $owner4, $business_type, $business_duration, $business_staff, $quantity, $amount, $localmarket, $office, $city, $state, $country, $experience, $marketting, $installers, $notes, $username, $password, $thedate);

        if(!$dealer_id)
        {
            showAlert("There was an error processing your regiistration. Please try again.");
            return;
        }
        else
        {            
            //save the attached images
            if(strpos(strtoupper($file_cac1['type']),"IMAGE") > -1) move_uploaded_file($file_cac1['tmp_name'],"files/registrations/{$dealer_id}_cac1.jpg");
            if(strpos(strtoupper($file_cac2['type']),"IMAGE") > -1) move_uploaded_file($file_cac2['tmp_name'],"files/registrations/{$dealer_id}_cac2.jpg");
            if(strpos(strtoupper($file_cac3['type']),"IMAGE") > -1) move_uploaded_file($file_cac3['tmp_name'],"files/registrations/{$dealer_id}_cac3.jpg");
            if(strpos(strtoupper($file_passport['type']),"IMAGE") > -1) move_uploaded_file($file_passport['tmp_name'],"files/registrations/{$dealer_id}_file_passport.jpg");
            if(strpos(strtoupper($file_office1['type']),"IMAGE") > -1) move_uploaded_file($file_office1['tmp_name'],"files/registrations/{$dealer_id}_file_office1.jpg");
            if(strpos(strtoupper($file_office2['type']),"IMAGE") > -1) move_uploaded_file($file_office2['tmp_name'],"files/registrations/{$dealer_id}_file_office2.jpg");
            if(strpos(strtoupper($file_office3['type']),"IMAGE") > -1) move_uploaded_file($file_office3['tmp_name'],"files/registrations/{$dealer_id}_file_office3.jpg");
            if(strpos(strtoupper($file_office4['type']),"IMAGE") > -1) move_uploaded_file($file_office4['tmp_name'],"files/registrations/{$dealer_id}_file_office4.jpg");
            
            createCookie("registration_id", $dealer_id);
            openPage("../dealer_register-thanks.php");
        }
    }

    function admin_registrations_add()
    {
	$type = $_POST['type'];
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$othernames = $_POST['othernames'];
	$company = $_POST['company'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$owner1 = $_POST['owner1'];
	$owner2 = $_POST['owner2'];
	$owner3 = $_POST['owner3'];
	$owner4 = $_POST['owner4'];
	$business_type = $_POST['business_type'];
	$business_duration = $_POST['business_duration'];
	$business_staff = $_POST['business_staff'];
	$quantity = $_POST['quantity'];
	$amount = $_POST['amount'];
	$localmarket = $_POST['localmarket'];
	$office = $_POST['office'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = "Nigeria";//$_POST['country'];
	$experience = $_POST['experience'];
	$marketting = $_POST['marketting'];
	$installers = $_POST['installers'];
	$notes = $_POST['notes'];
	$username = $email;
        $file_cac1 = $_FILES["file_cac1"];
        $file_cac2 = $_FILES["file_cac2"];
        $file_cac3 = $_FILES["file_cac3"];
        $file_passport = $_FILES["file_passport"];
        $file_office1 = $_FILES["file_office1"];
        $file_office2 = $_FILES["file_office2"];
        $file_office3 = $_FILES["file_office3"];
        $file_office4 = $_FILES["file_office4"];

        $thedate = date("Y-m-d");
        
        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("You do not have access to perform this action");
		return;
	}

	//check if the fields where filled
	$msg = "";
	if(strlen($type) < 1) $msg .= "**Select the dealership type to register.";
	if(strlen($surname) < 1) $msg .= "**Enter your surname.";
	if(strlen($firstname) < 1) $msg .= "**Enter your firstname.";
	if(strlen($company) < 1) $msg .= "**Enter your company or business name.";
	if(!is_numeric($phone) || strlen($phone) < 10) $msg .= "**Please enter a valid phone number.";
	if(count(explode("@",$email)) < 2) $msg .= "**Please provide a valid email address.";
	if(strlen($city) < 1) $msg .= "**Enter your state.";
	if(strlen($state) < 1) $msg .= "*select your state.";
	//if(strlen($username) < 1) $msg .= "**Enter a login username.";
	//if(strlen($password) < 1) $msg .= "**Enter a login password.";
	//if(strlen($password) > 0 && $password != $password2) $msg .= "**Password confirmation does not match.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before submitting:**$msg");
		return;
	}

        //generate username and password
        $password = "dealer12345";
        $password = generatePassword($password);

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //check if the username is in use
        if($dataread->registrations_getbyusername($mycon, $username) !== false)
        {
            showAlert("The specified email address is already in use. Please do NOT submit multiple registration to avoid disqualification.");
            return;            
        }
                
        $dealer_id = $datawrite->registrations_add($mycon, $type, $surname, $firstname, $othernames, $company, $phone, $address, $email, $owner1, $owner2, $owner3, $owner4, $business_type, $business_duration, $business_staff, $quantity, $amount, $localmarket, $office, $city, $state, $country, $experience, $marketting, $installers, $notes, $username, $password, $thedate);

        if(!$dealer_id)
        {
            showAlert("There was an error processing your regiistration. Please try again.");
            return;
        }
        else
        {            
            //save the attached images
            if(strpos(strtoupper($file_cac1['type']),"IMAGE") > -1) move_uploaded_file($file_cac1['tmp_name'],"files/registrations/{$dealer_id}_cac1.jpg");
            if(strpos(strtoupper($file_cac2['type']),"IMAGE") > -1) move_uploaded_file($file_cac2['tmp_name'],"files/registrations/{$dealer_id}_cac2.jpg");
            if(strpos(strtoupper($file_cac3['type']),"IMAGE") > -1) move_uploaded_file($file_cac3['tmp_name'],"files/registrations/{$dealer_id}_cac3.jpg");
            if(strpos(strtoupper($file_passport['type']),"IMAGE") > -1) move_uploaded_file($file_passport['tmp_name'],"files/registrations/{$dealer_id}_file_passport.jpg");
            if(strpos(strtoupper($file_office1['type']),"IMAGE") > -1) move_uploaded_file($file_office1['tmp_name'],"files/registrations/{$dealer_id}_file_office1.jpg");
            if(strpos(strtoupper($file_office2['type']),"IMAGE") > -1) move_uploaded_file($file_office2['tmp_name'],"files/registrations/{$dealer_id}_file_office2.jpg");
            if(strpos(strtoupper($file_office3['type']),"IMAGE") > -1) move_uploaded_file($file_office3['tmp_name'],"files/registrations/{$dealer_id}_file_office3.jpg");
            if(strpos(strtoupper($file_office4['type']),"IMAGE") > -1) move_uploaded_file($file_office4['tmp_name'],"files/registrations/{$dealer_id}_file_office4.jpg");
            
            openPage("admin_registrations-view.php?code=$dealer_id");
        }
    }

                
    function admin_registrations_update()
    {
	$registration_id = $_POST['registration_id'];
	$type = $_POST['type'];
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$othernames = $_POST['othernames'];
	$company = $_POST['company'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$owner1 = $_POST['owner1'];
	$owner2 = $_POST['owner2'];
	$owner3 = $_POST['owner3'];
	$owner4 = $_POST['owner4'];
	$business_type = $_POST['business_type'];
	$business_duration = $_POST['business_duration'];
	$business_staff = $_POST['business_staff'];
	$quantity = $_POST['quantity'];
	$amount = $_POST['amount'];
	$localmarket = $_POST['localmarket'];
	$office = $_POST['office'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = "Nigeria";//$_POST['country'];
	$experience = $_POST['experience'];
	$marketting = $_POST['marketting'];
	$installers = $_POST['installers'];
	$notes = $_POST['notes'];
        $file_cac1 = $_FILES["file_cac1"];
        $file_cac2 = $_FILES["file_cac2"];
        $file_cac3 = $_FILES["file_cac3"];
        $file_passport = $_FILES["file_passport"];
        $file_office1 = $_FILES["file_office1"];
        $file_office2 = $_FILES["file_office2"];
        $file_office3 = $_FILES["file_office3"];
        $file_office4 = $_FILES["file_office4"];
	$password = "";//$_POST['password'];

        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES" && getCookie("managerlogin") != "YES")
	{
		showAlert("You do not have access to perform this action");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($company) < 1) $msg .= "**Enter the company name.";
	if(strlen($surname) < 1) $msg .= "**Enter the conact surname.";
	if(strlen($firstname) < 1) $msg .= "**Enter the contact firstname.";
	if(!is_numeric($phone) || strlen($phone) < 10) $msg .= "**Please enter a valid phone number.";
	if(count(explode("@",$email)) < 2) $msg .= "**Please provide a valid email address.";
	if(strlen($city) < 1) $msg .= "**Enter the state.";
	if(strlen($state) < 1) $msg .= "**Enter the state.";
	if(strlen($country) < 1) $msg .= "**Enter the country.";
	//if(strlen($username) < 1) $msg .= "**Enter the login username.";
	//if(strlen($password) < 1) $msg .= "**Enter the login password.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //check if service no exits
        $retailerdetails = $dataread->registrations_get($mycon, $registration_id);
        if(!$retailerdetails)
        {
		showAlert("The retailer details could not be loaded.");
		return;            
        }
        
        //check if chanfing password
        $password = (strlen($password) > 0) ? generatePassword($password) : $retailerdetails['password'];
                
        $done = $datawrite->registrations_update($mycon, $registration_id, $type, $surname, $firstname, $othernames, $company, $phone, $address, $email, $owner1, $owner2, $owner3, $owner4, $business_type, $business_duration, $business_staff, $quantity, $amount, $localmarket, $office, $city, $state, $country, $experience, $marketting, $installers, $notes, $password);

        if(!$done)
        {
            showAlert("There was an error updating this registration details. Please try again.");
            return;
        }
        else
        {            
            $dealer_id = $registration_id;
            //save the attached images
            if(strpos(strtoupper($file_cac1['type']),"IMAGE") > -1) move_uploaded_file($file_cac1['tmp_name'],"files/registrations/{$dealer_id}_cac1.jpg");
            if(strpos(strtoupper($file_cac2['type']),"IMAGE") > -1) move_uploaded_file($file_cac2['tmp_name'],"files/registrations/{$dealer_id}_cac2.jpg");
            if(strpos(strtoupper($file_cac3['type']),"IMAGE") > -1) move_uploaded_file($file_cac3['tmp_name'],"files/registrations/{$dealer_id}_cac3.jpg");
            if(strpos(strtoupper($file_passport['type']),"IMAGE") > -1) move_uploaded_file($file_passport['tmp_name'],"files/registrations/{$dealer_id}_file_passport.jpg");
            if(strpos(strtoupper($file_office1['type']),"IMAGE") > -1) move_uploaded_file($file_office1['tmp_name'],"files/registrations/{$dealer_id}_file_office1.jpg");
            if(strpos(strtoupper($file_office2['type']),"IMAGE") > -1) move_uploaded_file($file_office2['tmp_name'],"files/registrations/{$dealer_id}_file_office2.jpg");
            if(strpos(strtoupper($file_office3['type']),"IMAGE") > -1) move_uploaded_file($file_office3['tmp_name'],"files/registrations/{$dealer_id}_file_office3.jpg");
            if(strpos(strtoupper($file_office4['type']),"IMAGE") > -1) move_uploaded_file($file_office4['tmp_name'],"files/registrations/{$dealer_id}_file_office4.jpg");
                        
            if(getCookie("managerlogin") == "YES") return openPage("manager_registrations-view.php?code=$registration_id");
            
            openPage("admin_registrations-view.php?code=$registration_id");
        }
    }

    function admin_registrations_sendmessage()
    {
	$registration_id = $_POST['registration_id'];
	$type = $_POST['message_type'];
	$subject = $_POST['subject'];
	$message = $_POST['message_email'];
	$message_sms = $_POST['message_sms'];
        if($type == "sms") $message = $message_sms;
        
        $reseller_id = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("Your account details could not be validated. Please refresh this page and try again.");
		return;
	}
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($message) < 2) $msg .= "**Enter the message to send";
	if($type == "email" && strlen($subject) < 2) $msg .= "**Enter the email subject";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	
        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //get the account details
        $retailerdetails = $dataread->registrations_get($mycon,$registration_id);
        if(!$retailerdetails)
        {
		showAlert("The details of this registration could not be loaded. Please refresh this page and try again");
		return;
        }
        
        //send email
        if($type == "email")
        {
            sendEmail($retailerdetails['email'], $subject, $message, "TStv Dealership<dealership@tstvafrica.com>");
            showAlert("Email sent!");
            return;
        }
        
        //send sms
        if($type == "sms")
        {
            sendSMS($retailerdetails['phone'], $message);
            showAlert("SMS sent!");
            return;
        }
            
    }    
    function admin_registrations_messageall_old()
    {
	$type = $_POST['message_type'];
	$subject = $_POST['subject'];
	$message = $_POST['message_email'];
	$message_sms = $_POST['message_sms'];
        if($type == "sms") $message = $message_sms;
        
	if(getCookie("adminlogin") <> "YES")
	{
		showAlert("You do not have enough permission to perform this action.");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if($type == "email" && strlen($subject) < 2) $msg .= "**Enter the email subject";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	
        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
                
        //get users
        $count = 0;
        $userslist = $dataread->registrations_list_old($mycon,"","");
        foreach($userslist as $user)
        {            
            try
            {
                //send email
                if($type == "email")
                {
                    sendEmail($user['email'], $subject, $message, "TStv Dealership<dealership@tstvafrica.com>");
                }

                //send sms
                if($type == "sms")
                {
                    sendSMS($user['phone'], $message);
                }
                
                $count ++;
                
            } catch (Exception $ex) {

            }
        }
        
        showAlert("Message Sent to $count registrations.");
        return;
            
    }
    
    
    
    function admin_registrations_messageall()
    {
	$type = $_POST['message_type'];
	$subject = $_POST['subject'];
	$message = $_POST['message_email'];
	$message_sms = $_POST['message_sms'];
        if($type == "sms") $message = $message_sms;
        
	if(getCookie("adminlogin") <> "YES")
	{
		showAlert("You do not have enough permission to perform this action.");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if($type == "email" && strlen($subject) < 2) $msg .= "**Enter the email subject";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	
        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
                
        //get users
        $count = 0;
        $userslist = $dataread->registrations_list($mycon,"","");
        foreach($userslist as $user)
        {            
            try
            {
                //send email
                if($type == "email")
                {
                    sendEmail($user['email'], $subject, $message, "TStv Dealership<dealership@tstvafrica.com>");
                }

                //send sms
                if($type == "sms")
                {
                    sendSMS($user['phone'], $message);
                }
                
                $count ++;
                
            } catch (Exception $ex) {

            }
        }
        
        showAlert("Message Sent to $count registrations.");
        return;
            
    }
    
    
    function admin_managers_add()
    {
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$othernames = $_POST['othernames'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$notes = $_POST['notes'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("Your account details could not be validated. Please refresh this page and try again.");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($name) < 1) $msg .= "**Enter the manager's title.";
	if(strlen($surname) < 1) $msg .= "**Enter the surname.";
	if(strlen($firstname) < 1) $msg .= "**Enter the firstname.";
	if(!is_numeric($phone) || strlen($phone) < 10) $msg .= "**Please enter a valid phone number.";
	if(count(explode("@",$email)) < 2) $msg .= "**Please provide a valid email address.";
	if(strlen($username) < 1) $msg .= "**Enter the login username.";
	if(strlen($password) < 1) $msg .= "**Enter the login password.";
	if(strlen($password) > 0 && $password !== $password2) $msg .= "**Password confirmation does not match.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        //generate username and password
        $password = generatePassword($password);

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //check if the username is in use
        if(strtolower($username) == "administrator" || $dataread->dealers_getbyusername($mycon, $username) !== false || $dataread->managers_getbyusername($mycon, $username) !== false || $dataread->retailers_getbyusername($mycon, $username) !== false)
        {
            showAlert("The specified username is already in use.");
            return;            
        }
                
        $manager_id = $datawrite->managers_add($mycon, $name, $surname, $firstname, $othernames, $email, $phone, $username, $password, $notes);

        if(!$manager_id)
        {
            showAlert("There was an error saving this manager details. Please try again.");
            return;
        }
        else
        {            
            $datawrite->admin_activities($mycon,$currentuserid,"Created new manager #$manager_id ($surname $firstname)");
                        
            openPage("admin_managers-list.php");
        }
    }

    function admin_managers_update()
    {
	$manager_id = $_POST['manager_id'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$othernames = $_POST['othernames'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$notes = $_POST['notes'];
	$password = $_POST['password'];

        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("Your account details could not be validated. Please refresh this page and try again.");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($name) < 1) $msg .= "**Enter the manager's title.";
	if(strlen($surname) < 1) $msg .= "**Enter the surname.";
	if(strlen($firstname) < 1) $msg .= "**Enter the firstname.";
	if(!is_numeric($phone) || strlen($phone) < 10) $msg .= "**Please enter a valid phone number.";
	if(count(explode("@",$email)) < 2) $msg .= "**Please provide a valid email address.";
	//if(strlen($username) < 1) $msg .= "**Enter the login username.";
	//if(strlen($password) < 1) $msg .= "**Enter the login password.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //check if service no exits
        $managersdetails = $dataread->managers_get($mycon, $manager_id);
        if(!$managersdetails)
        {
		showAlert("The manager details could not be loaded.");
		return;            
        }
        
        //check if chanfing password
        $password = (strlen($password) > 0) ? generatePassword($password) : $managersdetails['password'];
                
        $done = $datawrite->managers_update($mycon, $manager_id, $name, $surname, $firstname, $othernames, $email, $phone, $password, $notes);

        if(!$done)
        {
            showAlert("There was an error updating this manager details. Please try again.");
            return;
        }
        else
        {            
            $datawrite->admin_activities($mycon,$currentuserid,"Updated manager #$manager_id ($surname $firstname)");
                        
            openPage("admin_managers-view.php?code=$manager_id");
        }
    }

    function admin_managers_update_status()
    {
	$manager_id = $_POST['manager_id'];
	$status = $_POST['status'];
	$reason = $_POST['reason'];
        $notify = "no";
	if(isset($_POST['notify'])) $notify = $_POST['notify'];
        
        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("Your account details could not be validated. Please refresh this page and try again.");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($reason) < 1) $msg .= "**Enter the reason change of status";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //get the dealer details
        $managerdetails = $dataread->managers_get($mycon,$manager_id);
        if(!$managerdetails)
        {
		showAlert("The details of this manager could not be loaded. Please refresh this page and try again");
		return;
        }
        
        //check if status was changed
        if($status == $managerdetails['status'])
        {
		showAlert("The manager status was not changed.");
		return;            
        }
        
        $done = $datawrite->managers_update_status($mycon, $manager_id, $status, $reason, $currentuserid);
        
        if(!$done)
        {
            showAlert("There was an error updating this manager. Please try again.");
            return;
        }
        else
        {
            //check if to notify the account owner
            if($notify == "yes")
            {
                $message = "Your TStv Zonal manager account status is now: '".getDealerStatusName($status)."' because: $reason";
                sendSMS($dealerdetails['phone'],$message);
            }

            $datawrite->admin_activities($mycon,$currentuserid,"Updated manager status for #$manager_id from ".$managerdetails['status']." to ".$status);
            openPage("admin_managers-view.php?code=$manager_id");
        }
    }
   
    function admin_managers_sendmessage()
    {
	$manager_id = $_POST['manager_id'];
	$type = $_POST['message_type'];
	$subject = $_POST['subject'];
	$message = $_POST['message_email'];
	$message_sms = $_POST['message_sms'];
        if($type == "sms") $message = $message_sms;
        
        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("Your account details could not be validated. Please refresh this page and try again.");
		return;
	}
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($message) < 2) $msg .= "**Enter the message to send";
	if($type == "email" && strlen($subject) < 2) $msg .= "**Enter the email subject";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	
        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //get the account details
        $managerdetails = $dataread->managers_get($mycon,$manager_id);
        if(!$managerdetails)
        {
		showAlert("The details of this manager could not be loaded. Please refresh this page and try again");
		return;
        }
        
        //send email
        if($type == "email")
        {
            sendEmail($managerdetails['email'], $subject, $message);
            showAlert("Email sent!");
            return;
        }
        
        //send sms
        if($type == "sms")
        {
            sendSMS($managerdetails['phone'], $message);
            showAlert("SMS sent!");
            return;
        }
            
    }
    
    function admin_managers_messageall()
    {
	$type = $_POST['message_type'];
	$subject = $_POST['subject'];
	$message = $_POST['message_email'];
	$message_sms = $_POST['message_sms'];
        if($type == "sms") $message = $message_sms;
        
	if(getCookie("adminlogin") <> "YES")
	{
		showAlert("You do not have enough permission to perform this action.");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if($type == "email" && strlen($subject) < 2) $msg .= "**Enter the email subject";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	
        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
                
        //get users
        $count = 0;
        $userslist = $dataread->managers_list($mycon,"","");
        foreach($userslist as $user)
        {            
            try
            {
                //send email
                if($type == "email")
                {
                    sendEmail($user['email'], $subject, $message);
                }

                //send sms
                if($type == "sms")
                {
                    sendSMS($user['phone'], $message);
                }
                
                $count ++;
                
            } catch (Exception $ex) {

            }
        }
        
        showAlert("Message Sent to $count users.");
        return;
            
    }
    
    function admin_managers_delete()
    {
	$manager_id = $_POST['manager_id'];
	$transfer = $_POST['transfer'];
        
        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("Your account details could not be validated. Please refresh this page and try again.");
		return;
	}
        
        $thedate = date("Y-m-d");	

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //get the dealer details
        $managerdetails = $dataread->managers_get($mycon,$manager_id);
        if(!$managerdetails)
        {
		showAlert("The details of this manager could not be loaded. Please refresh this page and try again");
		return;
        }
        
        if($managerdetails['dealerscount'] > 0 && $transfer == "" )
        {
            showAlert("Select another manager to transfer the dealers under this manager to.");
            return;            
        }

        $done = $datawrite->managers_delete($mycon, $manager_id, $transfer);
        if(!$done)
        {
            showAlert("There was an error deleting this manager. Please try again.");
            return;
        }

        $datawrite->admin_activities($mycon,$currentuserid,"Deleted manager #$manager_id and transfered dealers to $transfer");
        openPage("admin_managers-list.php");
    }
   
        
    function admin_dealers_update()
    {
	$dealer_id = $_POST['dealer_id'];
	$type = $_POST['type'];
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$othernames = $_POST['othernames'];
	$company = $_POST['company'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$owner1 = $_POST['owner1'];
	$owner2 = $_POST['owner2'];
	$owner3 = $_POST['owner3'];
	$owner4 = $_POST['owner4'];
	$business_type = $_POST['business_type'];
	$business_duration = $_POST['business_duration'];
	$business_staff = $_POST['business_staff'];
	$quantity = $_POST['quantity'];
	$amount = $_POST['amount'];
	$localmarket = $_POST['localmarket'];
	$office = $_POST['office'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = "Nigeria";//$_POST['country'];
	$experience = $_POST['experience'];
	$marketting = $_POST['marketting'];
	$installers = $_POST['installers'];
	$notes = $_POST['notes'];
        $file_cac1 = $_FILES["file_cac1"];
        $file_cac2 = $_FILES["file_cac2"];
        $file_cac3 = $_FILES["file_cac3"];
        $file_passport = $_FILES["file_passport"];
        $file_office1 = $_FILES["file_office1"];
        $file_office2 = $_FILES["file_office2"];
        $file_office3 = $_FILES["file_office3"];
        $file_office4 = $_FILES["file_office4"];
	$password = "";//$_POST['password'];

        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("You do not have access to perform this action");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($company) < 1) $msg .= "**Enter the company name.";
	if(strlen($surname) < 1) $msg .= "**Enter the conact surname.";
	if(strlen($firstname) < 1) $msg .= "**Enter the contact firstname.";
	//if(!is_numeric($phone) || strlen($phone) < 10) $msg .= "**Please enter a valid phone number.";
	if(count(explode("@",$email)) < 2) $msg .= "**Please provide a valid email address.";
	if(strlen($city) < 1) $msg .= "**Enter the state.";
	if(strlen($state) < 1) $msg .= "**Enter the state.";
	if(strlen($country) < 1) $msg .= "**Enter the country.";
	//if(strlen($username) < 1) $msg .= "**Enter the login username.";
	//if(strlen($password) < 1) $msg .= "**Enter the login password.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //check if service no exits
        $retailerdetails = $dataread->dealers_get($mycon, $dealer_id);
        if(!$retailerdetails)
        {
		showAlert("The retailer details could not be loaded.");
		return;            
        }
        
        //check if chanfing password
        $password = (strlen($password) > 0) ? generatePassword($password) : $retailerdetails['password'];
                
        $done = $datawrite->dealers_update($mycon, $dealer_id, $type, $surname, $firstname, $othernames, $company, $phone, $address, $email, $owner1, $owner2, $owner3, $owner4, $business_type, $business_duration, $business_staff, $quantity, $amount, $localmarket, $office, $city, $state, $country, $experience, $marketting, $installers, $notes, $password);

        if(!$done)
        {
            showAlert("There was an error updating this registration details. Please try again.");
            return;
        }
        else
        {            
            //save the attached images
            if(strpos(strtoupper($file_cac1['type']),"IMAGE") > -1) move_uploaded_file($file_cac1['tmp_name'],"files/dealers/{$dealer_id}_cac1.jpg");
            if(strpos(strtoupper($file_cac2['type']),"IMAGE") > -1) move_uploaded_file($file_cac2['tmp_name'],"files/dealers/{$dealer_id}_cac2.jpg");
            if(strpos(strtoupper($file_cac3['type']),"IMAGE") > -1) move_uploaded_file($file_cac3['tmp_name'],"files/dealers/{$dealer_id}_cac3.jpg");
            if(strpos(strtoupper($file_passport['type']),"IMAGE") > -1) move_uploaded_file($file_passport['tmp_name'],"files/dealers/{$dealer_id}_file_passport.jpg");
            if(strpos(strtoupper($file_office1['type']),"IMAGE") > -1) move_uploaded_file($file_office1['tmp_name'],"files/dealers/{$dealer_id}_file_office1.jpg");
            if(strpos(strtoupper($file_office2['type']),"IMAGE") > -1) move_uploaded_file($file_office2['tmp_name'],"files/dealers/{$dealer_id}_file_office2.jpg");
            if(strpos(strtoupper($file_office3['type']),"IMAGE") > -1) move_uploaded_file($file_office3['tmp_name'],"files/dealers/{$dealer_id}_file_office3.jpg");
            if(strpos(strtoupper($file_office4['type']),"IMAGE") > -1) move_uploaded_file($file_office4['tmp_name'],"files/dealers/{$dealer_id}_file_office4.jpg");
            
            openPage("admin_dealers-view.php?code=$dealer_id");
        }
    }

    function admin_dealers_update_status()
    {
	$dealer_id = $_POST['dealer_id'];
	$status = $_POST['status'];
	$reason = $_POST['reason'];
        $notify = "no";
	if(isset($_POST['notify'])) $notify = $_POST['notify'];
        
        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("Your account details could not be validated. Please refresh this page and try again.");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($reason) < 1) $msg .= "**Enter the reason change of status";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //get the dealer details
        $dealerdetails = $dataread->dealers_get($mycon,$dealer_id);
        if(!$dealerdetails)
        {
		showAlert("The details of this dealer could not be loaded. Please refresh this page and try again");
		return;
        }
        
        //check if status was changed
        if($status == $dealerdetails['status'])
        {
		showAlert("The dealer status was not changed.");
		return;            
        }
        
        $done = $datawrite->dealers_update_status($mycon, $dealer_id, $status, $reason, $currentuserid);
        
        if(!$done)
        {
            showAlert("There was an error updating this dealer. Please try again.");
            return;
        }
        else
        {
            //check if to notify the account owner
            if($notify == "yes")
            {
                $message = "Your TStv dealership status is now: '".getDealerStatusName($status)."' because: $reason";
                sendSMS($dealerdetails['phone'],$message);
            }

            $datawrite->admin_activities($mycon,$currentuserid,"Updated dealer status for #$dealer_id from ".$dealerdetails['status']." to ".$status);
            openPage("admin_dealers-view.php?code=$dealer_id");
        }
    }
   
    function admin_dealers_sendmessage()
    {
	$dealer_id = $_POST['dealer_id'];
	$type = $_POST['message_type'];
	$subject = $_POST['subject'];
	$message = $_POST['message_email'];
	$message_sms = $_POST['message_sms'];
        if($type == "sms") $message = $message_sms;
        
        $reseller_id = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("Your account details could not be validated. Please refresh this page and try again.");
		return;
	}
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($message) < 2) $msg .= "**Enter the message to send";
	if($type == "email" && strlen($subject) < 2) $msg .= "**Enter the email subject";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	
        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //get the account details
        $dealerdetails = $dataread->dealers_get($mycon,$dealer_id);
        if(!$dealerdetails)
        {
		showAlert("The details of this dealer could not be loaded. Please refresh this page and try again");
		return;
        }
        
        //send email
        if($type == "email")
        {
            sendEmail($dealerdetails['email'], $subject, $message);
            showAlert("Email sent!");
            return;
        }
        
        //send sms
        if($type == "sms")
        {
            sendSMS($dealerdetails['phone'], $message);
            showAlert("SMS sent!");
            return;
        }
            
    }

    function admin_dealers_messageall()
    {
	$type = $_POST['message_type'];
	$subject = $_POST['subject'];
	$message = $_POST['message_email'];
	$message_sms = $_POST['message_sms'];
        if($type == "sms") $message = $message_sms;
        
	if(getCookie("adminlogin") <> "YES")
	{
		showAlert("You do not have enough permission to perform this action.");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if($type == "email" && strlen($subject) < 2) $msg .= "**Enter the email subject";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	
        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
                
        //get users
        $count = 0;
        $userslist = $dataread->dealers_list($mycon,"","");
        foreach($userslist as $user)
        {            
            try
            {
                //send email
                if($type == "email")
                {
                    sendEmail($user['email'], $subject, $message);
                }

                //send sms
                if($type == "sms")
                {
                    sendSMS($user['phone'], $message);
                }
                
                $count ++;
                
            } catch (Exception $ex) {

            }
        }
        
        showAlert("Message Sent to $count users.");
        return;
            
    }
            
    function admin_dealers_delete()
    {
	$dealer_id = $_POST['dealer_id'];
	$transfer = $_POST['transfer'];
        
        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("Your account details could not be validated. Please refresh this page and try again.");
		return;
	}
        
        $thedate = date("Y-m-d");	

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //get the dealer details
        $dealerdetails = $dataread->dealers_get($mycon,$dealer_id);
        if(!$dealerdetails)
        {
		showAlert("The details of this dealer could not be loaded. Please refresh this page and try again");
		return;
        }
        
        if($dealerdetails['retailerscount'] > 0 && $transfer == "" )
        {
            showAlert("Select another dealer to transfer the retailers under this dealer to.");
            return;            
        }

        $done = $datawrite->dealers_delete($mycon, $dealer_id, $transfer);
        if(!$done)
        {
            showAlert("There was an error deleting this dealer. Please try again.");
            return;
        }

        $datawrite->admin_activities($mycon,$currentuserid,"Deleted dealer #$dealer_id and transfered retailers to $transfer");
        openPage("admin_dealers-list.php");
    }
   
        
    function admin_retailers_update()
    {
	$retailer_id = $_POST['retailer_id'];
	$company = $_POST['company'];
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$notes = $_POST['notes'];
	$password = $_POST['password'];

        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("You do not have access to perform this action");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($company) < 1) $msg .= "**Enter the company name.";
	if(strlen($surname) < 1) $msg .= "**Enter the conact surname.";
	if(strlen($firstname) < 1) $msg .= "**Enter the contact firstname.";
	if(!is_numeric($phone) || strlen($phone) < 10) $msg .= "**Please enter a valid phone number.";
	if(count(explode("@",$email)) < 2) $msg .= "**Please provide a valid email address.";
	if(strlen($city) < 1) $msg .= "**Enter the state.";
	if(strlen($state) < 1) $msg .= "**Enter the state.";
	if(strlen($country) < 1) $msg .= "**Enter the country.";
	//if(strlen($username) < 1) $msg .= "**Enter the login username.";
	//if(strlen($password) < 1) $msg .= "**Enter the login password.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //check if service no exits
        $retailerdetails = $dataread->retailers_get($mycon, $retailer_id);
        if(!$retailerdetails)
        {
		showAlert("The retailer details could not be loaded.");
		return;            
        }
        
        //check if chanfing password
        $password = (strlen($password) > 0) ? generatePassword($password) : $retailerdetails['password'];
                
        $done = $datawrite->retailers_update($mycon, $retailer_id, $company, $surname, $firstname, $email, $phone, $address, $city, $state, $country, $password);

        if(!$done)
        {
            showAlert("There was an error updating this retailer details. Please try again.");
            return;
        }
        else
        {            
            $datawrite->admin_activities($mycon,$currentuserid,"Created new super dealer #$retailer_id ($company)");
                        
            openPage("admin_retailers-view.php?code=$retailer_id");
        }
    }

    function admin_retailers_update_status()
    {
	$retailer_id = $_POST['retailer_id'];
	$status = $_POST['status'];
	$reason = $_POST['reason'];
        $notify = "no";
	if(isset($_POST['notify'])) $notify = $_POST['notify'];
        
        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("You do not have access to perform this action");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($reason) < 1) $msg .= "**Enter the reason change of status";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //get the dealer details
        $retailerdetails = $dataread->retailers_get($mycon,$retailer_id);
        if(!$retailerdetails)
        {
		showAlert("The details of this retailer could not be loaded. Please refresh this page and try again");
		return;
        }
        
        //check if status was changed
        if($status == $retailerdetails['status'])
        {
		showAlert("The retailer status was not changed.");
		return;            
        }
        
        $done = $datawrite->retailers_update_status($mycon, $retailer_id, $status, $reason, $currentuserid);
        
        if(!$done)
        {
            showAlert("There was an error updating this retailer. Please try again.");
            return;
        }
        else
        {
            //check if to notify the account owner
            if($notify == "yes")
            {
                $message = "Your TStv dealership status is now: '".getDealerStatusName($status)."' because: $reason";
                sendSMS($retailerdetails['phone'],$message);
            }

            $datawrite->admin_activities($mycon,$currentuserid,"Updated dealer status for #$retailer_id from ".$retailerdetails['status']." to ".$status);
            openPage("admin_retailers-view.php?code=$retailer_id");
        }
    }
   
    function admin_retailers_sendmessage()
    {
	$retailer_id = $_POST['retailer_id'];
	$type = $_POST['message_type'];
	$subject = $_POST['subject'];
	$message = $_POST['message_email'];
	$message_sms = $_POST['message_sms'];
        if($type == "sms") $message = $message_sms;
        
        $reseller_id = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("Your account details could not be validated. Please refresh this page and try again.");
		return;
	}
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($message) < 2) $msg .= "**Enter the message to send";
	if($type == "email" && strlen($subject) < 2) $msg .= "**Enter the email subject";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	
        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //get the account details
        $retailerdetails = $dataread->retailers_get($mycon,$retailer_id);
        if(!$retailerdetails)
        {
		showAlert("The details of this retailer could not be loaded. Please refresh this page and try again");
		return;
        }
        
        //send email
        if($type == "email")
        {
            sendEmail($retailerdetails['email'], $subject, $message);
            showAlert("Email sent!");
            return;
        }
        
        //send sms
        if($type == "sms")
        {
            sendSMS($retailerdetails['phone'], $message);
            showAlert("SMS sent!");
            return;
        }
            
    }

    function admin_retailers_messageall()
    {
	$type = $_POST['message_type'];
	$subject = $_POST['subject'];
	$message = $_POST['message_email'];
	$message_sms = $_POST['message_sms'];
        if($type == "sms") $message = $message_sms;
        
	if(getCookie("adminlogin") <> "YES")
	{
		showAlert("You do not have enough permission to perform this action.");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if($type == "email" && strlen($subject) < 2) $msg .= "**Enter the email subject";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	
        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
                
        //get users
        $count = 0;
        $userslist = $dataread->retailers_list($mycon,"","");
        foreach($userslist as $user)
        {            
            try
            {
                //send email
                if($type == "email")
                {
                    sendEmail($user['email'], $subject, $message);
                }

                //send sms
                if($type == "sms")
                {
                    sendSMS($user['phone'], $message);
                }
                
                $count ++;
                
            } catch (Exception $ex) {

            }
        }
        
        showAlert("Message Sent to $count users.");
        return;
            
    }
            
    function admin_retailers_delete()
    {
	$retailer_id = $_POST['retailer_id'];
	$transfer = $_POST['transfer'];
        
        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("Your account details could not be validated. Please refresh this page and try again.");
		return;
	}
        
        $thedate = date("Y-m-d");	

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //get the dealer details
        $retailerdetails = $dataread->retailers_get($mycon,$retailer_id);
        if(!$retailerdetails)
        {
		showAlert("The details of this dealer could not be loaded. Please refresh this page and try again");
		return;
        }
        
        if($retailerdetails['salescount'] > 0 && $transfer == "" )
        {
            showAlert("Select another retailer to transfer the sales under this retailer to.");
            return;            
        }

        $done = $datawrite->retailers_delete($mycon, $retailer_id, $transfer);
        if(!$done)
        {
            showAlert("There was an error deleting this retailer. Please try again.");
            return;
        }

        $datawrite->admin_activities($mycon,$currentuserid,"Deleted retailer #$retailer_id and transfered retailers to $transfer");
        openPage("admin_retailers-list.php");
    }
   

/////////////////////
    function manager_dealers_add()
    {
	$company = $_POST['company'];
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = "Nigeria";//$_POST['country'];
	$notes = $_POST['notes'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

        $currentuserid = getCookie("userid");
	if(getCookie("managerlogin") != "YES")
	{
		showAlert("You do not have access to perform this action");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($company) < 1) $msg .= "**Enter the company name.";
	if(strlen($surname) < 1) $msg .= "**Enter the conact surname.";
	if(strlen($firstname) < 1) $msg .= "**Enter the contact firstname.";
	if(!is_numeric($phone) || strlen($phone) < 10) $msg .= "**Please enter a valid phone number.";
	if(count(explode("@",$email)) < 2) $msg .= "**Please provide a valid email address.";
	if(strlen($city) < 1) $msg .= "**Enter the state.";
	if(strlen($state) < 1) $msg .= "**Enter the state.";
	if(strlen($username) < 1) $msg .= "**Enter the login username.";
	if(strlen($password) < 1) $msg .= "**Enter the login password.";
	if(strlen($password) > 0 && $password != $password2) $msg .= "**Password confirmation does not match.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        //generate username and password
        $password = generatePassword($password);

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //check if the username is in use
        if(strtolower($username) == "administrator" || $dataread->dealers_getbyusername($mycon, $username) !== false || $dataread->managers_getbyusername($mycon, $username) !== false || $dataread->retailers_getbyusername($mycon, $username) !== false)
        {
            showAlert("The specified username is already in use.");
            return;            
        }
        
        //get the super dealer details
        $managerdetails = $dataread->managers_get($mycon, $currentuserid);
        if(!$managerdetails)
        {
		showAlert("Your account details could not be loaded. Please refresh this page and try again.");
		return;            
        }
        
        //checj if dealer is a super
        if($managerdetails['status'] != 5)
        {
            showAlert("Your account is not active. Please contact the administrator.");
            return;            
        }
                
        $dealer_id = $datawrite->dealers_add($mycon, $managerdetails['manager_id'], $company, $surname, $firstname, $email, $phone, $address, $city, $state, $country, $username, $password, $thedate);

        if(!$dealer_id)
        {
            showAlert("There was an error saving this dealer details. Please try again.");
            return;
        }
        else
        {            
            $datawrite->admin_activities($mycon,$currentuserid,"Created new dealer #$dealer_id ($company)");
                        
            openPage("manager_dealers-list.php");
        }
    }

    function manager_dealers_update()
    {
	$dealer_id = $_POST['dealer_id'];
	$company = $_POST['company'];
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = "Nigeria";//$_POST['country'];
	$notes = $_POST['notes'];
	$password = $_POST['password'];

        $currentuserid = getCookie("userid");
	if(getCookie("managerlogin") != "YES")
	{
		showAlert("You do not have access to perform this action");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($company) < 1) $msg .= "**Enter the company name.";
	if(strlen($surname) < 1) $msg .= "**Enter the conact surname.";
	if(strlen($firstname) < 1) $msg .= "**Enter the contact firstname.";
	if(!is_numeric($phone) || strlen($phone) < 10) $msg .= "**Please enter a valid phone number.";
	if(count(explode("@",$email)) < 2) $msg .= "**Please provide a valid email address.";
	if(strlen($city) < 1) $msg .= "**Enter the state.";
	if(strlen($state) < 1) $msg .= "**Enter the state.";
	//if(strlen($country) < 1) $msg .= "**Enter the country.";
	//if(strlen($username) < 1) $msg .= "**Enter the login username.";
	//if(strlen($password) < 1) $msg .= "**Enter the login password.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //check if service no exits
        $dealerdetails = $dataread->dealers_get($mycon, $dealer_id);
        if(!$dealerdetails || $dealerdetails['manager_id'] != $currentuserid)
        {
		showAlert("The dealer details could not be loaded.");
		return;            
        }
        
        //check if chanfing password
        $password = (strlen($password) > 0) ? generatePassword($password) : $dealerdetails['password'];
                
        $done = $datawrite->dealers_update($mycon, $dealer_id, $company, $surname, $firstname, $email, $phone, $address, $city, $state, $country, $password);

        if(!$done)
        {
            showAlert("There was an error updating this dealer details. Please try again.");
            return;
        }
        else
        {            
            $datawrite->admin_activities($mycon,$currentuserid,"Updated dealer #$dealer_id ($company)");
                        
            openPage("manager_dealers-view.php?code=$dealer_id");
        }
    }

    function manager_dealers_update_status()
    {
	$dealer_id = $_POST['dealer_id'];
	$status = $_POST['status'];
	$reason = $_POST['reason'];
        $notify = "no";
	if(isset($_POST['notify'])) $notify = $_POST['notify'];
        
        $currentuserid = getCookie("userid");
	if(getCookie("managerlogin") != "YES")
	{
		showAlert("You do not have access to perform this action");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($reason) < 1) $msg .= "**Enter the reason change of status";
	
	if($msg != "")
	{
            showAlert("Please correct the following before saving:**$msg");
            return;
	}
	

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //get the dealer details
        $dealerdetails = $dataread->dealers_get($mycon,$dealer_id);
        if(!$dealerdetails || $dealerdetails['manager_id'] != $currentuserid)
        {
		showAlert("The details of this dealer could not be loaded. Please refresh this page and try again");
		return;
        }
        
        //check if status was changed
        if($status == $dealerdetails['status'])
        {
		showAlert("The dealer status was not changed.");
		return;            
        }
        
        $done = $datawrite->dealers_update_status($mycon, $dealer_id, $status, $reason, $currentuserid);
        
        if(!$done)
        {
            showAlert("There was an error updating this dealer. Please try again.");
            return;
        }
        else
        {
            //check if to notify the account owner
            if($notify == "yes")
            {
                $message = "Your TStv dealership status is now: '".getDealerStatusName($status)."' because: $reason";
                sendSMS($dealerdetails['phone'],$message);
            }

            $datawrite->admin_activities($mycon,$currentuserid,"Updated dealer status for #$dealer_id from ".$dealerdetails['status']." to ".$status);
            openPage("manager_dealers-view.php?code=$dealer_id");
        }
    }
   
    function manager_dealers_sendmessage()
    {
	$dealer_id = $_POST['dealer_id'];
	$type = $_POST['message_type'];
	$subject = $_POST['subject'];
	$message = $_POST['message_email'];
	$message_sms = $_POST['message_sms'];
        if($type == "sms") $message = $message_sms;
        
        $currentuserid = getCookie("userid");
	if(getCookie("managerlogin") != "YES")
	{
		showAlert("You do not have access to perform this action");
		return;
	}
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($message) < 2) $msg .= "**Enter the message to send";
	if($type == "email" && strlen($subject) < 2) $msg .= "**Enter the email subject";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	
        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //get the account details
        $dealerdetails = $dataread->dealers_get($mycon,$dealer_id);
        if(!$dealerdetails || $dealerdetails['manager_id'] != $currentuserid)
        {
		showAlert("The details of this dealer could not be loaded. Please refresh this page and try again");
		return;
        }
        
        //send email
        if($type == "email")
        {
            sendEmail($dealerdetails['email'], $subject, $message);
            showAlert("Email sent!");
            return;
        }
        
        //send sms
        if($type == "sms")
        {
            sendSMS($dealerdetails['phone'], $message);
            showAlert("SMS sent!");
            return;
        }
            
    }
    
    function manager_dealers_messageall()
    {
	$type = $_POST['message_type'];
	$subject = $_POST['subject'];
	$message = $_POST['message_email'];
	$message_sms = $_POST['message_sms'];
        if($type == "sms") $message = $message_sms;
        
        $currentuserid = getCookie("userid");
	if(getCookie("managerlogin") <> "YES")
	{
		showAlert("You do not have enough permission to perform this action.");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if($type == "email" && strlen($subject) < 2) $msg .= "**Enter the email subject";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	
        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
                
        //get users
        $count = 0;
        $userslist = $dataread->dealers_listbymanager($mycon,$currentuserid,"","");
        foreach($userslist as $user)
        {            
            try
            {
                //send email
                if($type == "email")
                {
                    sendEmail($user['email'], $subject, $message);
                }

                //send sms
                if($type == "sms")
                {
                    sendSMS($user['phone'], $message);
                }
                
                $count ++;
                
            } catch (Exception $ex) {

            }
        }
        
        showAlert("Message Sent to $count users.");
        return;
            
    }
            

    function dealer_retailers_add()
    {
	$company = $_POST['company'];
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = "Nigeria";//$_POST['country'];
	$notes = $_POST['notes'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

        $currentuserid = getCookie("userid");
	if(getCookie("dealerlogin") != "YES")
	{
		showAlert("You do not have access to perform this action");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($company) < 1) $msg .= "**Enter the company name.";
	if(strlen($surname) < 1) $msg .= "**Enter the conact surname.";
	if(strlen($firstname) < 1) $msg .= "**Enter the contact firstname.";
	if(!is_numeric($phone) || strlen($phone) < 10) $msg .= "**Please enter a valid phone number.";
	if(count(explode("@",$email)) < 2) $msg .= "**Please provide a valid email address.";
	if(strlen($city) < 1) $msg .= "**Enter the state.";
	if(strlen($state) < 1) $msg .= "**Enter the state.";
	if(strlen($username) < 1) $msg .= "**Enter the login username.";
	if(strlen($password) < 1) $msg .= "**Enter the login password.";
	if(strlen($password) > 0 && $password != $password2) $msg .= "**Password confirmation does not match.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        //generate username and password
        $password = generatePassword($password);

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //check if the username is in use
        if(strtolower($username) == "administrator" || $dataread->dealers_getbyusername($mycon, $username) !== false || $dataread->managers_getbyusername($mycon, $username) !== false || $dataread->retailers_getbyusername($mycon, $username) !== false)
        {
            showAlert("The specified username is already in use.");
            return;            
        }
        
        //get the super dealer details
        $dealerdetails = $dataread->dealers_get($mycon, $currentuserid);
        if(!$dealerdetails)
        {
		showAlert("Your account details could not be loaded. Please refresh this page and try again.");
		return;            
        }
        
        //checj if dealer is a super
        if($dealerdetails['status'] != 5)
        {
            showAlert("Your account is not active. Please contact the administrator.");
            return;            
        }
                
        $retailer_id = $datawrite->retailers_add($mycon, $dealerdetails['manager_id'], $dealerdetails['dealer_id'], $company, $surname, $firstname, $email, $phone, $address, $city, $state, $country, $username, $password, $thedate);

        if(!$retailer_id)
        {
            showAlert("There was an error saving this retailer details. Please try again.");
            return;
        }
        else
        {            
            $datawrite->admin_activities($mycon,$currentuserid,"Created new retailer #$retailer_id ($company)");
                        
            openPage("dealer_retailers-list.php");
        }
    }

    function dealer_retailers_update()
    {
	$retailer_id = $_POST['retailer_id'];
	$company = $_POST['company'];
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = "Nigeria";//$_POST['country'];
	$notes = $_POST['notes'];
	$password = $_POST['password'];

        $currentuserid = getCookie("userid");
	if(getCookie("dealerlogin") != "YES")
	{
		showAlert("You do not have access to perform this action");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($company) < 1) $msg .= "**Enter the company name.";
	if(strlen($surname) < 1) $msg .= "**Enter the conact surname.";
	if(strlen($firstname) < 1) $msg .= "**Enter the contact firstname.";
	if(!is_numeric($phone) || strlen($phone) < 10) $msg .= "**Please enter a valid phone number.";
	if(count(explode("@",$email)) < 2) $msg .= "**Please provide a valid email address.";
	if(strlen($city) < 1) $msg .= "**Enter the state.";
	if(strlen($state) < 1) $msg .= "**Enter the state.";
	//if(strlen($country) < 1) $msg .= "**Enter the country.";
	//if(strlen($username) < 1) $msg .= "**Enter the login username.";
	//if(strlen($password) < 1) $msg .= "**Enter the login password.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //check if service no exits
        $retailerdetails = $dataread->retailers_get($mycon, $retailer_id);
        if(!$retailerdetails || $retailerdetails['dealer_id'] != $currentuserid)
        {
		showAlert("The retailer details could not be loaded.");
		return;            
        }
        
        //check if chanfing password
        $password = (strlen($password) > 0) ? generatePassword($password) : $retailerdetails['password'];
                
        $done = $datawrite->retailers_update($mycon, $retailer_id, $company, $surname, $firstname, $email, $phone, $address, $city, $state, $country, $password);

        if(!$done)
        {
            showAlert("There was an error updating this retailer details. Please try again.");
            return;
        }
        else
        {            
            $datawrite->admin_activities($mycon,$currentuserid,"Updated retailer #$retailer_id ($company)");
                        
            openPage("dealer_retailers-view.php?code=$retailer_id");
        }
    }

    function dealer_retailers_sendmessage()
    {
	$retailer_id = $_POST['retailer_id'];
	$type = $_POST['message_type'];
	$subject = $_POST['subject'];
	$message = $_POST['message_email'];
	$message_sms = $_POST['message_sms'];
        if($type == "sms") $message = $message_sms;
        
        $currentuserid = getCookie("userid");
	if(getCookie("dealerlogin") != "YES")
	{
            showAlert("You do not have access to perform this action");
            return;
	}
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($message) < 2) $msg .= "**Enter the message to send";
	if($type == "email" && strlen($subject) < 2) $msg .= "**Enter the email subject";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	
        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //get the account details
        $retailerdetails = $dataread->retailers_get($mycon,$retailer_id);
        if(!$retailerdetails || $retailerdetails['dealer_id'] != $currentuserid)
        {
            showAlert("The details of this retailer could not be loaded. Please refresh this page and try again");
            return;
        }
        
        //send email
        if($type == "email")
        {
            sendEmail($retailerdetails['email'], $subject, $message);
            showAlert("Email sent!");
            return;
        }
        
        //send sms
        if($type == "sms")
        {
            sendSMS($retailerdetails['phone'], $message);
            showAlert("SMS sent!");
            return;
        }
            
    }

    function dealer_retailers_update_status()
    {
	$retailer_id = $_POST['retailer_id'];
	$status = $_POST['status'];
	$reason = $_POST['reason'];
        $notify = "no";
	if(isset($_POST['notify'])) $notify = $_POST['notify'];
        
        $currentuserid = getCookie("userid");
	if(getCookie("dealerlogin") != "YES")
	{
		showAlert("You do not have access to perform this action");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($reason) < 1) $msg .= "**Enter the reason change of status";
	
	if($msg != "")
	{
            showAlert("Please correct the following before saving:**$msg");
            return;
	}
	

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //get the dealer details
        $retailerdetails = $dataread->retailers_get($mycon,$retailer_id);
        if(!$retailerdetails || $retailerdetails['dealer_id'] != $currentuserid)
        {
		showAlert("The details of this retailer could not be loaded. Please refresh this page and try again");
		return;
        }
        
        //check if status was changed
        if($status == $retailerdetails['status'])
        {
		showAlert("The retailer status was not changed.");
		return;            
        }
        
        $done = $datawrite->retailers_update_status($mycon, $retailer_id, $status, $reason, $currentuserid);
        
        if(!$done)
        {
            showAlert("There was an error updating this retailer. Please try again.");
            return;
        }
        else
        {
            //check if to notify the account owner
            if($notify == "yes")
            {
                $message = "Your TStv retailer status is now: '".getDealerStatusName($status)."' because: $reason";
                sendSMS($dealerdetails['phone'],$message);
            }

            $datawrite->admin_activities($mycon,$currentuserid,"Updated retailer status for #$retailer_id from ".$dealerdetails['status']." to ".$status);
            openPage("dealer_retailers-view.php?code=$retailer_id");
        }
    }
       
    function dealer_agreement_send()
    {
	$attachement = $_FILES['attachement'];

        $currentuserid = getCookie("userid");
	if(getCookie("dealerlogin") != "YES")
	{
		showAlert("You do not have access to perform this action");
		return;
	}
        
        $thedate = date("Y-m-d");
	
        if(strpos(strtoupper($attachement['type']),"PDF") === false)
	{
		showAlert("Please attach signed agreement in PDF format");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //get the super dealer details
        $dealerdetails = $dataread->dealers_get($mycon, $currentuserid);
        if(!$dealerdetails)
        {
		showAlert("Your account details could not be loaded. Please refresh this page and try again.");
		return;            
        }
        
        //checj if dealer is a super
        if($dealerdetails['status'] != 5)
        {
            showAlert("Your account is not active. Please contact the administrator.");
            return;            
        }
        
        //check if signed agreement exists
        if(!file_exists("agreements/agreement_{$dealerdetails['dealer_id']}.pdf"))
        {
            showAlert("You are not required to submit signed agreement at this time, please contact the marketting department.");
            return;            
        }
        if(file_exists("agreements/agreement_{$dealerdetails['dealer_id']}_signed.pdf"))
        {
            showAlert("You have previously submitted a signed agreement. If you need to make changes, please contact the marketting department.");
            return;            
        }
                
        $done = $datawrite->dealers_update_agreement($mycon, $dealerdetails['dealer_id'], 5);

        if(!$done)
        {
            showAlert("There was an error submitting your agreement. Please try again.");
            return;
        }
        
        $done = move_uploaded_file($attachement['tmp_name'],"agreements/agreement_{$dealerdetails['dealer_id']}_signed.pdf");
        if(!$done)
        {
            showAlert("There was an error submitting your agreement. Please try again.");
            return;
        }

        showAlert("Thank you, your agreement has been submitted.");

        openPage("dealer_dashboard.php");
    }


/////////////////////
    function sub_dealers_add()
    {
	$company = $_POST['company'];
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$notes = $_POST['notes'];
	$username = $_POST['username'];
	$password = $_POST['password'];

        $currentuserid = getCookie("userid");
	if(getCookie("dealertype") != "5")
	{
		showAlert("You do not have access to perform this action");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($company) < 1) $msg .= "**Enter the company name.";
	if(strlen($surname) < 1) $msg .= "**Enter the conact surname.";
	if(strlen($firstname) < 1) $msg .= "**Enter the contact firstname.";
	if(!is_numeric($phone) || strlen($phone) < 10) $msg .= "**Please enter a valid phone number.";
	if(count(explode("@",$email)) < 2) $msg .= "**Please provide a valid email address.";
	if(strlen($city) < 1) $msg .= "**Enter the state.";
	if(strlen($state) < 1) $msg .= "**Enter the state.";
	if(strlen($country) < 1) $msg .= "**Enter the country.";
	if(strlen($username) < 1) $msg .= "**Enter the login username.";
	if(strlen($password) < 1) $msg .= "**Enter the login password.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        //generate username and password
        $password = generatePassword($password);

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //check if service no exits
        $dealerdetails = $dataread->dealers_getbyusername($mycon, $username);
        if($dealerdetails != false)
        {
		showAlert("There is an account with the specified username.");
		return;            
        }
        
        //get the super dealer details
        $superdealer = $dataread->dealers_get($mycon, $currentuserid);
        if(!$superdealer)
        {
		showAlert("Your account details could not be loaded. Please refresh this page and try again.");
		return;            
        }
        
        //checj if dealer is a super
        if($superdealer['dealer_type'] != 5)
        {
		showAlert("You can not create a retailer as you do not have a sub dealer right.");
		return;            
        }
                
        $dealer_id = $datawrite->dealers_add($mycon, "10", $superdealer['super_id'], $superdealer['dealer_id'], $company, $surname, $firstname, $email, $phone, $address, $city, $state, $country, $username, $password, $thedate);

        if(!$dealer_id)
        {
            showAlert("There was an error saving this retailer details. Please try again.");
            return;
        }
        else
        {            
            $datawrite->admin_activities($mycon,$currentuserid,"Created new retailer #$dealer_id ($company)");
                        
            openPage("sub_dealers-list.php");
        }
    }

    function sub_dealers_update()
    {
	$dealer_id = $_POST['dealer_id'];
	$company = $_POST['company'];
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$notes = $_POST['notes'];
	$password = $_POST['password'];

        $currentuserid = getCookie("userid");
	if(getCookie("dealertype") != "5")
	{
		showAlert("You do not have access to perform this action");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($company) < 1) $msg .= "**Enter the company name.";
	if(strlen($surname) < 1) $msg .= "**Enter the conact surname.";
	if(strlen($firstname) < 1) $msg .= "**Enter the contact firstname.";
	if(!is_numeric($phone) || strlen($phone) < 10) $msg .= "**Please enter a valid phone number.";
	if(count(explode("@",$email)) < 2) $msg .= "**Please provide a valid email address.";
	if(strlen($city) < 1) $msg .= "**Enter the state.";
	if(strlen($state) < 1) $msg .= "**Enter the state.";
	if(strlen($country) < 1) $msg .= "**Enter the country.";
	//if(strlen($username) < 1) $msg .= "**Enter the login username.";
	//if(strlen($password) < 1) $msg .= "**Enter the login password.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //check if service no exits
        $dealerdetails = $dataread->dealers_get($mycon, $dealer_id);
        if(!$dealerdetails || $dealerdetails['sub_id'] != $currentuserid)
        {
		showAlert("The dealer details could not be loaded.");
		return;            
        }
        
        //check if chanfing password
        $password = (strlen($password) > 0) ? generatePassword($password) : $dealerdetails['password'];
                
        $done = $datawrite->dealers_update($mycon, $dealer_id, $company, $surname, $firstname, $email, $phone, $address, $city, $state, $country, $password);

        if(!$done)
        {
            showAlert("There was an error updating this dealer details. Please try again.");
            return;
        }
        else
        {            
            $datawrite->admin_activities($mycon,$currentuserid,"Updated retailer #$dealer_id ($company)");
                        
            openPage("sub_dealers-view.php?code=$dealer_id");
        }
    }


    function admins_add()
    {
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$othernames = $_POST['othernames'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$group_id = "";//$_POST['group_id'];
        
        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("Your account details could not be validated. Please refresh this page and try again.");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($surname) < 1) $msg .= "**Enter the surname.";
	if(strlen($firstname) < 1) $msg .= "**Enter the firstname.";
	if(strlen($username) < 1) $msg .= "**Enter the login username.";
	if(strlen($password) < 1) $msg .= "**Enter the login password.";
	if(strlen($password) > 1 && $password != $password2) $msg .= "**Login Password confirmation does not match.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	

        $password = generatePassword($password);

        $mycon = databaseConnect();
        $dataread = New DataRead();
        if($dataread->admins_getbyusername($mycon, $username) != false)
	{
		showAlert("The specified username already exists. Please use a different username.");
		return;
	}
        
        $datawrite = New DataWrite();
        $admin_id = $datawrite->admins_add($mycon, $surname, $firstname, $othernames, $email, $phone, $group_id, $username, $password, $currentuserid, $thedate);
        
        if(!$admin_id)
        {
            showAlert("There was an error saving this admin. Please try again.");
            return;
        }
        else
        {

            $datawrite->admin_activities($mycon,$currentuserid,"Created new admin #$admin_id ($surname $firstname)");
            openPage("admins-list.php");
        }
    }


    function admins_update()
    {
	$admin_id = $_POST['admin_id'];
        $surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$othernames = $_POST['othernames'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$status = $_POST['status'];
	$group_id = "";//$_POST['group_id'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
        
        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("Your account details could not be validated. Please refresh this page and try again.");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($surname) < 1) $msg .= "**Enter the surname.";
	if(strlen($firstname) < 1) $msg .= "**Enter the firstname.";
	if(strlen($password) > 0 && $password2 != $password) $msg .= "**The password confirmation does not match.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();        
        $dataread = New DataRead();        
        $datawrite = New DataWrite();
	
        $admindetails = $dataread->admins_get($mycon, $admin_id);
        if(!$admindetails)
        {
            showAlert("The details of this user could not be loaded. Please refresh this page and try again.");
            return;
        }
        
        if(strlen($password) > 0)
        {
            $password = generatePassword($password);
        }
        else
        {
            $password = $admindetails['password'];
        }
        
        $done = $datawrite->admins_update($mycon, $admin_id, $surname, $firstname, $othernames, $email, $phone, $group_id, $password, $status, $currentuserid);
        
        if(!$done)
        {
            showAlert("There was an error saving this admin. Please try again.");
            return;
        }
        else
        {
            showAlert("The details has been updated.");
            $datawrite->admin_activities($mycon,$currentuserid,"Updated admin details #$admin_id ($surname $firstname)");
            openPage("admins-list.php");
        }
    }

    //Process new user usroup form
    function admins_groups_add()
    {
            $mycon = databaseConnect();
            $name = $_POST['name'];
            $description = $_POST['description'];
            $thedate = date("Y-m-d H:i:s");

        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("Your account details could not be validated. Please refresh this page and try again.");
		return;
	}

            //check if the fields where filled
            $msg = "";
            if(strlen($name) < 3) $msg .= "**Enter the name for  this group.";

            if($msg != "")
            {
                    showAlert("Please correct the following before saving:**$msg");
                    return;
            }

            $mycon = databaseConnect();
            $dataread = New DataRead();
            if($dataread->admins_groups_getbyname($mycon, $name) != false)
            {
                    showAlert("There is an existing usergroup with the name provided.");
                    return;
            }

            //getthe list of selected rights
            $selected = "";
            if(isset($_POST['chk']) && is_array($_POST['chk']))
            {
                    $rights = $_POST['chk'];
                    foreach($rights as $right)
                    {
                            $selected .= "| ".$right;
                    }
            }

            $datawrite = New DataWrite();
            $group_id = $datawrite->admins_groups_add($mycon, $name, $selected, $description, $currentuserid);

            if(!$group_id)
            {
                showAlert("There was an error saving this group. Please try again.");
                return;
            }
            else
            {

                $datawrite->admin_activities($mycon,$currentuserid,"Created new admin group #$group_id ($name)");
                openPage("admins-groups-list.php");
            }

    }
    //End pro_users_groups_add()//////////////////
    
    function admins_groups_update()
    {
            $mycon = databaseConnect();
            $group_id = $_POST['group_id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $thedate = date("Y-m-d H:i:s");

        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("Your account details could not be validated. Please refresh this page and try again.");
		return;
	}

            //check if the fields where filled
            $msg = "";
            if(strlen($name) < 3) $msg .= "**Enter the name for  this group.";

            if($msg != "")
            {
                    showAlert("Please correct the following before saving:**$msg");
                    return;
            }

            $mycon = databaseConnect();
            $dataread = New DataRead();
            $found = $dataread->admins_groups_getbyname($mycon, $name);
            if($found != false && $found['group_id'] != $group_id)
            {
                    showAlert("There is an existing usergroup with the name provided.");
                    return;
            }

            //getthe list of selected rights
            $selected = "";
            if(isset($_POST['chk']) && is_array($_POST['chk']))
            {
                    $rights = $_POST['chk'];
                    foreach($rights as $right)
                    {
                            $selected .= "| ".$right;
                    }
            }

            $datawrite = New DataWrite();
            $group_id = $datawrite->admins_groups_update($mycon, $group_id, $name, $selected, $description, $currentuserid);

            if(!$group_id)
            {
                showAlert("There was an error saving this group. Please try again.");
                return;
            }
            else
            {
                showAlert("Admin group has been updated.");
                $datawrite->admin_activities($mycon,$currentuserid,"Updated admin group #$group_id ($name)");
                openPage("admins-groups-list.php");
            }

    }
    //End pro_users_groups_add()//////////////////
    
    

    function settings_pricing_add()
    {

        $code = $_POST['code'];
        $name = $_POST['name'];
        $amount = $_POST['amount'];
        $thedate = date("Y-m-d");
	

        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("Your account details could not be validated. Please refresh this page and try again.");
		return;
	}

        //check if a page name was specified
        if(strlen($name) < 1 )
        {
            showAlert("Please enter the name before saving.");
            return;

        }

        $mycon = databaseConnect();
        $dataRead = New DataRead();
        if($dataRead->settings_pricing_getbycode($mycon,$code) != false)
        {
            showAlert("This pricing has already been created.");
            return;
        }
        
        $datawrite = New DataWrite();
        $price_id = $datawrite->settings_pricing_add($mycon, $code, $name, $amount);
        
        if(!$price_id)
        {
            $mycon->rollBack();
            showAlert("There was an error adding this pricing. Please try again.");
            return;
        }
        
        $datawrite->admin_activities($mycon,$currentuserid,"Created a new pricing $price_id ($name)");
        showAlert("The pricing has been added!");
        openPage("settings-pricing.php");
    }


    function settings_pricing_update()
    {

        $pricing_id = $_POST['pricing_id'];
        $name = $_POST['name'];
        $amount = $_POST['amount'];
        $thedate = date("Y-m-d");
	

        $currentuserid = getCookie("userid");
	if(getCookie("adminlogin") != "YES")
	{
		showAlert("Your account details could not be validated. Please refresh this page and try again.");
		return;
	}

        //check if a page name was specified
        if(strlen($name) < 1 )
        {
            showAlert("Please enter the name before saving.");
            return;

        }
        
        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $done = $datawrite->settings_pricing_update($mycon, $pricing_id, $name, $amount);
        
        if(!$done)
        {
            $mycon->rollBack();
            showAlert("There was an error updating this pricing. Please try again.");
            return;
        }
        
        $datawrite->admin_activities($mycon,$currentuserid,"Updated pricing $pricing_id ($name)");
        showAlert("The pricing has been updated!");
        openPage("settings-pricing.php");
    }


    function profile_update()
    {
	$admin_id = $_POST['admin_id'];
        $surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$othernames = $_POST['othernames'];
	$phone = $_POST['phone'];
        
        
        $currentuserid = getCookie("userid");
	if(getCookie("userlogin") != "YES")
	{
		showAlert("Your login session could not be validated. Please refresh this page or login again.");
		return;
	}
        if($admin_id != $currentuserid)
	{
		showAlert("Your account could not be validated. Please refresh this page and try again.");
		return;
	}
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($surname) < 1) $msg .= "**Enter the surname.";
	if(strlen($firstname) < 1) $msg .= "**Enter the firstname.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	

        $mycon = databaseConnect();        
        $datawrite = New DataWrite();
        $done = $datawrite->profile_update($mycon, $admin_id, $surname, $firstname, $othernames, $phone);
        
        if(!$done)
        {
            showAlert("There was an error saving your profile. Please try again.");
            return;
        }
        else
        {
            showAlert("Your profile has been updated.");
            $datawrite->admin_activities($mycon,$currentuserid,"Updated profile details #$admin_id ($surname $firstname)");
            openPage("profile-view.php");
        }
    }


    function profile_update_password()
    {
	$admin_id = $_POST['admin_id'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
        
        $currentuserid = getCookie("userid");
	if(getCookie("userlogin") != "YES")
	{
		showAlert("Your login session could not be validated. Please refresh this page or login again.");
		return;
	}
        if($admin_id != $currentuserid)
	{
		showAlert("Your account could not be validated. Please refresh this page and try again.");
		return;
	}
        
        $thedate = date("Y-m-d");
        
        if(strlen($password) == 0) return false;

	//check if the fields where filled
	$msg = "";
	if(strlen($password) > 0 && $password != $password2) $msg .= "**Your password confirmation does not match.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	
        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataRead = New DataRead();
        
        $admindetails = $dataRead->admins_get($mycon, $admin_id);
        if(!$admindetails)
        {
		showAlert("Your account details could not be loaded. Please refresh this page and try again.");
		return;            
        }
        
        $newpassword = $admindetails['password'];
        if(strlen($password) > 0) $newpassword = generatePassword ($password);
        
        $done = $datawrite->profile_update_password($mycon, $admin_id, $newpassword);
        
        if(!$done)
        {
            showAlert("There was an error updating your login information. Please try again.");
            return;
        }
        else
        {

            $datawrite->admin_activities($mycon,$currentuserid,"Updated Login information");
            showAlert("Your login account information has been updated.");
            openPage("profile-view.php");
        }
    }

    
    
    
}///// end class




?>