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


    function transmissions_comments_add($mycon, $transmission_id, $name, $email, $phone, $rate_sound, $rate_picture, $rate_channel, $comment, $ip, $location)
    {
            $thedate = date("Y-m-d H:i:s");

            $sql = "INSERT INTO `transmissions_comments` SET `transmission_id` = :transmission_id
                    ,`name` = :name
                    ,`email` = :email
                    ,`phone` = :phone
                    ,`rate_sound` = :rate_sound
                    ,`rate_picture` = :rate_picture
                    ,`rate_channel` = :rate_channel
                    ,`comment` = :comment
                    ,`ip` = :ip
                    ,`location` = :location
                    ,`status` = '5'
                    ,`thedate` = :thedate";

            $myrec = $mycon->prepare($sql);
            $myrec->bindValue(":transmission_id",$transmission_id,PDO::PARAM_STR);
            $myrec->bindValue(":name",$name,PDO::PARAM_STR);
            $myrec->bindValue(":phone",$phone,PDO::PARAM_STR);
            $myrec->bindValue(":email",$email,PDO::PARAM_STR);
            $myrec->bindValue(":rate_sound",$rate_sound,PDO::PARAM_STR);
            $myrec->bindValue(":rate_picture",$rate_picture,PDO::PARAM_STR);
            $myrec->bindValue(":rate_channel",$rate_channel,PDO::PARAM_STR);
            $myrec->bindValue(":comment",$comment,PDO::PARAM_STR);
            $myrec->bindValue(":ip",$ip,PDO::PARAM_STR);
            $myrec->bindValue(":location",$location,PDO::PARAM_STR);
            $myrec->bindValue(":thedate",$thedate,PDO::PARAM_STR);

            if(!$myrec->execute()) return false;

            return $mycon->lastInsertId();

    }
    
    function video_delete($mycon,$code)
    {
        $sql = "DELETE FROM `video_upload` WHERE `video_id` = :video_id";
        $myrec =  $mycon->prepare($sql);
        $myrec->bindValue(":video_id",$code);
        $myrec->execute();
        $delete = @unlink("video/$code.mp4");
        if(!$delete)
         {
             return false;
         }
 
         
         return true;  //openPage("video_upload_view.php");

    }
    
    function nctv_personalinfo_create($mycon,$name,$email,$phone,$address,$state,$video_title,$channel_id)
    {          //  var_dump($name);
       $thedate = date("Y-m-d H:i:s");

	$sql = "INSERT INTO `video_upload` SET `name` = :name,`email` = :email,`phone` = :phone,`address` = :address,`state` = :state,`video_title` = :video_title,`thedate` = :thedate,`channel_id` = '2'";
	$myrec = $mycon->prepare($sql);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":email",$email);
        $myrec->bindValue(":phone",$phone);
	$myrec->bindValue(":address",$address);
        $myrec->bindValue(":state",$state);
        $myrec->bindValue(":video_title",$video_title);
        $myrec->bindValue(":thedate",$thedate);
	$myrec->execute();
        //showAlert("hjhgjhjh");
         if($myrec->rowCount() < 1)
         {
             return false;
         }
            return $mycon->lastInsertId();
        
    }     
    
    function hitsafrica_personalinfo_create($mycon,$name,$email,$phone,$address,$state,$video_title,$channel_id)
    {          //  var_dump($name);
       $thedate = date("Y-m-d H:i:s");

	$sql = "INSERT INTO `video_upload` SET `name` = :name,`email` = :email,`phone` = :phone,`address` = :address,`state` = :state,`video_title` = :video_title,`thedate` = :thedate,`channel_id` = '1'";
	$myrec = $mycon->prepare($sql);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":email",$email);
        $myrec->bindValue(":phone",$phone);
	$myrec->bindValue(":address",$address);
        $myrec->bindValue(":state",$state);
        $myrec->bindValue(":video_title",$video_title);
        $myrec->bindValue(":thedate",$thedate);
	$myrec->execute();
        //showAlert("hjhgjhjh");
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
    
    function video_banners_list($mycon)
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
    

    function channels_categories_list($mycon)
    {
        $sql = "SELECT c.*, (SELECT COUNT(`channel_id`) FROM `channels` WHERE `category_id` = c.category_id) AS channelscount FROM `channels_categories` c ORDER BY `position` ASC";
        $myrec = $mycon->query($sql);
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function channels_list($mycon)
    {
        $sql = "SELECT c.*, cc.name AS categoryname, (SELECT `program_id` FROM `programs` WHERE `channel_id` = c.channel_id) AS programcount FROM `channels` c LEFT JOIN `channels_categories` cc ON cc.category_id = c.category_id ORDER BY c.`code` ASC ";
        $myrec = $mycon->query($sql);
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function channels_listrandom($mycon)
    {
        $sql = "SELECT c.*, cc.name AS categoryname, (SELECT `program_id` FROM `programs` WHERE `channel_id` = c.channel_id) AS programcount FROM `channels` c LEFT JOIN `channels_categories` cc ON cc.category_id = c.category_id WHERE c.status = 5 ORDER BY rand() ";
        $myrec = $mycon->query($sql);
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function channels_listbycategory($mycon, $category_id)
    {
        $sql = "SELECT c.*, cc.name AS categoryname, (SELECT `program_id` FROM `programs` WHERE `channel_id` = c.channel_id) AS programcount FROM `channels` c LEFT JOIN `channels_categories` cc ON cc.category_id = c.category_id WHERE c.status = 5 AND c.`category_id` = :category_id ORDER BY c.`code` ASC";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":category_id",$category_id);
        $myrec->execute();
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function transmissions_list($mycon)
    {
	$sql = "SELECT * FROM `transmissions` ORDER BY `position` ASC";
        $myrec = $mycon->query($sql);
                
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function nctv_video_list($mycon, $filter, $param)
    {
	$sql = "SELECT * FROM `video_upload` WHERE `channel_id`='2'";
        if(strlen(trim($filter)) > 3 && is_array($param))
        {
                $sql .= $filter;
                $myrec = $mycon->prepare($sql);
                $myrec->execute($param);
        }
        else
        {
                $sql .= " ORDER BY .`video_id` DESC";
                $myrec = $mycon->query($sql);
        }

        return $myrec->fetchAll(PDO::FETCH_ASSOC); 
       
    }
    
    function hitsafrica_video_list($mycon, $filter, $param)
    {
	$sql = "SELECT * FROM `video_upload` WHERE `channel_id`='1'";
        if(strlen(trim($filter)) > 3 && is_array($param))
        {
                $sql .= $filter;
                $myrec = $mycon->prepare($sql);
                $myrec->execute($param);
        }
        else
        {
                $sql .= " ORDER BY .`video_id` DESC";
                $myrec = $mycon->query($sql);
        }

        return $myrec->fetchAll(PDO::FETCH_ASSOC); 
       
    }
    
    
    function transmissions_get($mycon, $transmission_id)
    {
        $sql = "SELECT * FROM `transmissions` WHERE `transmission_id` = :transmission_id ";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":transmission_id",$transmission_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
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