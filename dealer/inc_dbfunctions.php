<?php
	require_once("config.php");


class DataWrite
{
    //Process last login
    function lastLogin($mycon, $admin_id)
    {
        return true;

        $thedate = date("Y-m-d H:i:s");

        $sql = "UPDATE `admins` SET `lastlogin` = :thedate WHERE `admin_id` = :admin_id";
        $myrec =  $mycon->prepare($sql);
        $myrec->bindValue(":thedate",$thedate);
        $myrec->bindValue(":admin_id",$admin_id);
        $myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
    }

    function registrations_add($mycon, $type, $surname, $firstname, $othernames, $company, $phone, $address, $email, $owner1, $owner2, $owner3, $owner4, $business_type, $business_duration, $business_staff, $quantity, $amount, $localmarket, $office, $city, $state, $country, $experience, $marketting, $installers, $notes, $username, $password, $thedate)
    {

	$sql = "INSERT INTO `registrations` SET `company` = :company
			,`type` = :type
			,`surname` = :surname
			,`firstname` = :firstname
			,`othernames` = :othernames
			,`address` = :address
			,`phone` = :phone
			,`email` = :email
			,`owner1` = :owner1
			,`owner2` = :owner2
			,`owner3` = :owner3
			,`owner4` = :owner4
			,`business_type` = :business_type
			,`business_duration` = :business_duration
			,`business_staff` = :business_staff
			,`quantity` = :quantity
			,`amount` = :amount
			,`localmarket` = :localmarket
			,`office` = :office
			,`city` = :city
			,`state` = :state
			,`country` = :country
			,`experience` = :experience
			,`marketting` = :marketting
			,`installers` = :installers
			,`notes` = :notes
			,`username` = :username
			,`password` = :password
			,`thedate` = :thedate";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":type",$type);
	$myrec->bindValue(":company",$company);
	$myrec->bindValue(":surname",$surname);
	$myrec->bindValue(":firstname",$firstname);
	$myrec->bindValue(":othernames",$othernames);
	$myrec->bindValue(":email",$email);
	$myrec->bindValue(":phone",$phone);
	$myrec->bindValue(":address",$address);
	$myrec->bindValue(":owner1",$owner1);
	$myrec->bindValue(":owner2",$owner2);
	$myrec->bindValue(":owner3",$owner3);
	$myrec->bindValue(":owner4",$owner4);
	$myrec->bindValue(":business_type",$business_type);
	$myrec->bindValue(":business_duration",$business_duration);
	$myrec->bindValue(":business_staff",$business_staff);
	$myrec->bindValue(":quantity",$quantity);
	$myrec->bindValue(":amount",$amount);
	$myrec->bindValue(":localmarket",$localmarket);
	$myrec->bindValue(":office",$office);
	$myrec->bindValue(":city",$city);
	$myrec->bindValue(":state",$state);
	$myrec->bindValue(":country",$country);
	$myrec->bindValue(":experience",$experience);
	$myrec->bindValue(":marketting",$marketting);
	$myrec->bindValue(":installers",$installers);
	$myrec->bindValue(":notes",$notes);
	$myrec->bindValue(":username",$username);
	$myrec->bindValue(":password",$password);
	$myrec->bindValue(":thedate",$thedate);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
        
    }
    

