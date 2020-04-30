<?php
	require_once("config.php");


class DataWrite
{
    //Process last login
    function lastLogin($mycon, $admin_id)
    {

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

    
//////////////////////////////////////////////////////////    

    function adverts_updateviews($mycon, $advert_id)
    {
            $sql = "UPDATE `adverts` SET `viewcount` = viewcount + 1 WHERE `advert_id` = :advert_id";

            $myrec = $mycon->prepare($sql);
            $myrec->bindValue(":advert_id",$advert_id,PDO::PARAM_STR);

            if(!$myrec->execute()) return false;
            return true;

    }


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

    function admin_activities($mycon, $admin_id, $action)
    {
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
 
    function banners_list($mycon)
    {
	$sql = "SELECT * FROM `banners` ORDER BY `banner_id` DESC";
        $myrec = $mycon->query($sql);
                
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
 
    function breakingnews_list($mycon)
    {
	$sql = "SELECT * FROM `breakingnews` ORDER BY `item_id` DESC";
        $myrec = $mycon->query($sql);
                
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function categories_list($mycon)
    {
        $sql = "SELECT c.*, (SELECT COUNT(`article_id`) FROM `articles` WHERE `category_id` = c.category_id) AS articlecount FROM `categories` c ORDER BY `name` ASC";
        $myrec = $mycon->query($sql);
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function categories_get($mycon, $category_id)
    {
        $sql = "SELECT c.*, (SELECT COUNT(`article_id`) FROM `articles` WHERE `category_id` = c.category_id) AS articlecount FROM `categories` c WHERE `category_id` = :category_id";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":category_id",$category_id);
        $myrec->execute();
        if($myrec->rowCount() < 1) return false;
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
    
    function contents_get($mycon)
    {
        $myrec = $mycon->query("SELECT * FROM `contents`");
        $contents = array();

        //loop through settings
        foreach($myrec->fetchAll(PDO::FETCH_ASSOC) as $row)
        {
            $key = $row['item_key'];
            $value = $row['item_value'];
            $contents[$key] = $value;
        }

        return $contents;
        
    }
    
    function articles_list($mycon, $filter, $param)
    {
        $sql = "SELECT a.*, c.name AS categoryname FROM `articles` a LEFT JOIN `categories` c ON c.category_id = a.category_id WHERE a.`article_id` > -1 ";
        if(!is_array($param)) $param = array();
        if(strlen(trim($filter)) > 3)
        {
            $sql .= $filter;
        }
        else
        {
            $sql .= " ORDER BY a.`article_id` DESC";
        }
        $myrec = $mycon->prepare($sql);
        $myrec->execute($param);

        return $myrec->fetchAll(PDO::FETCH_ASSOC);        
    }

    function articles_listbycategory($mycon, $category_id, $filter, $param)
    {
        $sql = "SELECT a.*, c.name AS categoryname FROM `articles` a LEFT JOIN `categories` c ON c.category_id = a.category_id WHERE a.`category_id` = :category_id ";
        if(!is_array($param)) $param = array();
        $param[":category_id"] = $category_id;
        if(strlen(trim($filter)) > 3)
        {
            $sql .= $filter;
        }
        else
        {
            $sql .= " ORDER BY a.`article_id` DESC";
        }
        
        $myrec = $mycon->prepare($sql);
        $myrec->execute($param);

        $allarticles = array();
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
    function articles_get($mycon, $article_id)
    {
        $sql = "SELECT a.*, c.name AS categoryname FROM `articles` a LEFT JOIN `categories` c ON c.category_id = a.category_id WHERE a.`article_id` = :article_id ";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":article_id",$article_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
    
    function articles_getbyshorturl($mycon, $shorturl)
    {
        $sql = "SELECT * FROM `articles` WHERE `shorturl` = :shorturl ";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":shorturl",$shorturl);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        $article = $myrec->fetch(PDO::FETCH_ASSOC);
        $article['categories'] = $this->articles_categories($mycon, $article['article_id']);
        return $article;
    }
    
    function articles_categories($mycon, $article_id)
    {
        $sql = "SELECT ac.*, c.name FROM `articles_categories` ac LEFT JOIN `categories` c ON c.category_id = ac.category_id WHERE `article_id` = :article_id ";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":article_id",$article_id);
        $myrec->execute();
        
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function trailers_list($mycon, $filter, $param)
    {
        $sql = "SELECT a.*, c.name AS categoryname FROM `trailers` a LEFT JOIN `categories` c ON c.category_id = a.category_id WHERE a.`trailer_id` > -1 ";
        if(!is_array($param)) $param = array();
        if(strlen(trim($filter)) > 3)
        {
            $sql .= $filter;
        }
        else
        {
            $sql .= " ORDER BY a.`trailer_id` DESC";
        }
        $myrec = $mycon->prepare($sql);
        $myrec->execute($param);

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
        
    }

    function trailers_listbycategory($mycon, $category_id, $filter, $param)
    {
        $sql = "SELECT a.*, c.name AS categoryname FROM `trailers` a LEFT JOIN `categories` c ON c.category_id = a.category_id WHERE a.`category_id` = :category_id ";
        if(!is_array($param)) $param = array();
        $param[":category_id"] = $category_id;
        if(strlen(trim($filter)) > 3)
        {
            $sql .= $filter;
        }
        else
        {
            $sql .= " ORDER BY a.`trailer_id` DESC";
        }
        
        $myrec = $mycon->prepare($sql);
        $myrec->execute($param);

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
    function trailers_get($mycon, $trailer_id)
    {
        $sql = "SELECT a.*, c.name AS categoryname FROM `trailers` a LEFT JOIN `categories` c ON c.category_id = a.category_id WHERE a.`trailer_id` = :trailer_id ";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":trailer_id",$trailer_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
    
    function news_list($mycon, $filter, $param)
    {
        $sql = "SELECT * FROM `news` WHERE `article_id` > -1 ";
        if(!is_array($param)) $param = array();
        if(strlen(trim($filter)) > 3)
        {
            $sql .= $filter;
        }
        else
        {
            $sql .= " ORDER BY `article_id` DESC";
        }
        $myrec = $mycon->prepare($sql);
        $myrec->execute($param);

        return $myrec->fetchAll(PDO::FETCH_ASSOC);        
    }
    
    function news_get($mycon, $article_id)
    {
        $sql = "SELECT * FROM `news` WHERE `article_id` = :article_id ";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":article_id",$article_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
    

    function adverts_get($mycon, $type)
    {
        $sql = "SELECT * FROM `adverts` WHERE `type` = :type AND `status` = 5 ORDER BY rand() ";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":type",$type);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        $advert = $myrec->fetchAll(PDO::FETCH_ASSOC);
        //$dataWrite = New DataWrite();
        //$dataWrite->adverts_updateviews($mycon, $advert['advert_id']);
        return $advert;
    }

    function adverts_getone($mycon, $type)
    {
        $sql = "SELECT * FROM `adverts` WHERE `type` = :type AND `status` = 5 ORDER BY rand() LIMIT 1 ";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":type",$type);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        $advert = $myrec->fetch(PDO::FETCH_ASSOC);
        $dataWrite = New DataWrite();
        $dataWrite->adverts_updateviews($mycon, $advert['advert_id']);
        return $advert;
    }

    function adverts_getbyid($mycon, $advert_id)
    {
        $sql = "SELECT * FROM `adverts` WHERE `advert_id` = :advert_id AND `status` = 5 LIMIT 1 ";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":advert_id",$advert_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        $advert = $myrec->fetch(PDO::FETCH_ASSOC);
        $dataWrite = New DataWrite();
        $dataWrite->adverts_updateviews($mycon, $advert['advert_id']);
        return $advert;
    }
    

    function channels_list($mycon)
    {
        $sql = "SELECT * FROM `channels`";
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