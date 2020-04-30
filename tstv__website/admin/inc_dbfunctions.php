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

    function banners_add($mycon, $name, $placement, $link)
    {

	$sql = "INSERT INTO `banners` SET `name` = :name
			,`placement` = :placement
			,`link` = :link";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":placement",$placement);
	$myrec->bindValue(":link",$link);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
        
    }

    function banners_delete($mycon, $banner_id)
    {

	$sql = "DELETE FROM `banners` WHERE `banner_id` = :banner_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":banner_id",$banner_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }


    function breakingnew_add($mycon, $name, $link)
    {

	$sql = "INSERT INTO `breakingnews` SET `name` = :name
			,`link` = :link";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":link",$link);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
        
    }

    function breakingnews_delete($mycon, $item_id)
    {

	$sql = "DELETE FROM `breakingnews` WHERE `item_id` = :item_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":item_id",$item_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }


    function categories_add($mycon, $parent_id, $name, $position)
    {
	$sql = "INSERT INTO `categories` SET `parent_id` = :parent_id ,`name` = :name , `position` = :position";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":parent_id",$parent_id);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":position",$position);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
        
    }

    function categories_update($mycon, $category_id, $name, $position)
    {

	$sql = "UPDATE `categories` SET `name` = :name , `position` = :position WHERE `category_id` = :category_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":category_id",$category_id);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":position",$position);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }

    function categories_update_shorturl($mycon, $category_id, $shorturl)
    {

	$sql = "UPDATE `categories` SET `shorturl` = :shorturl WHERE `category_id` = :category_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":category_id",$category_id);
	$myrec->bindValue(":shorturl",$shorturl);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }

    function categories_delete($mycon, $category_id)
    {

	$sql = "DELETE FROM `categories` WHERE `category_id` = :category_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":category_id",$category_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }


    function contents_update($mycon, $key, $value)
    {

	$sql = "REPLACE INTO `contents` SET `item_key` = :key, `item_value` = :value";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":key",$key);
	$myrec->bindValue(":value",$value);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }


    function adverts_add($mycon, $type, $name, $code, $link)
    {
	$sql = "INSERT INTO `adverts` SET `type` = :type ,`name` = :name , `code` = :code, `link` = :link";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":type",$type);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":code",$code);
	$myrec->bindValue(":link",$link);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
        
    }
    
    function adverts_delete($mycon, $advert_id)
    {

	$sql = "DELETE FROM `adverts` WHERE `advert_id` = :advert_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":advert_id",$advert_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }

    function channels_categories_add($mycon, $name, $caption, $position)
    {
	$sql = "INSERT INTO `channels_categories` SET `name` = :name , `caption` = :caption, `position` = :position";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":caption",$caption);
	$myrec->bindValue(":position",$position);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
        
    }

    function channels_categories_update($mycon, $category_id, $name, $caption, $position)
    {

	$sql = "UPDATE `channels_categories` SET `name` = :name , `caption` = :caption, `position` = :position WHERE `category_id` = :category_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":category_id",$category_id);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":caption",$caption);
	$myrec->bindValue(":position",$position);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }

    function channels_categories_delete($mycon, $category_id)
    {

	$sql = "DELETE FROM `channels_categories` WHERE `category_id` = :category_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":category_id",$category_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }


    function channels_add($mycon, $category_id, $code, $name, $position, $caption, $details)
    {
	$sql = "INSERT INTO `channels` SET `category_id` = :category_id, `code` = :code ,`name` = :name, `position` = :position, `caption` = :caption, `details` = :details";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":code",$code);
	$myrec->bindValue(":position",$position);
	$myrec->bindValue(":category_id",$category_id);
	$myrec->bindValue(":caption",$caption);
	$myrec->bindValue(":details",$details);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
        
    }

    function channels_update($mycon, $channel_id, $name, $code, $position, $caption, $details)
    {
	$sql = "UPDATE `channels` SET `code` = :code ,`name` = :name, `position` = :position, `caption` = :caption, `details` = :details WHERE `channel_id` = :channel_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":channel_id",$channel_id);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":code",$code);
	$myrec->bindValue(":position",$position);
	$myrec->bindValue(":caption",$caption);
	$myrec->bindValue(":details",$details);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }
    function channels_update_status($mycon, $channel_id, $status, $reason, $admin_id)
    {
        $thedate = date("Y-m-d H:i:s");
        
	$sql = "UPDATE `channels` SET `status` = :status WHERE `channel_id` = :channel_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":channel_id",$channel_id);
	$myrec->bindValue(":status",$status);

        if(!$myrec->execute())
        {
                return false;
        }
        
	$sql = "INSERT INTO `channels_status` SET `channel_id` = :channel_id
                        ,`status` = :status
			,`reason` = :reason
			,`thedate` = :thedate
			,`modifiedby_type` = 0
			,`modifiedby_id` = :admin_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":channel_id",$channel_id);
	$myrec->bindValue(":status",$status);
	$myrec->bindValue(":reason",$reason);
	$myrec->bindValue(":thedate",$thedate);
	$myrec->bindValue(":admin_id",$admin_id);
        $myrec->execute();
        
        return true;
    }
        
    
    function channels_delete($mycon, $channel_id)
    {

	$sql = "DELETE FROM `channels` WHERE `channel_id` = :channel_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":channel_id",$channel_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }

    function programs_add($mycon, $channel_id, $name, $caption)
    {
	$sql = "INSERT INTO `programs` SET `channel_id` = :channel_id, `name` = :name, `caption` = :caption";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":channel_id",$channel_id);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":caption",$caption);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
            return false;
        }
        
        return $mycon->lastInsertId();
        
    }

    function programs_update($mycon, $program_id, $name, $caption)
    {
	$sql = "UPDATE `programs` SET `name` = :name, `caption` = :caption WHERE `program_id` = :program_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":program_id",$program_id);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":caption",$caption);
        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }
    function programs_update_status($mycon, $program_id, $status, $reason, $admin_id)
    {
        $thedate = date("Y-m-d H:i:s");
        
	$sql = "UPDATE `programs` SET `status` = :status WHERE `program_id` = :program_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":program_id",$program_id);
	$myrec->bindValue(":status",$status);

        if(!$myrec->execute())
        {
                return false;
        }
        
	$sql = "INSERT INTO `programs_status` SET `program_id` = :program_id
                        ,`status` = :status
			,`reason` = :reason
			,`thedate` = :thedate
			,`modifiedby_type` = 0
			,`modifiedby_id` = :admin_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":program_id",$program_id);
	$myrec->bindValue(":status",$status);
	$myrec->bindValue(":reason",$reason);
	$myrec->bindValue(":thedate",$thedate);
	$myrec->bindValue(":admin_id",$admin_id);
        $myrec->execute();
        
        return true;
    }
            
    function programs_delete($mycon, $channel_id, $program_id)
    {

	$sql = "DELETE FROM `programs` WHERE `channel_id` = :channel_id AND `program_id` = :program_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":channel_id",$channel_id);
	$myrec->bindValue(":program_id",$program_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }

    function schedules_add($mycon, $channel_id, $program_id, $caption, $startdate, $enddate)
    {
	$sql = "INSERT INTO `schedules` SET `channel_id` = :channel_id, `program_id` = :program_id, `caption` = :caption, `startdate` = :startdate, `enddate` = :enddate";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":channel_id",$channel_id);
	$myrec->bindValue(":program_id",$program_id);
	$myrec->bindValue(":caption",$caption);
	$myrec->bindValue(":startdate",$startdate);
	$myrec->bindValue(":enddate",$enddate);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
        
    }
    
    function schedules_delete($mycon, $channel_id, $program_id, $schedule_id)
    {

	$sql = "DELETE FROM `schedules` WHERE `channel_id` = :channel_id AND `program_id` = :program_id AND `schedule_id` = :schedule_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":channel_id",$channel_id);
	$myrec->bindValue(":program_id",$program_id);
	$myrec->bindValue(":schedule_id",$schedule_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }

    
    function articles_add($mycon, $category_id, $headline, $caption, $content, $createdby)
    {
        $thedate = date("Y-m-d H:i:s");

	$sql = "INSERT INTO `articles` SET `category_id` = :category_id
			,`headline` = :headline
			,`caption` = :caption
			,`content` = :content
			,`thedate` = :thedate
			,`createdby` = :createdby";
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":category_id",$category_id);
	$myrec->bindValue(":headline",$headline);
	$myrec->bindValue(":caption",$caption);
	$myrec->bindValue(":content",$content);
	$myrec->bindValue(":thedate",$thedate);
	$myrec->bindValue(":createdby",$createdby);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
        
    }

    function articles_update($mycon, $article_id, $category_id, $headline, $caption, $content)
    {

	$sql = "UPDATE `articles` SET `category_id` = :category_id
			,`headline` = :headline
			,`caption` = :caption
			,`content` = :content WHERE `article_id` = :article_id";
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":category_id",$category_id);
	$myrec->bindValue(":headline",$headline);
	$myrec->bindValue(":caption",$caption);
	$myrec->bindValue(":content",$content);
	$myrec->bindValue(":article_id",$article_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }

    function articles_update_shorturl($mycon, $article_id, $shorturl)
    {
	$sql = "UPDATE `articles` SET `shorturl` = :shorturl WHERE `article_id` = :article_id";
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":shorturl",$shorturl);
	$myrec->bindValue(":article_id",$article_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }

    function articles_delete($mycon, $article_id)
    {

	$sql = "DELETE FROM `articles` WHERE `article_id` = :article_id";
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":article_id",$article_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }
    
    function trailers_add($mycon, $category_id, $headline, $caption, $youtube, $createdby)
    {
        $thedate = date("Y-m-d H:i:s");

	$sql = "INSERT INTO `trailers` SET `category_id` = :category_id
			,`headline` = :headline
			,`caption` = :caption 
			,`youtube` = :youtube
			,`thedate` = :thedate
			,`createdby` = :createdby";
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":category_id",$category_id);
	$myrec->bindValue(":headline",$headline);
	$myrec->bindValue(":caption",$caption);
	$myrec->bindValue(":thedate",$thedate);
	$myrec->bindValue(":youtube",$youtube);
	$myrec->bindValue(":createdby",$createdby);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
        
    }

    function trailers_update($mycon, $trailer_id, $category_id, $headline, $caption, $youtube)
    {

	$sql = "UPDATE `trailers` SET `category_id` = :category_id
			,`headline` = :headline
			,`caption` = :caption 
			,`youtube` = :youtube WHERE `trailer_id` = :trailer_id";
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":category_id",$category_id);
	$myrec->bindValue(":headline",$headline);
	$myrec->bindValue(":caption",$caption);
	$myrec->bindValue(":youtube",$youtube);
	$myrec->bindValue(":trailer_id",$trailer_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }

    function trailers_delete($mycon, $trailer_id)
    {

	$sql = "DELETE FROM `trailers` WHERE `trailer_id` = :trailer_id";
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":trailer_id",$trailer_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }

    
    function news_add($mycon, $headline, $caption, $content, $createdby)
    {
        $thedate = date("Y-m-d H:i:s");

	$sql = "INSERT INTO `news` SET `headline` = :headline
			,`caption` = :caption
			,`content` = :content
			,`thedate` = :thedate
			,`createdby` = :createdby";
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":headline",$headline);
	$myrec->bindValue(":caption",$caption);
	$myrec->bindValue(":content",$content);
	$myrec->bindValue(":thedate",$thedate);
	$myrec->bindValue(":createdby",$createdby);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
        
    }

    function news_update($mycon, $article_id, $headline, $caption, $content)
    {

	$sql = "UPDATE `news` SET `headline` = :headline
			,`caption` = :caption
			,`content` = :content WHERE `article_id` = :article_id";
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":headline",$headline);
	$myrec->bindValue(":caption",$caption);
	$myrec->bindValue(":content",$content);
	$myrec->bindValue(":article_id",$article_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }

    function news_update_shorturl($mycon, $article_id, $shorturl)
    {
	$sql = "UPDATE `news` SET `shorturl` = :shorturl WHERE `article_id` = :article_id";
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":shorturl",$shorturl);
	$myrec->bindValue(":article_id",$article_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }

    function news_delete($mycon, $article_id)
    {

	$sql = "DELETE FROM `news` WHERE `article_id` = :article_id";
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":article_id",$article_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
    }

        


    function transmissions_add($mycon, $name, $position, $caption, $details)
    {
	$sql = "INSERT INTO `transmissions` SET `name` = :name, `position` = :position, `caption` = :caption, `details` = :details ";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":position",$position);
	$myrec->bindValue(":caption",$caption);
	$myrec->bindValue(":details",$details);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
        
    }

    function transmissions_update($mycon, $transmission_id, $name, $position, $caption, $details)
    {
	$sql = "UPDATE `transmissions` SET `name` = :name, `position` = :position, `caption` = :caption, `details` = :details WHERE `transmission_id` = :transmission_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":transmission_id",$transmission_id);
	$myrec->bindValue(":name",$name);
	$myrec->bindValue(":position",$position);
	$myrec->bindValue(":caption",$caption);
	$myrec->bindValue(":details",$details);

        if(!$myrec->execute())
        {
                return false;
        }
        
        return true;
        
    }
    
    function transmissions_update_status($mycon, $transmission_id, $status, $reason, $admin_id)
    {
        $thedate = date("Y-m-d H:i:s");
        
	$sql = "UPDATE `transmissions` SET `status` = :status WHERE `transmission_id` = :transmission_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":transmission_id",$transmission_id);
	$myrec->bindValue(":status",$status);

        if(!$myrec->execute())
        {
                return false;
        }
        
	$sql = "INSERT INTO `transmissions_status` SET `transmission_id` = :transmission_id
                        ,`status` = :status
			,`reason` = :reason
			,`thedate` = :thedate
			,`modifiedby_type` = 0
			,`modifiedby_id` = :admin_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":transmission_id",$transmission_id);
	$myrec->bindValue(":status",$status);
	$myrec->bindValue(":reason",$reason);
	$myrec->bindValue(":thedate",$thedate);
	$myrec->bindValue(":admin_id",$admin_id);
        $myrec->execute();
        
        return true;
    }
        
    
    function transmissions_pictures_add($mycon, $transmission_id)
    {
        $thedate = date("Y-m-d H:i:s");
        
	$sql = "INSERT INTO `transmissions_pictures` SET `transmission_id` = :transmission_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":transmission_id",$transmission_id);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
    }
    
    
    function transmissions_delete($mycon, $transmission_id)
    {

	$sql = "DELETE FROM `transmissions` WHERE `transmission_id` = :transmission_id";
        
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":transmission_id",$transmission_id);

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

    

    function admins_add($mycon, $name, $username, $password)
    {
            $thedate = date("Y-m-d H:i:s");

            $sql = "INSERT INTO `admins` SET `name` = :name
                    ,`username` = :username
                    ,`password` = :password
                    ,`thedate` = :thedate";

            $myrec = $mycon->prepare($sql);
            $myrec->bindValue(":name",$name,PDO::PARAM_STR);
            $myrec->bindValue(":username",$username,PDO::PARAM_STR);
            $myrec->bindValue(":password",$password,PDO::PARAM_STR);
            $myrec->bindValue(":thedate",$thedate,PDO::PARAM_STR);

            if(!$myrec->execute()) return false;

            return $mycon->lastInsertId();

    }


    function admins_update($mycon, $admin_id, $name, $password, $status)
    {
            $thedate = date("Y-m-d H:i:s");

            $sql = "UPDATE `admins` SET `name` = :name
                    ,`password` = :password
                    ,`status` = :status
                    ,`modifiedon` = :modifiedon WHERE `admin_id` = :admin_id";

            $myrec = $mycon->prepare($sql);
            $myrec->bindValue(":admin_id",$admin_id,PDO::PARAM_STR);
            $myrec->bindValue(":name",$name,PDO::PARAM_STR);
            $myrec->bindValue(":password",$password,PDO::PARAM_STR);
            $myrec->bindValue(":status",$status,PDO::PARAM_STR);
            $myrec->bindValue(":modifiedon",$thedate,PDO::PARAM_STR);

            if(!$myrec->execute()) return false;

            return true;

    }


    function admins_delete($mycon, $admin_id)
    {

        $sql = "DELETE FROM `admins` WHERE `admin_id` = :admin_id AND `username` <> 'administrator'";
        $myrec =  $mycon->prepare($sql);
        $myrec->bindValue(":admin_id",$admin_id);

        if(!$myrec->execute())
        {
                return false;
        }
        
	$sql = "DELETE FROM `admins_categories` WHERE `admin_id` = :admin_id";
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":admin_id",$admin_id);
        $myrec->execute();
        
        return true;
    }

    
    function admins_categories_add($mycon, $admin_id, $category_id)
    {

	$sql = "INSERT INTO `admins_categories` SET `admin_id` = :admin_id
			,`category_id` = :category_id";
	$myrec =  $mycon->prepare($sql);
	$myrec->bindValue(":admin_id",$admin_id);
	$myrec->bindValue(":category_id",$category_id);
	$myrec->execute();

        if($myrec->rowCount() < 1)
        {
                return false;
        }
        
        return $mycon->lastInsertId();
        
    }

    function admins_categories_delete($mycon, $admin_id)
    {

	$sql = "DELETE FROM `admins_categories` WHERE `admin_id` = :admin_id";
        
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
 

    function banners_list($mycon, $filter, $param)
    {
		$sql = "SELECT * FROM `banners` WHERE `banner_id` > -1 ";
		if(strlen(trim($sql)) > 3 && is_array($param))
		{
			$sql .= $filter;
			$myrec = $mycon->prepare($sql);
			$myrec->execute($param);
		}
		else
		{
			$sql .= " ORDER BY `banner_id` DESC";
			$myrec = $mycon->query($sql);
		}

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function breakingnews_list($mycon, $filter, $param)
    {
		$sql = "SELECT * FROM `breakingnews` WHERE `item_id` > -1 ";
		if(strlen(trim($sql)) > 3 && is_array($param))
		{
			$sql .= $filter;
			$myrec = $mycon->prepare($sql);
			$myrec->execute($param);
		}
		else
		{
			$sql .= " ORDER BY `item_id` DESC";
			$myrec = $mycon->query($sql);
		}

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function gallery_list($mycon, $filter, $param)
    {
		$sql = "SELECT * FROM `gallery` WHERE `gallery_id` > -1 ";
		if(strlen(trim($sql)) > 3 && is_array($param))
		{
			$sql .= $filter;
			$myrec = $mycon->prepare($sql);
			$myrec->execute($param);
		}
		else
		{
			$sql .= " ORDER BY `gallery_id` DESC";
			$myrec = $mycon->query($sql);
		}

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function gallery_categories($mycon)
    {
        $sql = "SELECT DISTINCT(`category`) FROM `gallery` ORDER BY `category`";
        $myrec = $mycon->query($sql);

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
    

    function categories_list($mycon)
    {
        $sql = "SELECT c.*, (SELECT COUNT(`article_id`) FROM `articles` WHERE `category_id` = c.category_id) AS articlecount FROM `categories` c WHERE `parent_id` = '' ORDER BY `position` ASC";
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
        if(strlen(trim($sql)) > 3 && is_array($param))
        {
                $sql .= $filter;
                $myrec = $mycon->prepare($sql);
                $myrec->execute($param);
        }
        else
        {
                $sql .= " ORDER BY a.`article_id` DESC";
                $myrec = $mycon->query($sql);
        }

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
    
    function trailers_list($mycon, $filter, $param)
    {
        $sql = "SELECT a.*, c.name AS categoryname FROM `trailers` a LEFT JOIN `categories` c ON c.category_id = a.category_id WHERE a.`trailer_id` > -1 ";
        if(strlen(trim($sql)) > 3 && is_array($param))
        {
                $sql .= $filter;
                $myrec = $mycon->prepare($sql);
                $myrec->execute($param);
        }
        else
        {
                $sql .= " ORDER BY a.`trailer_id` DESC";
                $myrec = $mycon->query($sql);
        }

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
        if(strlen(trim($sql)) > 3 && is_array($param))
        {
                $sql .= $filter;
                $myrec = $mycon->prepare($sql);
                $myrec->execute($param);
        }
        else
        {
                $sql .= " ORDER BY `article_id` DESC";
                $myrec = $mycon->query($sql);
        }

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
    

    function adverts_list($mycon)
    {
        $sql = "SELECT * FROM `adverts`";
        $myrec = $mycon->query($sql);
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function channels_categories_list($mycon)
    {
        $sql = "SELECT c.*, (SELECT COUNT(`channel_id`) FROM `channels` WHERE `category_id` = c.category_id) AS channelscount FROM `channels_categories` c ORDER BY `position` ASC";
        $myrec = $mycon->query($sql);
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function channels_categories_get($mycon, $category_id)
    {
        $sql = "SELECT c.*, (SELECT COUNT(`channel_id`) FROM `channels` WHERE `category_id` = c.category_id) AS channelscount FROM `channels_categories` c WHERE `category_id` = :category_id";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":category_id",$category_id);
        $myrec->execute();
        if($myrec->rowCount() < 1) return false;
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }

    function channels_list($mycon)
    {
        $sql = "SELECT c.*, cc.name AS categoryname, (SELECT `program_id` FROM `programs` WHERE `channel_id` = c.channel_id) AS programcount FROM `channels` c LEFT JOIN `channels_categories` cc ON cc.category_id = c.category_id ORDER BY c.`code` ASC ";
        $myrec = $mycon->query($sql);
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function channels_listbycategory($mycon, $category_id)
    {
        $sql = "SELECT c.*, cc.name AS categoryname, (SELECT `program_id` FROM `programs` WHERE `channel_id` = c.channel_id) AS programcount FROM `channels` c LEFT JOIN `channels_categories` cc ON cc.category_id = c.category_id WHERE c.`category_id` = :category_id ORDER BY c.`code` ASC";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":category_id",$category_id);
        $myrec->execute();
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function channels_get($mycon, $channel_id)
    {
        $sql = "SELECT c.*, cc.name AS categoryname, (SELECT `program_id` FROM `programs` WHERE `channel_id` = c.channel_id) AS programcount FROM `channels` c LEFT JOIN `channels_categories` cc ON cc.category_id = c.category_id WHERE c.`channel_id` = :channel_id";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":channel_id",$channel_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
      
    function channels_statuslist($mycon, $channel_id)
    {
        $sql = "SELECT * FROM `channels_status` WHERE `channel_id` = :channel_id ";
                $myrec = $mycon->prepare($sql);
                $myrec->bindValue(":channel_id",$channel_id);
                $myrec->execute();

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function programs_list($mycon)
    {
        $sql = "SELECT p.*, c.name AS channelname FROM `programs` p LEFT JOIN `channels` c ON c.channel_id = p.channel_id";
        $myrec = $mycon->prepare($sql);
        $myrec->execute();
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function programs_listbychannel($mycon, $channel_id)
    {
        $sql = "SELECT * FROM `programs` WHERE `channel_id` = :channel_id";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":channel_id",$channel_id);
        $myrec->execute();
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function programs_get($mycon, $program_id)
    {
        $sql = "SELECT p.*, c.name AS channelname FROM `programs` p LEFT JOIN `channels` c ON c.channel_id = p.channel_id WHERE p.`program_id` = :program_id";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":program_id",$program_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
      
    function programs_statuslist($mycon, $program_id)
    {
        $sql = "SELECT * FROM `programs_status` WHERE `program_id` = :program_id ";
                $myrec = $mycon->prepare($sql);
                $myrec->bindValue(":program_id",$program_id);
                $myrec->execute();

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function schedules_list($mycon, $channel_id, $program_id)
    {
        $sql = "SELECT * FROM `schedules` WHERE `channel_id` = :channel_id AND `program_id` = :program_id";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":channel_id",$channel_id);
        $myrec->bindValue(":program_id",$program_id);
        $myrec->execute();
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function schedules_listbydate($mycon, $channel_id, $program_id, $datefrom, $dateto)
    {
        $sql = "SELECT * FROM `schedules` WHERE `channel_id` = :channel_id AND `program_id` = :program_id AND `startdate` >= :datefrom AND `enddate` <= :dateto";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":channel_id",$channel_id);
        $myrec->bindValue(":program_id",$program_id);
        $myrec->bindValue(":datefrom",$datefrom);
        $myrec->bindValue(":dateto",$dateto);
        $myrec->execute();
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function schedules_get($mycon, $schedule_id)
    {
        $sql = "SELECT s.*, c.name AS channelname, p.name AS programname FROM `schedules` s LEFT JOIN `channels` c ON c.channel_id = s.channel_id LEFT JOIN `programs` p ON p.program_id = s.program_id WHERE s.`schedule_id` = :schedule_id";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":schedule_id",$schedule_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }


    function transmissions_list($mycon)
    {
        $sql = "SELECT c.*, (SELECT COUNT(`transmission_id`) FROM `transmissions_comments` WHERE `transmission_id` = c.transmission_id) AS commentscount FROM `transmissions` c  ORDER BY `position` ASC ";
        $myrec = $mycon->query($sql);
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }

    function transmissions_get($mycon, $transmission_id)
    {
        $sql = "SELECT c.*, (SELECT COUNT(`transmission_id`) FROM `transmissions_comments` WHERE `transmission_id` = c.transmission_id) AS commentscount FROM `transmissions` c WHERE c.`transmission_id` = :transmission_id";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":transmission_id",$transmission_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
      
    function transmissions_statuslist($mycon, $transmission_id)
    {
        $sql = "SELECT * FROM `transmissions_status` WHERE `transmission_id` = :transmission_id ";
                $myrec = $mycon->prepare($sql);
                $myrec->bindValue(":transmission_id",$transmission_id);
                $myrec->execute();

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
      
    function transmissions_pictures($mycon, $transmission_id)
    {
        $sql = "SELECT * FROM `transmissions_pictures` WHERE `transmission_id` = :transmission_id ";
                $myrec = $mycon->prepare($sql);
                $myrec->bindValue(":transmission_id",$transmission_id);
                $myrec->execute();

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
      
    function transmissions_comments_list($mycon, $filter, $param)
    {
        $sql = "SELECT * FROM `transmissions_comments` WHERE `comment_id` > -1 ";
        if(strlen(trim($filter)) > 3 && is_array($param))
        {
                $sql .= $filter;
                $myrec = $mycon->prepare($sql);
                $myrec->execute($param);
        }
        else
        {
                $sql .= " ORDER BY `comment_id` DESC";
                $myrec = $mycon->query($sql);
        }

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
      
    function transmissions_comments_listbytransmission($mycon, $transmission_id)
    {
        $sql = "SELECT * FROM `transmissions_comments` WHERE `transmission_id` = :transmission_id ORDER BY `comment_id` DESC ";
                $myrec = $mycon->prepare($sql);
                $myrec->bindValue(":transmission_id",$transmission_id);
                $myrec->execute();

        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    function admins_list($mycon)
    {
	$sql = "SELECT * FROM `admins` ORDER BY `admin_id` ASC";
        $myrec = $mycon->query($sql);
                
        $alladmins = array();
        $admins = $myrec->fetchAll(PDO::FETCH_ASSOC);
        foreach($admins as $row)
        {
            $row['categories'] = $this->admins_categories($mycon, $row['admin_id']);
            $alladmins[] = $row;
        }
        return $alladmins;
    }
    
    function admins_get($mycon, $admin_id)
    {
        $myrec = $mycon->prepare("SELECT * FROM `admins` WHERE `admin_id` = :admin_id LIMIT 1");
        $myrec->bindValue(":admin_id",$admin_id);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        $article = $myrec->fetch(PDO::FETCH_ASSOC);
        $article['categories'] = $this->admins_categories($mycon, $admin_id);
        return $article;
    }
    
    function admins_getbyusername($mycon, $username)
    {
        $myrec = $mycon->prepare("SELECT * FROM `admins` WHERE `username` = :username LIMIT 1");
        $myrec->bindValue(":username",$username);
        $myrec->execute();
        
        if($myrec->rowCount() < 1) return false;
        
        return $myrec->fetch(PDO::FETCH_ASSOC);
    }
    
    function admins_categories($mycon, $admin_id)
    {
        $sql = "SELECT ac.*, c.name FROM `admins_categories` ac LEFT JOIN `categories` c ON c.category_id = ac.category_id WHERE `admin_id` = :admin_id ";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":admin_id",$admin_id);
        $myrec->execute();
        
        return $myrec->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}///// end class
?>