    function registrations_update($mycon, $registration_id, $type, $surname, $firstname, $othernames, $company, $phone, $address, $email, $owner1, $owner2, $owner3, $owner4, $business_type, $business_duration, $business_staff, $quantity, $amount, $localmarket, $office, $city, $state, $country, $experience, $marketting, $installers, $notes, $password)
    {

	$sql = "UPDATE `registrations` SET `company` = :company
			,`type` = :type
			,`surname` = :surname
			,`firstname` = :firstname
			,`othernames` = :othernames
			,`address` = :address
			,`phone` = :phone
			,`email` = :email
			,`owner1` = :owner1
			,`owner2` = :owner2
			,`owner3` = :owner3
			,`owner4` = :owner4
			,`business_type` = :business_type
			,`business_duration` = :business_duration
			,`business_staff` = :business_staff
			,`quantity` = :quantity
			,`amount` = :amount
			,`localmarket` = :localmarket
			,`office` = :office
			,`city` = :city
			,`state` = :state
			,`country` = :country
			,`experience` = :experience
			,`marketting` = :marketting
			,`installers` = :installers
			,`notes` = :notes
			,`password` = :password WHERE `registration_id` = :registration_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":registration_id",$registration_id);
	$myrec->bindValue(":type",$type);
	$myrec->bindValue(":company",$company);
	$myrec->bindValue(":surname",$surname);
	$myrec->bindValue(":firstname",$firstname);
	$myrec->bindValue(":othernames",$othernames);
	$myrec->bindValue(":email",$email);
	$myrec->bindValue(":phone",$phone);
	$myrec->bindValue(":address",$address);
	$myrec->bindValue(":owner1",$owner1);
	$myrec->bindValue(":owner2",$owner2);
	$myrec->bindValue(":owner3",$owner3);
	$myrec->bindValue(":owner4",$owner4);
	$myrec->bindValue(":business_type",$business_type);
	$myrec->bindValue(":business_duration",$business_duration);
	$myrec->bindValue(":business_staff",$business_staff);
	$myrec->bindValue(":quantity",$quantity);
	$myrec->bindValue(":amount",$amount);
	$myrec->bindValue(":localmarket",$localmarket);
	$myrec->bindValue(":office",$office);
	$myrec->bindValue(":city",$city);
	$myrec->bindValue(":state",$state);
	$myrec->bindValue(":country",$country);
	$myrec->bindValue(":experience",$experience);
	$myrec->bindValue(":marketting",$marketting);
	$myrec->bindValue(":installers",$installers);
	$myrec->bindValue(":notes",$notes);
	$myrec->bindValue(":password",$password);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }
    
    function registrations_approve($mycon, $registration_id)
    {
        $thedate = date("Y-m-d H:i:s");
        
        $dataRead = New DataRead();
        $registrationdetails = $dataRead->registrations_get($mycon, $registration_id);
        if(!$registrationdetails) return 1;
        if($registrationdetails['status'] != 0) return 2;
        
        //$retailer_id = $this->retailers_add($mycon, $dealerdetails['manager_id'], $dealerdetails['dealer_id'], $registrationdetails['company'], $registrationdetails['surname'], $registrationdetails['firstname'], $registrationdetails['email'], $registrationdetails['phone'], $registrationdetails['address'], $registrationdetails['city'], $registrationdetails['state'], $registrationdetails['country'], $registrationdetails['username'], $registrationdetails['password'], $registrationdetails['thedate']);
        $retailer_id = $this->dealers_add($mycon, $registrationdetails['type'], $registrationdetails['surname'], $registrationdetails['firstname'], $registrationdetails['othernames'], $registrationdetails['company'], $registrationdetails['phone'], $registrationdetails['address'], $registrationdetails['email'], $registrationdetails['owner1'], $registrationdetails['owner2'], $registrationdetails['owner3'], $registrationdetails['owner4'], $registrationdetails['business_type'], $registrationdetails['business_duration'], $registrationdetails['business_staff'], $registrationdetails['quantity'], $registrationdetails['amount'], $registrationdetails['localmarket'], $registrationdetails['office'], $registrationdetails['city'], $registrationdetails['state'], $registrationdetails['country'], $registrationdetails['experience'], $registrationdetails['marketting'], $registrationdetails['installers'], $registrationdetails['notes'], $registrationdetails['username'], $registrationdetails['password'], $registrationdetails['thedate']);
        
        if(!$retailer_id) return 3;
        
        $this->registrations_approve_update($mycon,$registration_id);
        
        return $retailer_id;
    }
        
    function registrations_approve_update($mycon, $registration_id)
    {
        $thedate = date("Y-m-d H:i:s");
        
	$sql = "UPDATE `registrations` SET `status` = 5 WHERE `registration_id` = :registration_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":registration_id",$registration_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }    
        
    function registrations_delete($mycon, $registration_id)
    {
        $thedate = date("Y-m-d H:i:s");
        
	$sql = "DELETE FROM `registrations` WHERE `registration_id` = :registration_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":registration_id",$registration_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }    
    
    function managers_add($mycon, $name, $surname, $firstname, $othernames, $email, $phone, $username, $password, $notes)
    {
        $thedate = date("Y-m-d H:i:s");
        
	$sql = "INSERT INTO `managers` SET `name` = :name
			,`surname` = :surname
			,`firstname` = :firstname
			,`othernames` = :othernames
			,`email` = :email
			,`phone` = :phone
			,`username` = :username
			,`password` = :password
			,`notes` = :notes
			,`thedate` = :thedate";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":surname",$surname);
	$myrec->bindValue(":firstname",$firstname);
	$myrec->bindValue(":othernames",$othernames);
	$myrec->bindValue(":email",$email);
	$myrec->bindValue(":phone",$phone);
	$myrec->bindValue(":username",$username);
	$myrec->bindValue(":password",$password);
	$myrec->bindValue(":notes",$notes);
	$myrec->bindValue(":thedate",$thedate);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
        
    }
        

    function managers_update($mycon, $manager_id, $name, $surname, $firstname, $othernames, $email, $phone, $password, $notes)
    {

	$sql = "UPDATE `managers` SET `name` = :name
			,`surname` = :surname
			,`firstname` = :firstname
			,`othernames` = :othernames
			,`email` = :email
			,`phone` = :phone
			,`notes` = :notes
			,`password` = :password WHERE `manager_id` = :manager_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":manager_id",$manager_id);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":surname",$surname);
	$myrec->bindValue(":firstname",$firstname);
	$myrec->bindValue(":othernames",$othernames);
	$myrec->bindValue(":email",$email);
	$myrec->bindValue(":phone",$phone);
	$myrec->bindValue(":notes",$notes);
	$myrec->bindValue(":password",$password);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }
        

    function managers_update_status($mycon, $manager_id, $status, $reason, $admin_id)
    {
        $thedate = date("Y-m-d H:i:s");
        
	$sql = "UPDATE `managers` SET `status` = :status WHERE `manager_id` = :manager_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":manager_id",$manager_id);
	$myrec->bindValue(":status",$status);

        if(!$myrec->execute())
        {
                return false;
        }
        
	$sql = "INSERT INTO `managers_status` SET `manager_id` = :manager_id
                        ,`status` = :status
			,`reason` = :reason
			,`thedate` = :thedate
			,`modifiedby_type` = 0
			,`modifiedby_id` = :admin_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":manager_id",$manager_id);
	$myrec->bindValue(":status",$status);
	$myrec->bindValue(":reason",$reason);
	$myrec->bindValue(":thedate",$thedate);
	$myrec->bindValue(":admin_id",$admin_id);
        $myrec->execute();
        
        return true;
    }
        
    function managers_delete($mycon, $manager_id, $transfer)
    {
        $thedate = date("Y-m-d H:i:s");
        
        $sql = "
            UPDATE `dealers` d
            LEFT JOIN `retailers` r ON r.manager_id = d.manager_id
            LEFT JOIN `sales` s ON s.manager_id = d.manager_id
            SET d.manager_id = :transfer1,
                r.manager_id = :transfer2,
                s.manager_id = :transfer3
            WHERE d.manager_id = :manager_id";
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":manager_id",$manager_id);
	$myrec->bindValue(":transfer1",$transfer);
	$myrec->bindValue(":transfer2",$transfer);
	$myrec->bindValue(":transfer3",$transfer);
        if(!$myrec->execute())
        {
            return false;
        }
        
	$sql = "DELETE FROM `managers` WHERE `manager_id` = :manager_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":manager_id",$manager_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }    

    function dealers_add_old($mycon, $manager_id, $company, $surname, $firstname, $email, $phone, $address, $city, $state, $country, $username, $password, $thedate)
    {

	$sql = "INSERT INTO `dealers` SET `manager_id` = :manager_id
			,`company` = :company
			,`surname` = :surname
			,`firstname` = :firstname
			,`email` = :email
			,`phone` = :phone
			,`address` = :address
			,`city` = :city
			,`state` = :state
			,`country` = :country
			,`username` = :username
			,`password` = :password
			,`thedate` = :thedate";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":manager_id",$manager_id);
	$myrec->bindValue(":company",$company);
	$myrec->bindValue(":surname",$surname);
	$myrec->bindValue(":firstname",$firstname);
	$myrec->bindValue(":email",$email);
	$myrec->bindValue(":phone",$phone);
	$myrec->bindValue(":address",$address);
	$myrec->bindValue(":city",$city);
	$myrec->bindValue(":state",$state);
	$myrec->bindValue(":country",$country);
	$myrec->bindValue(":username",$username);
	$myrec->bindValue(":password",$password);
	$myrec->bindValue(":thedate",$thedate);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
        
    }
        

    function dealers_update($mycon, $dealer_id, $type, $surname, $firstname, $othernames, $company, $phone, $address, $email, $owner1, $owner2, $owner3, $owner4, $business_type, $business_duration, $business_staff, $quantity, $amount, $localmarket, $office, $city, $state, $country, $experience, $marketting, $installers, $notes, $password)
    {

	$sql = "UPDATE `dealers` SET `company` = :company
			,`type` = :type
			,`surname` = :surname
			,`firstname` = :firstname
			,`othernames` = :othernames
			,`address` = :address
			,`phone` = :phone
			,`email` = :email
			,`owner1` = :owner1
			,`owner2` = :owner2
			,`owner3` = :owner3
			,`owner4` = :owner4
			,`business_type` = :business_type
			,`business_duration` = :business_duration
			,`business_staff` = :business_staff
			,`quantity` = :quantity
			,`amount` = :amount
			,`localmarket` = :localmarket
			,`office` = :office
			,`city` = :city
			,`state` = :state
			,`country` = :country
			,`experience` = :experience
			,`marketting` = :marketting
			,`installers` = :installers
			,`notes` = :notes
			,`password` = :password WHERE `dealer_id` = :dealer_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":dealer_id",$dealer_id);
	$myrec->bindValue(":type",$type);
	$myrec->bindValue(":company",$company);
	$myrec->bindValue(":surname",$surname);
	$myrec->bindValue(":firstname",$firstname);
	$myrec->bindValue(":othernames",$othernames);
	$myrec->bindValue(":email",$email);
	$myrec->bindValue(":phone",$phone);
	$myrec->bindValue(":address",$address);
	$myrec->bindValue(":owner1",$owner1);
	$myrec->bindValue(":owner2",$owner2);
	$myrec->bindValue(":owner3",$owner3);
	$myrec->bindValue(":owner4",$owner4);
	$myrec->bindValue(":business_type",$business_type);
	$myrec->bindValue(":business_duration",$business_duration);
	$myrec->bindValue(":business_staff",$business_staff);
	$myrec->bindValue(":quantity",$quantity);
	$myrec->bindValue(":amount",$amount);
	$myrec->bindValue(":localmarket",$localmarket);
	$myrec->bindValue(":office",$office);
	$myrec->bindValue(":city",$city);
	$myrec->bindValue(":state",$state);
	$myrec->bindValue(":country",$country);
	$myrec->bindValue(":experience",$experience);
	$myrec->bindValue(":marketting",$marketting);
	$myrec->bindValue(":installers",$installers);
	$myrec->bindValue(":notes",$notes);
	$myrec->bindValue(":password",$password);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }
       

    function dealers_update_status($mycon, $dealer_id, $status, $reason, $admin_id)
    {
        $thedate = date("Y-m-d H:i:s");
        
	$sql = "UPDATE `dealers` SET `status` = :status WHERE `dealer_id` = :dealer_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":dealer_id",$dealer_id);
	$myrec->bindValue(":status",$status);

        if(!$myrec->execute())
        {
                return false;
        }
        
	$sql = "INSERT INTO `dealers_status` SET `dealer_id` = :dealer_id
                        ,`status` = :status
			,`reason` = :reason
			,`thedate` = :thedate
			,`modifiedby_type` = 0
			,`modifiedby_id` = :admin_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":dealer_id",$dealer_id);
	$myrec->bindValue(":status",$status);
	$myrec->bindValue(":reason",$reason);
	$myrec->bindValue(":thedate",$thedate);
	$myrec->bindValue(":admin_id",$admin_id);
        $myrec->execute();
        
        return true;
    }
        
    function dealers_delete($mycon, $dealer_id, $transfer)
    {
        $thedate = date("Y-m-d H:i:s");
        
        $sql = "
            UPDATE `retailers` r
            LEFT JOIN `sales` s ON s.dealer_id = r.dealer_id
            SET r.dealer_id = :transfer1,
                s.dealer_id = :transfer2
            WHERE r.dealer_id = :dealer_id";
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":dealer_id",$dealer_id);
	$myrec->bindValue(":transfer1",$transfer);
	$myrec->bindValue(":transfer2",$transfer);
        if(!$myrec->execute())
        {
            return false;
        }

        $sql = "DELETE FROM `dealers` WHERE `dealer_id` = :dealer_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":dealer_id",$dealer_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }    
    
    function dealers_update_agreement($mycon, $dealer_id, $status)
    {
        $thedate = date("Y-m-d H:i:s");
        
	$sql = "UPDATE `dealers` SET `agreement` = :status WHERE `dealer_id` = :dealer_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":dealer_id",$dealer_id);
	$myrec->bindValue(":status",$status);

        if(!$myrec->execute())
        {
                return false;
        }
                
        return true;
    }
        


    function dealers_add($mycon, $type, $surname, $firstname, $othernames, $company, $phone, $address, $email, $owner1, $owner2, $owner3, $owner4, $business_type, $business_duration, $business_staff, $quantity, $amount, $localmarket, $office, $city, $state, $country, $experience, $marketting, $installers, $notes, $username, $password, $thedate)
    {

	$sql = "INSERT INTO `dealers` SET `company` = :company
			,`type` = :type
			,`surname` = :surname
			,`firstname` = :firstname
			,`othernames` = :othernames
			,`address` = :address
			,`phone` = :phone
			,`email` = :email
			,`owner1` = :owner1
			,`owner2` = :owner2
			,`owner3` = :owner3
			,`owner4` = :owner4
			,`business_type` = :business_type
			,`business_duration` = :business_duration
			,`business_staff` = :business_staff
			,`quantity` = :quantity
			,`amount` = :amount
			,`localmarket` = :localmarket
			,`office` = :office
			,`city` = :city
			,`state` = :state
			,`country` = :country
			,`experience` = :experience
			,`marketting` = :marketting
			,`installers` = :installers
			,`notes` = :notes
			,`username` = :username
			,`password` = :password
			,`thedate` = :thedate";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":type",$type);
	$myrec->bindValue(":company",$company);
	$myrec->bindValue(":surname",$surname);
	$myrec->bindValue(":firstname",$firstname);
	$myrec->bindValue(":othernames",$othernames);
	$myrec->bindValue(":email",$email);
	$myrec->bindValue(":phone",$phone);
	$myrec->bindValue(":address",$address);
	$myrec->bindValue(":owner1",$owner1);
	$myrec->bindValue(":owner2",$owner2);
	$myrec->bindValue(":owner3",$owner3);
	$myrec->bindValue(":owner4",$owner4);
	$myrec->bindValue(":business_type",$business_type);
	$myrec->bindValue(":business_duration",$business_duration);
	$myrec->bindValue(":business_staff",$business_staff);
	$myrec->bindValue(":quantity",$quantity);
	$myrec->bindValue(":amount",$amount);
	$myrec->bindValue(":localmarket",$localmarket);
	$myrec->bindValue(":office",$office);
	$myrec->bindValue(":city",$city);
	$myrec->bindValue(":state",$state);
	$myrec->bindValue(":country",$country);
	$myrec->bindValue(":experience",$experience);
	$myrec->bindValue(":marketting",$marketting);
	$myrec->bindValue(":installers",$installers);
	$myrec->bindValue(":notes",$notes);
	$myrec->bindValue(":username",$username);
	$myrec->bindValue(":password",$password);
	$myrec->bindValue(":thedate",$thedate);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
        
    }
        
    function retailers_add($mycon, $manager_id, $dealer_id, $company, $surname, $firstname, $email, $phone, $address, $city, $state, $country, $username, $password, $thedate)
    {

	$sql = "INSERT INTO `retailers` SET `manager_id` = :manager_id
			,`dealer_id` = :dealer_id
			,`company` = :company
			,`surname` = :surname
			,`firstname` = :firstname
			,`email` = :email
			,`phone` = :phone
			,`address` = :address
			,`city` = :city
			,`state` = :state
			,`country` = :country
			,`username` = :username
			,`password` = :password
			,`thedate` = :thedate";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":manager_id",$manager_id);
	$myrec->bindValue(":dealer_id",$dealer_id);
	$myrec->bindValue(":company",$company);
	$myrec->bindValue(":surname",$surname);
	$myrec->bindValue(":firstname",$firstname);
	$myrec->bindValue(":email",$email);
	$myrec->bindValue(":phone",$phone);
	$myrec->bindValue(":address",$address);
	$myrec->bindValue(":city",$city);
	$myrec->bindValue(":state",$state);
	$myrec->bindValue(":country",$country);
	$myrec->bindValue(":username",$username);
	$myrec->bindValue(":password",$password);
	$myrec->bindValue(":thedate",$thedate);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
        
    }
        

    function retailers_update($mycon, $retailer_id, $company, $surname, $firstname, $email, $phone, $address, $city, $state, $country, $password)
    {

	$sql = "UPDATE `retailers` SET `company` = :company
			,`surname` = :surname
			,`firstname` = :firstname
			,`email` = :email
			,`phone` = :phone
			,`address` = :address
			,`city` = :city
			,`state` = :state
			,`country` = :country
			,`password` = :password WHERE `retailer_id` = :retailer_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":retailer_id",$retailer_id);
	$myrec->bindValue(":company",$company);
	$myrec->bindValue(":surname",$surname);
	$myrec->bindValue(":firstname",$firstname);
	$myrec->bindValue(":email",$email);
	$myrec->bindValue(":phone",$phone);
	$myrec->bindValue(":address",$address);
	$myrec->bindValue(":city",$city);
	$myrec->bindValue(":state",$state);
	$myrec->bindValue(":country",$country);
	$myrec->bindValue(":password",$password);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }
        

    function retailers_update_status($mycon, $retailer_id, $status, $reason, $admin_id)
    {
        $thedate = date("Y-m-d H:i:s");
        
	$sql = "UPDATE `retailers` SET `status` = :status WHERE `retailer_id` = :retailer_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":retailer_id",$retailer_id);
	$myrec->bindValue(":status",$status);

        if(!$myrec->execute())
        {
                return false;
        }
        
	$sql = "INSERT INTO `retailers_status` SET `retailer_id` = :retailer_id
                        ,`status` = :status
			,`reason` = :reason
			,`thedate` = :thedate
			,`modifiedby_type` = 0
			,`modifiedby_id` = :admin_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":retailer_id",$retailer_id);
	$myrec->bindValue(":status",$status);
	$myrec->bindValue(":reason",$reason);
	$myrec->bindValue(":thedate",$thedate);
	$myrec->bindValue(":admin_id",$admin_id);
        $myrec->execute();
        
        return true;
    }
        
    function retailers_delete($mycon, $retailer_id, $transfer)
    {
        $thedate = date("Y-m-d H:i:s");
        
        $sql = "UPDATE `sales` SET retailer_id = :transfer WHERE retailer_id = :retailer_id";
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":retailer_id",$retailer_id);
	$myrec->bindValue(":transfer",$transfer);
        if(!$myrec->execute())
        {
            return false;
        }
        
	$sql = "DELETE FROM `retailers` WHERE `retailer_id` = :retailer_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":retailer_id",$retailer_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }    
        
    
    function settings_pricing_add($mycon, $code, $name, $amount)
    {

	$sql = "INSERT INTO `settings_pricing` SET `code` = :code,`name` = :name, `amount` = :amount";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":code",$code);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":amount",$amount);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
    }

    function settings_pricing_update($mycon, $price_id, $name, $amount)
    {

	$sql = "UPDATE `settings_pricing` SET `name` = :name, `amount` = :amount WHERE `price_id` = :price_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":price_id",$price_id);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":amount",$amount);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }

    function settings_pricing_delete($mycon, $price_id)
    {

	$sql = "DELETE FROM `settings_pricing` WHERE `price_id` = :price_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":price_id",$price_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }
        

    function settings_offences_add($mycon, $code, $name, $amount)
    {

	$sql = "INSERT INTO `settings_offences` SET `code` = :code,`name` = :name, `amount` = :amount";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":code",$code);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":amount",$amount);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
    }

    function settings_offences_update($mycon, $offence_id, $name, $amount)
    {

	$sql = "UPDATE `settings_offences` SET `name` = :name, `amount` = :amount WHERE `offence_id` = :offence_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":offence_id",$offence_id);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":amount",$amount);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }

    function settings_offences_delete($mycon, $offence_id)
    {

	$sql = "DELETE FROM `settings_offences` WHERE `offence_id` = :offence_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":offence_id",$offence_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }
        
    
    
//////////////////////////////////////////////////////////    


    function admins_groups_add($mycon, $name, $rights, $description, $modifiedby)
    {

            $thedate = date("Y-m-d H:i:s");

            $sql = "INSERT INTO `admins_groups` SET `name` = :name
                    ,`rights` = :rights
                    ,`description` = :description
                    ,`modifiedby` = :modifiedby
                    ,`modifiedon` = :modifiedon";

            $myrec = $mycon->prepare($sql);
            $myrec->bindValue(":name",$name,PDO::PARAM_STR);
            $myrec->bindValue(":rights",$rights,PDO::PARAM_STR);
            $myrec->bindValue(":description",$description,PDO::PARAM_STR);
            $myrec->bindValue(":modifiedby",$modifiedby,PDO::PARAM_STR);
            $myrec->bindValue(":modifiedon",$thedate,PDO::PARAM_STR);

            if(!$myrec->execute()) return false;

            return $mycon->lastInsertId();

    }

    function admins_groups_update($mycon, $group_id, $name, $rights, $description, $modifiedby)
    {
            $thedate = date("Y-m-d H:i:s");

            $sql = "UPDATE `admins_groups` SET `name` = :name
                    ,`rights` = :rights
                    ,`description` = :description
                    ,`modifiedby` = :modifiedby
                    ,`modifiedon` = :modifiedon WHERE `group_id` = :group_id";

            $myrec = $mycon->prepare($sql);
            $myrec->bindValue(":group_id",$group_id,PDO::PARAM_STR);
            $myrec->bindValue(":name",$name,PDO::PARAM_STR);
            $myrec->bindValue(":rights",$rights,PDO::PARAM_STR);
            $myrec->bindValue(":description",$description,PDO::PARAM_STR);
            $myrec->bindValue(":modifiedby",$modifiedby,PDO::PARAM_STR);
            $myrec->bindValue(":modifiedon",$thedate,PDO::PARAM_STR);

            if(!$myrec->execute()) return false;
            return true;

    }

    function admins_groups_delete($mycon, $group_id)
    {

        $sql = "DELETE FROM `admins_groups` WHERE `group_id` = :group_id";
        $myrec =  $mycon->prepare($sql);
        $myrec->bindValue(":group_id",$group_id);

        if(!$myrec->execute())
        {
                return false;
        }

        return true;
    }

    

    function admins_add($mycon, $surname, $firstname, $othernames, $email, $phone, $group_id, $username, $password, $currentuserid)
    {
            $thedate = date("Y-m-d H:i:s");

            $sql = "INSERT INTO `admins` SET `surname` = :surname
                    ,`firstname` = :firstname
                    ,`othernames` = :othernames
                    ,`phone` = :phone
                    ,`email` = :email
                    ,`username` = :username
                    ,`password` = :password
                    ,`group_id` = :group_id
                    ,`token` = '1234'
                    ,`status` = '5'
                    ,`thedate` = :thedate
                    ,`createdby` = :createdby";

            $myrec = $mycon->prepare($sql);
            $myrec->bindValue(":surname",$surname,PDO::PARAM_STR);
            $myrec->bindValue(":firstname",$firstname,PDO::PARAM_STR);
            $myrec->bindValue(":othernames",$othernames,PDO::PARAM_STR);
            $myrec->bindValue(":phone",$phone,PDO::PARAM_STR);
            $myrec->bindValue(":email",$email,PDO::PARAM_STR);
            $myrec->bindValue(":username",$username,PDO::PARAM_STR);
            $myrec->bindValue(":password",$password,PDO::PARAM_STR);
            $myrec->bindValue(":group_id",$group_id,PDO::PARAM_STR);
            $myrec->bindValue(":thedate",$thedate,PDO::PARAM_STR);
            $myrec->bindValue(":createdby",$currentuserid,PDO::PARAM_STR);

            if(!$myrec->execute()) return false;

            return $mycon->lastInsertId();

    }


    function admins_update($mycon, $admin_id, $surname, $firstname, $othernames, $email, $phone, $group_id, $password, $status, $currentuserid)
    {
            $thedate = date("Y-m-d H:i:s");

            $sql = "UPDATE `admins` SET `surname` = :surname
                    ,`firstname` = :firstname
                    ,`othernames` = :othernames
                    ,`phone` = :phone
                    ,`email` = :email
                    ,`group_id` = :group_id
                    ,`password` = :password
                    ,`status` = :status
                    ,`modifiedby` = :modifiedby
                    ,`modifiedon` = :modifiedon WHERE `admin_id` = :admin_id";

            $myrec = $mycon->prepare($sql);
            $myrec->bindValue(":admin_id",$admin_id,PDO::PARAM_STR);
            $myrec->bindValue(":firstname",$firstname,PDO::PARAM_STR);
            $myrec->bindValue(":surname",$surname,PDO::PARAM_STR);
            $myrec->bindValue(":othernames",$othernames,PDO::PARAM_STR);
            $myrec->bindValue(":phone",$phone,PDO::PARAM_STR);
            $myrec->bindValue(":email",$email,PDO::PARAM_STR);
            $myrec->bindValue(":group_id",$group_id,PDO::PARAM_STR);
            $myrec->bindValue(":password",$password,PDO::PARAM_STR);
            $myrec->bindValue(":status",$status,PDO::PARAM_STR);
            $myrec->bindValue(":modifiedby",$currentuserid,PDO::PARAM_STR);
            $myrec->bindValue(":modifiedon",$thedate,PDO::PARAM_STR);

            if(!$myrec->execute()) return false;

            return true;

    }


    function admins_delete($mycon, $admin_id)
    {

        $sql = "DELETE FROM `admins` WHERE `admin_id` = :admin_id";
        $myrec =  $mycon->prepare($sql);
        $myrec->bindValue(":admin_id",$admin_id);

        if(!$myrec->execute())
        {
                return false;
        }

        return true;
    }


    function admins_logins($mycon, $admin_id, $ip, $device)
    {
            $thedate = date("Y-m-d H:i:s");

            $sql = "INSERT INTO `logins` SET `admin_id` = :admin_id
                    ,`ip` = :ip
                    ,`device` = :device
                    ,`thedate` = :thedate";

            $myrec = $mycon->prepare($sql);
            $myrec->bindValue(":admin_id",$admin_id,PDO::PARAM_STR);
            $myrec->bindValue(":ip",$ip,PDO::PARAM_STR);
            $myrec->bindValue(":device",$device,PDO::PARAM_STR);
            $myrec->bindValue(":thedate",$thedate,PDO::PARAM_STR);

            if(!$myrec->execute()) return false;

            return true;


    }


    function dealers_logins($mycon, $dealer_id, $ip, $device)
    {
        return true;
            $thedate = date("Y-m-d H:i:s");

            $sql = "INSERT INTO `logins` SET `dealer_id` = :dealer_id
                    ,`ip` = :ip
                    ,`device` = :device
                    ,`thedate` = :thedate";

            $myrec = $mycon->prepare($sql);
            $myrec->bindValue(":dealer_id",$dealer_id,PDO::PARAM_STR);
            $myrec->bindValue(":ip",$ip,PDO::PARAM_STR);
            $myrec->bindValue(":device",$device,PDO::PARAM_STR);
            $myrec->bindValue(":thedate",$thedate,PDO::PARAM_STR);

            if(!$myrec->execute()) return false;

            return true;


    }

    function admin_activities($mycon, $admin_id, $action)
    {
        return true;
        
            $thedate = date("Y-m-d H:i:s");

            $sql = "INSERT INTO `activitylogs` SET `admin_id` = :admin_id
                    ,`action` = :action
                    ,`thedate` = :thedate";

            $myrec = $mycon->prepare($sql);
            $myrec->bindValue(":admin_id",$admin_id,PDO::PARAM_STR);
            $myrec->bindValue(":action",$action,PDO::PARAM_STR);
            $myrec->bindValue(":thedate",$thedate,PDO::PARAM_STR);

            if(!$myrec->execute()) return false;

            return true;


    }

    

	function updates($mycon, $item_type, $item_id, $content)
	{
		$thedate = date("Y-m-d H:i:s");
		
		$sql = "INSERT INTO `updates` SET `item_type` = :item_type
			,`item_id` = :item_id
			,`content` = :content
			,`thedate` = :thedate";
		
		$myrec = $mycon->prepare($sql);
		$myrec->bindValue(":item_type",$item_type,PDO::PARAM_STR);
		$myrec->bindValue(":item_id",$item_id,PDO::PARAM_STR);
		$myrec->bindValue(":content",$content,PDO::PARAM_STR);
		$myrec->bindValue(":thedate",$thedate,PDO::PARAM_STR);
		
		if(!$myrec->execute()) return false;
		
		return true;
			
					
	}
    

    function profile_update($mycon, $admin_id, $surname, $firstname, $othernames, $phone)
    {
            $thedate = date("Y-m-d H:i:s");

            $sql = "UPDATE `admins` SET `surname` = :surname
                    ,`firstname` = :firstname
                    ,`othernames` = :othernames
                    ,`phone` = :phone
                    ,`modifiedby` = :modifiedby
                    ,`modifiedon` = :modifiedon WHERE `admin_id` = :admin_id";

            $myrec = $mycon->prepare($sql);
            $myrec->bindValue(":admin_id",$admin_id,PDO::PARAM_STR);
            $myrec->bindValue(":firstname",$firstname,PDO::PARAM_STR);
            $myrec->bindValue(":surname",$surname,PDO::PARAM_STR);
            $myrec->bindValue(":othernames",$othernames,PDO::PARAM_STR);
            $myrec->bindValue(":phone",$phone,PDO::PARAM_STR);
            $myrec->bindValue(":modifiedby",$admin_id,PDO::PARAM_STR);
            $myrec->bindValue(":modifiedon",$thedate,PDO::PARAM_STR);

            if(!$myrec->execute()) return false;

            return true;

    }


    function profile_update_password($mycon, $admin_id, $password)
    {

	$sql = "UPDATE `admins` SET `password` = :password WHERE `admin_id` = :admin_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":admin_id",$admin_id);
	$myrec->bindValue(":password",$password);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }
            
        

}///// end class

class DataRead
{
        
    function admins_login($mycon,$username,$password)
    {
        $myrec = $mycon->prepare("SELECT * FROM `admins` WHERE `username` = :username AND `password`=:password LIMIT 1");
        $myrec->bindValue(":username",$username);
        $myrec->bindValue(":password",$password);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) 
        {
            return false;
        }
        
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
        
    function managers_login($mycon,$username,$password)
    {
        $myrec = $mycon->prepare("SELECT * FROM `managers` WHERE `username` = :username AND `password`=:password LIMIT 1");
        $myrec->bindValue(":username",$username);
        $myrec->bindValue(":password",$password);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) 
        {
            return false;
        }
        
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
        
    function dealers_login($mycon,$username,$password)
    {
        $myrec = $mycon->prepare("SELECT * FROM `dealers` WHERE `username` = :username AND `password`=:password LIMIT 1");
        //$myrec = $mycon->prepare("SELECT * FROM `dealers` WHERE `username` = :username LIMIT 1");
        $myrec->bindValue(":username",$username);
        $myrec->bindValue(":password",$password);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) 
        {
            return false;
        }
        
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    } 

    function registrations_list_old($mycon, $filter, $param)
    {
		$sql = "SELECT * FROM `registrations_old` WHERE `registration_id` > -1 ";
		if(strlen(trim($sql)) > 3 && is_array($param))
		{
			$sql .= $filter;
			$myrec = $mycon->prepare($sql);
			$myrec->execute($param);
		}
		else
		{
			$sql .= " ORDER BY `thedate` DESC";
			$myrec = $mycon->query($sql);
		}

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function registrations_get_old($mycon, $registration_id)
    {
        $myrec = $mycon->prepare("SELECT * FROM `registrations_old` WHERE `registration_id` = :registration_id LIMIT 1");
        $myrec->bindValue(":registration_id",$registration_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }

    function registrations_list($mycon, $filter, $param)
    {
		$sql = "SELECT * FROM `registrations` WHERE `registration_id` > -1 ";
		if(strlen(trim($sql)) > 3 && is_array($param))
		{
			$sql .= $filter;
			$myrec = $mycon->prepare($sql);
			$myrec->execute($param);
		}
		else
		{
			$sql .= " ORDER BY `thedate` DESC";
			$myrec = $mycon->query($sql);
		}

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function registrations_get($mycon, $registration_id)
    {
        $myrec = $mycon->prepare("SELECT * FROM `registrations` WHERE `registration_id` = :registration_id LIMIT 1");
        $myrec->bindValue(":registration_id",$registration_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
    
    function registrations_getbyusername($mycon, $username)
    {
        $myrec = $mycon->prepare("SELECT * FROM `registrations` WHERE `username` = :username LIMIT 1");
        $myrec->bindValue(":username",$username);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }

    
    function managers_list($mycon, $filter, $param)
    {
        $sql = "SELECT m.*, (SELECT COUNT(`dealer_id`) FROM `dealers` WHERE `manager_id` = m.manager_id) AS dealercount, (SELECT COUNT(`retailer_id`) FROM `retailers` WHERE `manager_id` = m.manager_id) AS retailercount, (SELECT COUNT(`sale_id`) FROM `sales` WHERE `manager_id` = m.manager_id) AS salescount FROM `managers` m WHERE m.`manager_id` > -1 ";
        if(strlen(trim($sql)) > 3 && is_array($param))
        {
                $sql .= $filter;
                $myrec = $mycon->prepare($sql);
                $myrec->execute($param);
        }
        else
        {
                $sql .= " ORDER BY `thedate` DESC";
                $myrec = $mycon->query($sql);
        }

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function managers_get($mycon, $manager_id)
    {
        $myrec = $mycon->prepare("SELECT m.*, (SELECT COUNT(`dealer_id`) FROM `dealers` WHERE `manager_id` = m.manager_id) AS dealerscount, (SELECT COUNT(`retailer_id`) FROM `retailers` WHERE `manager_id` = m.manager_id) AS retailerscount, (SELECT COUNT(`sale_id`) FROM `sales` WHERE `manager_id` = m.manager_id) AS salescount FROM `managers` m WHERE m.`manager_id` = :manager_id LIMIT 1");
        $myrec->bindValue(":manager_id",$manager_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
    
    function managers_getbyusername($mycon, $username)
    {
        $myrec = $mycon->prepare("SELECT * FROM `managers` WHERE `username` = :username LIMIT 1");
        $myrec->bindValue(":username",$username);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
    
    function managers_statuslist($mycon, $manager_id)
    {
        $sql = "SELECT * FROM `managers_status` WHERE `manager_id` = :manager_id ";
                $myrec = $mycon->prepare($sql);
                $myrec->bindValue(":manager_id",$manager_id);
                $myrec->execute();

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
 
    
    function dealers_listbyregistration($mycon)
    {
        $sql = "SELECT d.dealer_id, r.registration_id FROM `dealers` d LEFT JOIN `registrations` r ON d.username = r.username ";
                $myrec = $mycon->prepare($sql);
                $myrec->execute();

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function dealers_list($mycon, $filter, $param)
    {
		$sql = "SELECT d.*, (SELECT COUNT(`retailer_id`) FROM `retailers` WHERE `dealer_id` = d.dealer_id) AS retailercount, (SELECT COUNT(`sale_id`) FROM `sales` WHERE `dealer_id` = d.dealer_id) AS salescount FROM `dealers` d WHERE d.`dealer_id` > -1 ";
		if(strlen(trim($sql)) > 3 && is_array($param))
		{
			$sql .= $filter;
			$myrec = $mycon->prepare($sql);
			$myrec->execute($param);
		}
		else
		{
			$sql .= " ORDER BY `thedate` DESC";
			$myrec = $mycon->query($sql);
		}

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function dealers_listbymanager($mycon, $manager_id, $filter, $param)
    {
	$sql = "SELECT d.*, (SELECT COUNT(`retailer_id`) FROM `retailers` WHERE `dealer_id` = d.dealer_id) AS retailercount, (SELECT COUNT(`sale_id`) FROM `sales` WHERE `dealer_id` = d.dealer_id) AS salescount FROM `dealers` d WHERE d.`manager_id` = :manager_id ";
        if(!is_array($param)) $param = array();
        $param[':manager_id'] = $manager_id;
        if(strlen(trim($filter)) > 3)
        {
            $sql .= $filter;
        }
        else
        {
            $sql .= " ORDER BY `thedate` DESC";
        }
        $myrec = $mycon->prepare($sql);
        $myrec->execute($param);

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function dealers_get($mycon, $dealer_id)
    {
        $myrec = $mycon->prepare("SELECT d.*, (SELECT COUNT(`retailer_id`) FROM `retailers` WHERE `dealer_id` = d.dealer_id) AS retailerscount, (SELECT COUNT(`sale_id`) FROM `sales` WHERE `dealer_id` = d.dealer_id) AS salescount FROM `dealers` d WHERE d.`dealer_id` = :dealer_id LIMIT 1");
        $myrec->bindValue(":dealer_id",$dealer_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
    
    function dealers_getbyusername($mycon, $username)
    {
        $myrec = $mycon->prepare("SELECT * FROM `dealers` WHERE `username` = :username LIMIT 1");
        $myrec->bindValue(":username",$username);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
      
    function dealers_statuslist($mycon, $dealer_id)
    {
        $sql = "SELECT * FROM `dealers_status` WHERE `dealer_id` = :dealer_id ";
                $myrec = $mycon->prepare($sql);
                $myrec->bindValue(":dealer_id",$dealer_id);
                $myrec->execute();

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function retailers_list($mycon, $filter, $param)
    {
		$sql = "SELECT r.*, (SELECT COUNT(`sale_id`) FROM `sales` WHERE `retailer_id` = r.retailer_id) AS salescount FROM `retailers` r WHERE r.`retailer_id` > -1 ";
		if(strlen(trim($sql)) > 3 && is_array($param))
		{
			$sql .= $filter;
			$myrec = $mycon->prepare($sql);
			$myrec->execute($param);
		}
		else
		{
			$sql .= " ORDER BY `thedate` DESC";
			$myrec = $mycon->query($sql);
		}

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function retailers_listbydealer($mycon, $dealer_id, $filter, $param)
    {
	$sql = "SELECT r.*, (SELECT COUNT(`sale_id`) FROM `sales` WHERE `retailer_id` = r.retailer_id) AS salescount FROM `retailers` r WHERE r.`dealer_id` = :dealer_id ";
        if(!is_array($param)) $param = array();
        $param[':dealer_id'] = $dealer_id;
        if(strlen(trim($filter)) > 3)
        {
            $sql .= $filter;
        }
        else
        {
            $sql .= " ORDER BY `thedate` DESC";
        }
        $myrec = $mycon->prepare($sql);
        $myrec->execute($param);

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function retailers_get($mycon, $retailer_id)
    {
        $myrec = $mycon->prepare("SELECT r.*, (SELECT COUNT(`sale_id`) FROM `sales` WHERE `retailer_id` = r.retailer_id) AS salescount FROM `retailers` r WHERE r.`retailer_id` = :retailer_id LIMIT 1");
        $myrec->bindValue(":retailer_id",$retailer_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
    
    function retailers_getbyusername($mycon, $username)
    {
        $myrec = $mycon->prepare("SELECT * FROM `retailers` WHERE `username` = :username LIMIT 1");
        $myrec->bindValue(":username",$username);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
      
    function retailers_statuslist($mycon, $retailer_id)
    {
        $sql = "SELECT * FROM `retailers_status` WHERE `retailer_id` = :retailer_id ";
                $myrec = $mycon->prepare($sql);
                $myrec->bindValue(":retailer_id",$retailer_id);
                $myrec->execute();

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
  

    function sales_list($mycon, $filter, $param)
    {
		$sql = "SELECT * FROM `sales` WHERE `sale_id` > -1 ";
		if(strlen(trim($sql)) > 3 && is_array($param))
		{
			$sql .= $filter;
			$myrec = $mycon->prepare($sql);
			$myrec->execute($param);
		}
		else
		{
			$sql .= " ORDER BY `sale_id` DESC";
			$myrec = $mycon->query($sql);
		}

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function admins_list($mycon)
    {
	$sql = "SELECT a.*, g.name AS groupname FROM `admins` a LEFT JOIN `admins_groups` g ON g.group_id = a.group_id ORDER BY `admin_id` ASC";
        $myrec = $mycon->query($sql);
                
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function admins_listbygroup($mycon, $group_id)
    {
	$sql = "SELECT a.*, g.name AS groupname FROM `admins` a LEFT JOIN `admins_groups` g ON g.group_id = a.group_id WHERE a.`group_id` = :group_id ORDER BY `admin_id` ASC";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":group_id",$group_id);
        $myrec->execute();
                
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function admins_get($mycon, $admin_id)
    {
        $myrec = $mycon->prepare("SELECT a.*, g.name AS groupname FROM `admins` a LEFT JOIN `admins_groups` g ON g.group_id = a.group_id WHERE a.`admin_id` = :admin_id LIMIT 1");
        $myrec->bindValue(":admin_id",$admin_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
    
    function admins_getbyusername($mycon, $username)
    {
        $myrec = $mycon->prepare("SELECT a.*, g.name AS groupname FROM `admins` a LEFT JOIN `admins_groups` g ON g.group_id = a.group_id WHERE a.`username` = :username LIMIT 1");
        $myrec->bindValue(":username",$username);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }

    function admins_groups_list($mycon)
    {
	$sql = "SELECT g.*, (SELECT COUNT(admin_id) FROM `admins` WHERE `group_id` = g.group_id) AS usercount FROM `admins_groups` g ORDER BY `name` ASC";
        $myrec = $mycon->query($sql);
                
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function admins_groups_get($mycon, $group_id)
    {
        $myrec = $mycon->prepare("SELECT g.*, (SELECT COUNT(admin_id) FROM `admins` WHERE `group_id` = g.group_id) AS usercount FROM `admins_groups` g WHERE `group_id` = :group_id LIMIT 1");
        $myrec->bindValue(":group_id",$group_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
    
    function admins_groups_getbyname($mycon, $name)
    {
        $myrec = $mycon->prepare("SELECT g.*, (SELECT COUNT(admin_id) FROM `admins` WHERE `group_id` = g.group_id) AS usercount FROM `admins_groups` g WHERE `name` = :name LIMIT 1");
        $myrec->bindValue(":name",$name);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
    
    function admins_groups_getbyuserid($mycon, $user_id)
    {
        $myrec = $mycon->prepare("SELECT g.*, u.username FROM `admins` u LEFT JOIN `admins_groups` g ON g.group_id = u.group_id WHERE u.admin_id = :user_id LIMIT 1");
        $myrec->bindValue(":user_id",$user_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
    
    
    
    
}///// end class
?>