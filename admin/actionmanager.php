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
elseif(isset($_POST['command']) && $_POST['command'] == "breakingnews_add")
{
	$actionmanager->breakingnews_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "banners_add")
{
	$actionmanager->banners_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "categories_add")
{
	$actionmanager->categories_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "categories_edit")
{
	$actionmanager->categories_edit();
}
elseif(isset($_POST['command']) && $_POST['command'] == "channels_categories_add")
{
	$actionmanager->channels_categories_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "channels_categories_edit")
{
	$actionmanager->channels_categories_edit();
}
elseif(isset($_POST['command']) && $_POST['command'] == "channels_add")
{
	$actionmanager->channels_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "channels_edit")
{
	$actionmanager->channels_edit();
}
elseif(isset($_POST['command']) && $_POST['command'] == "channels_edit_status")
{
	$actionmanager->channels_update_status();
}
elseif(isset($_POST['command']) && $_POST['command'] == "programs_add")
{
	$actionmanager->programs_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "programs_edit")
{
	$actionmanager->programs_edit();
}
elseif(isset($_POST['command']) && $_POST['command'] == "programs_edit_status")
{
	$actionmanager->programs_update_status();
}
elseif(isset($_POST['command']) && $_POST['command'] == "schedules_add")
{
	$actionmanager->schedules_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "contents_edit")
{
	$actionmanager->contents_update();
}
elseif(isset($_POST['command']) && $_POST['command'] == "articles_add")
{
	$actionmanager->articles_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "articles_edit")
{
	$actionmanager->articles_update();
}
elseif(isset($_POST['command']) && $_POST['command'] == "trailers_add")
{
	$actionmanager->trailers_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "trailers_edit")
{
	$actionmanager->trailers_update();
}
elseif(isset($_POST['command']) && $_POST['command'] == "news_add")
{
	$actionmanager->news_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "news_edit")
{
	$actionmanager->news_update();
}
elseif(isset($_POST['command']) && $_POST['command'] == "adverts_add")
{
	$actionmanager->adverts_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admins_add")
{
	$actionmanager->admins_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "admins_edit")
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
elseif(isset($_POST['command']) && $_POST['command'] == "newsletter_subscribe")
{
    $actionmanager->newsletter_subscribe();
}

elseif(isset($_POST['command']) && $_POST['command'] == "transmissions_add")
{
	$actionmanager->transmissions_add();
}
elseif(isset($_POST['command']) && $_POST['command'] == "transmissions_edit")
{
	$actionmanager->transmissions_edit();
}
elseif(isset($_POST['command']) && $_POST['command'] == "transmissions_edit_status")
{
	$actionmanager->transmissions_update_status();
}
elseif(isset($_POST['command']) && $_POST['command'] == "transmissions_pictures_add")
{
	$actionmanager->transmissions_pictures_add();
}



class Actionmanager
{
    //Process login form
    function admin_login()
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

            $password = generatePassword($password);
            
            $mycon = databaseConnect();
            $dataread = New DataRead();
            $login = $dataread->admins_login($mycon,$username,$password);

            if(!$login)
            {
                    showAlert("You have provided an invalid login details.");
                    return;
            }
            
            if($login['status'] != "5")
            {
                    //showAlert("Your account is not active. Please contact the administrator.");
                    //return;
            }

            createCookie("userid",$login['admin_id']);
            createCookie("adminlogin","YES");
            createCookie("username",$login['username']);
            //createCookie("accounttype",$login['accounttype']);
            createCookie("fullname",$login['name']);

            $loginip = $_SERVER['REMOTE_ADDR'];
            $logindevice = $_SERVER['HTTP_USER_AGENT'];

            $datawrite = New DataWrite();
            $datawrite->admins_logins($mycon,$login['admin_id'],$loginip,$logindevice);
            $datawrite->lastlogin($mycon,$login['admin_id']);

            openPage("articles-list.php");

    }
    //End proLogin()//////////////////

    function department_login($username, $password)
    {
            $mycon = databaseConnect();

            //check if account exists
            //$sql = "SELECT `name`,`department_id` FROM `departments` WHERE `username` = :username AND `password` = :password LIMIT 1";
            $sql = "SELECT `name`,`department_id` FROM `departments` WHERE `username` = :username LIMIT 1";
            //$password = generatePassword($password);

            $stmt = $mycon->prepare($sql);

            $stmt->bindValue(":username",$username,PDO::PARAM_STR);
            //$stmt->bindValue(":password",$password,PDO::PARAM_STR);

            $stmt->execute();

            if($stmt->rowCount() < 1)
            {
                    showAlert("You have provided an invalid login details2. Please try again.");
                    return;
            }

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            createCookie("userid",$row['department_id']);
            createCookie("departmentlogin","YES");
            createCookie("adminlogin","NO");
            createCookie("fullname",$row['name']);

            openPage("departments-gallery.php");

    }
    
    //End proLogin()//////////////////
    function banners_add()
    {
	$name = "";//$_POST['name'];
	$placement = $_POST['placement'];
	$link = $_POST['url'];
	$banner = $_FILES['banner'];
        
        $currentuserid = getCookie("userid");
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
        if(!strpos(strtoupper($banner['type']),"IMAGE") > -1) $msg .= "**Select the banner image to upload";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
                
        $banner_id = $datawrite->banners_add($mycon, $name, $placement, $link);

        if(!$banner_id)
        {
            showAlert("There was an error saving this banner. Please try again.");
            return;
        }
        else
        {
             move_uploaded_file($banner['tmp_name'],"../pictures/banners/$banner_id.jpg");
            
            $datawrite->admin_activities($mycon,$currentuserid,"Created new banner #$banner_id ($name)");
                        
            openPage("banners.php");
        }
    }

    function breakingnews_add()
    {
	$name = $_POST['name'];
	$link = $_POST['url'];
        
        $currentuserid = getCookie("userid");
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled	
	if($name == "")
	{
		showAlert("Please enter the news.");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
                
        $item_id = $datawrite->breakingnew_add($mycon, $name, $link);

        if(!$item_id)
        {
            showAlert("There was an error saving this news. Please try again.");
            return;
        }
        else
        {                        
            openPage("breakingnews.php");
        }
    }


    function categories_add()
    {
	$parent_id = "";//$_POST['parent_id'];
	$name = $_POST['name'];
	$position = 0;//$_POST['position'];
        
        $currentuserid = getCookie("userid");
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($name) < 1) $msg .= "**Enter the category name";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
                
        $category_id = $datawrite->categories_add($mycon, $parent_id, $name, $position);

        if(!$category_id)
        {
            showAlert("There was an error saving this category. Please try again.");
            return;
        }
                
        //save shorturl
        $shorturl = str_replace(" ","-",$name);
        $shorturl = str_replace("\'","",str_replace("\"","",str_replace(",","",str_replace(".","",str_replace(":","",str_replace("#","",str_replace("(","",str_replace(")","",$shorturl))))))));
        $shorturl = str_replace("/","",$shorturl);
        $shorturl = substr($shorturl,0,100);
        //$shorturl = $shorturl."-".$category_id;
        $shorturl = str_replace("-","",$shorturl);
        $shorturl = strtolower($shorturl);
        $datawrite->categories_update_shorturl($mycon, $category_id, trim($shorturl));
        
            $datawrite->admin_activities($mycon,$currentuserid,"Created new category #$category_id ($name)");
                        
            openPage("articles-categories.php");
    }

    function categories_edit()
    {
	$category_id = $_POST['category_id'];
	$name = $_POST['name'];
	$position = 0;//$_POST['position'];
        
        $currentuserid = getCookie("userid");
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($name) < 1) $msg .= "**Enter the category name";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataRead = New DataRead();
        
        $categorydetails = $dataRead->categories_get($mycon, $category_id);
        if(!$categorydetails)
        {
            showAlert("The details of this category could not be loaded.");
            return;
        }
                
        $done = $datawrite->categories_update($mycon, $category_id, $name, $position);
        if(!$done)
        {
            showAlert("There was an error saving this category. Please try again.");
            return;
        }
        
        //save shorturl
        $shorturl = str_replace(" ","-",$name);
        $shorturl = str_replace("\'","",str_replace("\"","",str_replace(",","",str_replace(".","",str_replace(":","",str_replace("#","",str_replace("(","",str_replace(")","",$shorturl))))))));
        $shorturl = str_replace("/","",$shorturl);
        $shorturl = substr($shorturl,0,100);
        //$shorturl = $shorturl."-".$category_id;
        $shorturl = str_replace("-","",$shorturl);
        $shorturl = strtolower($shorturl);
        $datawrite->categories_update_shorturl($mycon, $category_id, trim($shorturl));
        
        $datawrite->admin_activities($mycon,$currentuserid,"Update category #$category_id ($name)");

        openPage("articles-categories.php");
    }

    function contents_update()
    {	
	if(!isset($_POST['contents']) || !is_array($_POST['contents']))
	{
            showAlert("Contents could not be parsed. Please refresh this page and try again.");
            return;
	}

        $currentuserid = getCookie("userid");
        
        $thedate = date("Y-m-d");

        $mycon = databaseConnect();
        $datawrite = New DataWrite();

        //loop through and add or edit
        foreach($_POST['contents'] as $key => $value)
        {
            $done = $datawrite->contents_update($mycon, $key, $value);
        }
                
        //loop through and save images
        foreach($_FILES['pictures']['name'] as $key => $value)
        {
            $picture = $_FILES["pictures"];
            if(strpos(strtoupper($picture['type'][$key]),"IMAGE") > -1) 
            {
                    move_uploaded_file($picture['tmp_name'][$key],"../pictures/$key.jpg");
            }
        }
        
        showAlert("Content has been updated.");
    }

    function articles_add()
    {
        $mycon = databaseConnect();

        $category_id = $_POST['category_id'];
        $headline = $_POST['headline'];
        $content = $_POST['content'];
        $caption = $_POST['caption'];
        $thedate = date("Y-m-d");
        $banner = $_FILES['banner'];
        $image = $_FILES['image'];
        
        $currentuserid = getCookie("userid");
        $currentusername = getCookie("username");

        //check if a page name was specified
        if(strlen($category_id) < 1)
        {
            showAlert("Please select the category for this content.");
            return;

        }
        if(strlen($headline) < 1)
        {
            showAlert("Please enter the headline of this content before saving.");
            return;

        }
        
        $dataWrite = New DataWrite();
        $dataRead = New DataRead();

        $article_id = $dataWrite->articles_add($mycon, $category_id, $headline, $caption, $content, $currentuserid);
        if(!$article_id)
        {
                showAlert("There was an error saving this content. Please try again.");
                return;
        }
        
        //save shorturl
        $shorturl = str_replace(" ","-",$headline);
        $shorturl = str_replace("\'","",str_replace("\"","",str_replace(",","",str_replace(".","",str_replace(":","",str_replace("#","",str_replace("(","",str_replace(")","",$shorturl))))))));
        $shorturl = str_replace("/","",$shorturl);
        $shorturl = substr($shorturl,0,100);
        $shorturl = $shorturl."-".$article_id;
        $shorturl = str_replace("--","-",$shorturl);
        $shorturl = strtolower($shorturl);
        $dataWrite->articles_update_shorturl($mycon, $article_id, trim($shorturl));
        
        //save the images
        if(strpos(strtoupper($banner['type']),"IMAGE") > -1) 
        {
                move_uploaded_file($banner['tmp_name'],"../pictures/articles/{$article_id}_banner.jpg");
        }
        if(strpos(strtoupper($image['type']),"IMAGE") > -1) 
        {
                move_uploaded_file($image['tmp_name'],"../pictures/articles/{$article_id}_image.jpg");
        }

        showAlert("Done!!");
        openPage("articles-list.php");
    }

    function articles_update()
    {
        $mycon = databaseConnect();

        $category_id = $_POST['category_id'];
        $article_id = $_POST['article_id'];
        $headline = $_POST['headline'];
        $content = $_POST['content'];
        $caption = $_POST['caption'];
        $thedate = date("Y-m-d");
        $image = $_FILES['image'];
        $banner = $_FILES['banner'];
        
        $currentuserid = getCookie("userid");
        $currentusername = getCookie("username");

        //check if a page name was specified
        if(strlen($category_id) < 1)
        {
            showAlert("Please select the category for this content.");
            return;
        }
        if(strlen($headline) < 1)
        {
            showAlert("Please enter the headline of this content before saving.");
            return;
        }
        
        $dataWrite = New DataWrite();
        $dataRead = New DataRead();
        
        $articledetails = $dataRead->articles_get($mycon, $article_id);
        if(!$articledetails)
        {
            showAlert("The details of this article could not be loaded. Please refresh this page and try again.");
            return;
        }

        $done = $dataWrite->articles_update($mycon, $article_id, $category_id, $headline, $caption, $content);
        if(!$done)
        {
                showAlert("There was an error saving this content. Please try again.");
                return;
        }
        
        //save shorturl
        $shorturl = str_replace(" ","-",$headline);
        $shorturl = str_replace("\'","",str_replace("\"","",str_replace(",","",str_replace(".","",str_replace(":","",str_replace("#","",str_replace("(","",str_replace(")","",$shorturl))))))));
        $shorturl = str_replace("/","",$shorturl);
        $shorturl = substr($shorturl,0,100);
        $shorturl = $shorturl."-".$article_id;
        $shorturl = str_replace("--","-",$shorturl);
        $shorturl = strtolower($shorturl);
        $dataWrite->articles_update_shorturl($mycon, $article_id, trim($shorturl));
        
        //save the images
        if(strpos(strtoupper($banner['type']),"IMAGE") > -1) 
        {
                move_uploaded_file($banner['tmp_name'],"../pictures/articles/{$article_id}_banner.jpg");
        }
        if(strpos(strtoupper($image['type']),"IMAGE") > -1) 
        {
                move_uploaded_file($image['tmp_name'],"../pictures/articles/{$article_id}_image.jpg");
        }

        showAlert("Done!!");
        openPage("articles-list.php");
    }
    
    function trailers_add()
    {
        $mycon = databaseConnect();

        $category_id = $_POST['category_id'];
        $youtube = $_POST['youtube'];
        $headline = $_POST['headline'];
        $caption = $_POST['caption'];
        $thedate = date("Y-m-d");
        $image = $_FILES['image'];
        
        $currentuserid = getCookie("userid");
        $currentusername = getCookie("username");

        //check if a page name was specified
        if(strlen($category_id) < 1)
        {
            showAlert("Please select the category for this content.");
            return;

        }
        if(strlen($headline) < 1)
        {
            showAlert("Please enter the headline of this content before saving.");
            return;

        }
        if(strlen($youtube) < 10)
        {
            showAlert("Please enter the youtube video url.");
            return;
        }
        
        $dataWrite = New DataWrite();
        $dataRead = New DataRead();

        $trailer_id = $dataWrite->trailers_add($mycon, $category_id, $headline, $caption, $youtube, $currentuserid);
        if(!$trailer_id)
        {
                showAlert("There was an error saving this content. Please try again.");
                return;
        }
        
        //save shorturl
        $shorturl = str_replace(" ","-",$headline);
        $shorturl = str_replace("\'","",str_replace("\"","",str_replace(",","",str_replace(".","",str_replace(":","",str_replace("#","",str_replace("(","",str_replace(")","",$shorturl))))))));
        $shorturl = str_replace("/","",$shorturl);
        $shorturl = substr($shorturl,0,100);
        $shorturl = $shorturl."-".$trailer_id;
        $shorturl = str_replace("--","-",$shorturl);
        $shorturl = strtolower($shorturl);
        $dataWrite->articles_update_shorturl($mycon, $trailer_id, trim($shorturl));
        
        //save the images
        if(strpos(strtoupper($image['type']),"IMAGE") > -1) 
        {
                move_uploaded_file($image['tmp_name'],"../pictures/trailers/{$trailer_id}.jpg");
        }

        showAlert("Done!!");
        openPage("trailers-list.php");
    }

    function trailers_update()
    {
        $mycon = databaseConnect();

        $category_id = $_POST['category_id'];
        $trailer_id = $_POST['trailer_id'];
        $youtube = $_POST['youtube'];
        $headline = $_POST['headline'];
        $caption = $_POST['caption'];
        $thedate = date("Y-m-d");
        $image = $_FILES['image'];
        
        $currentuserid = getCookie("userid");
        $currentusername = getCookie("username");

        //check if a page name was specified
        if(strlen($category_id) < 1)
        {
            showAlert("Please select the category for this content.");
            return;
        }
        if(strlen($headline) < 1)
        {
            showAlert("Please enter the headline of this content before saving.");
            return;
        }
        if(strlen($youtube) < 10)
        {
            showAlert("Please enter the youtube video url.");
            return;
        }
        
        $dataWrite = New DataWrite();
        $dataRead = New DataRead();
        
        $trailerdetails = $dataRead->trailers_get($mycon, $trailer_id);
        if(!$trailerdetails)
        {
            showAlert("The details of this trailer could not be loaded. Please refresh this page and try again.");
            return;
        }

        $done = $dataWrite->trailers_update($mycon, $trailer_id, $category_id, $headline, $caption, $youtube);
        if(!$done)
        {
                showAlert("There was an error saving this content. Please try again.");
                return;
        }
        
        //save shorturl
        $shorturl = str_replace(" ","-",$headline);
        $shorturl = str_replace("\'","",str_replace("\"","",str_replace(",","",str_replace(".","",str_replace(":","",str_replace("#","",str_replace("(","",str_replace(")","",$shorturl))))))));
        $shorturl = str_replace("/","",$shorturl);
        $shorturl = substr($shorturl,0,100);
        $shorturl = $shorturl."-".$trailer_id;
        $shorturl = str_replace("--","-",$shorturl);
        $shorturl = strtolower($shorturl);
        $dataWrite->articles_update_shorturl($mycon, $trailer_id, trim($shorturl));
        
        //save the images
        if(strpos(strtoupper($image['type']),"IMAGE") > -1) 
        {
                move_uploaded_file($image['tmp_name'],"../pictures/trailers/{$trailer_id}.jpg");
        }

        showAlert("Done!!");
        openPage("trailers-list.php");
    }

    function news_add()
    {
        $mycon = databaseConnect();

        $headline = $_POST['headline'];
        $content = $_POST['content'];
        $caption = $_POST['caption'];
        $thedate = date("Y-m-d");
        $banner = $_FILES['banner'];
        $image = $_FILES['image'];
        
        $currentuserid = getCookie("userid");
        $currentusername = getCookie("username");

        //check if a page name was specified
        if(strlen($headline) < 1)
        {
            showAlert("Please enter the headline of this content before saving.");
            return;

        }
        
        $dataWrite = New DataWrite();
        $dataRead = New DataRead();

        $article_id = $dataWrite->news_add($mycon, $headline, $caption, $content, $currentuserid);
        if(!$article_id)
        {
                showAlert("There was an error saving this content. Please try again.");
                return;
        }
        
        //save shorturl
        $shorturl = str_replace(" ","-",$headline);
        $shorturl = str_replace("\'","",str_replace("\"","",str_replace(",","",str_replace(".","",str_replace(":","",str_replace("#","",str_replace("(","",str_replace(")","",$shorturl))))))));
        $shorturl = str_replace("/","",$shorturl);
        $shorturl = substr($shorturl,0,100);
        $shorturl = $shorturl."-".$article_id;
        $shorturl = str_replace("--","-",$shorturl);
        $shorturl = strtolower($shorturl);
        $dataWrite->news_update_shorturl($mycon, $article_id, trim($shorturl));
        
        //save the images
        if(strpos(strtoupper($banner['type']),"IMAGE") > -1) 
        {
                move_uploaded_file($banner['tmp_name'],"../pictures/news/{$article_id}_banner.jpg");
        }
        if(strpos(strtoupper($image['type']),"IMAGE") > -1) 
        {
                move_uploaded_file($image['tmp_name'],"../pictures/news/{$article_id}_image.jpg");
        }

        showAlert("Done!!");
        openPage("news-list.php");
    }

    function news_update()
    {
        $mycon = databaseConnect();

        $article_id = $_POST['article_id'];
        $headline = $_POST['headline'];
        $content = $_POST['content'];
        $caption = $_POST['caption'];
        $thedate = date("Y-m-d");
        $image = $_FILES['image'];
        $banner = $_FILES['banner'];
        
        $currentuserid = getCookie("userid");
        $currentusername = getCookie("username");

        //check if a page name was specified
        if(strlen($headline) < 1)
        {
            showAlert("Please enter the headline of this content before saving.");
            return;
        }
        
        $dataWrite = New DataWrite();
        $dataRead = New DataRead();
        
        $articledetails = $dataRead->news_get($mycon, $article_id);
        if(!$articledetails)
        {
            showAlert("The details of this article could not be loaded. Please refresh this page and try again.");
            return;
        }

        $done = $dataWrite->news_update($mycon, $article_id, $headline, $caption, $content);
        if(!$done)
        {
                showAlert("There was an error saving this content. Please try again.");
                return;
        }
        
        //save shorturl
        $shorturl = str_replace(" ","-",$headline);
        $shorturl = str_replace("\'","",str_replace("\"","",str_replace(",","",str_replace(".","",str_replace(":","",str_replace("#","",str_replace("(","",str_replace(")","",$shorturl))))))));
        $shorturl = str_replace("/","",$shorturl);
        $shorturl = substr($shorturl,0,100);
        $shorturl = $shorturl."-".$article_id;
        $shorturl = str_replace("--","-",$shorturl);
        $shorturl = strtolower($shorturl);
        $dataWrite->news_update_shorturl($mycon, $article_id, trim($shorturl));
        
        //save the images
        if(strpos(strtoupper($banner['type']),"IMAGE") > -1) 
        {
                move_uploaded_file($banner['tmp_name'],"../pictures/news/{$article_id}_banner.jpg");
        }
        if(strpos(strtoupper($image['type']),"IMAGE") > -1) 
        {
                move_uploaded_file($image['tmp_name'],"../pictures/news/{$article_id}_image.jpg");
        }

        showAlert("Done!!");
        openPage("news-list.php");
    }
        

    function adverts_add()
    {
	$type = $_POST['type'];
	$name = $_POST['name'];
	$link = $_POST['link'];
	$code = "";//$_POST['content'];
	$banner = $_FILES['banner'];
        
        $currentuserid = getCookie("userid");
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($name) < 1) $msg .= "**Enter the advert name";
        if(strlen($code) < 10 && strpos(strtoupper($banner['type']),"IMAGE") === false) $msg .= "**Paste the advert code or select an image to upload";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
                
        $advert_id = $datawrite->adverts_add($mycon, $type, $name, $code, $link);

        if(!$advert_id)
        {
            showAlert("There was an error saving this category. Please try again.");
            return;
        }
                
        if(strpos(strtoupper($banner['type']),"IMAGE") > -1) 
        {
            move_uploaded_file($banner['tmp_name'],"../pictures/adverts/{$advert_id}.jpg");
        }
        
        $datawrite->admin_activities($mycon,$currentuserid,"Created new advert #$advert_id ($name)");

        openPage("adverts.php");
    }

    function channels_categories_add()
    {
	$parent_id = "";//$_POST['parent_id'];
	$name = $_POST['name'];
	$caption = $_POST['caption'];
	$position = $_POST['position'];
        
        $currentuserid = getCookie("userid");
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($name) < 1) $msg .= "**Enter the category name";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
                
        $category_id = $datawrite->channels_categories_add($mycon, $name, $caption, $position);

        if(!$category_id)
        {
            showAlert("There was an error saving this category. Please try again.");
            return;
        }
        
        $datawrite->admin_activities($mycon,$currentuserid,"Created new channel category #$category_id ($name)");
                        
        openPage("channels-categories.php");
    }

    function channels_categories_edit()
    {
	$category_id = $_POST['category_id'];
	$name = $_POST['name'];
	$caption = $_POST['caption'];
	$position = $_POST['position'];
        
        $currentuserid = getCookie("userid");
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($name) < 1) $msg .= "**Enter the category name";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataRead = New DataRead();
        
        $categorydetails = $dataRead->channels_categories_get($mycon, $category_id);
        if(!$categorydetails)
        {
            showAlert("The details of this category could not be loaded.");
            return;
        }
                
        $done = $datawrite->channels_categories_update($mycon, $category_id, $name, $caption, $position);
        if(!$done)
        {
            showAlert("There was an error saving this category. Please try again.");
            return;
        }
        
        $datawrite->admin_activities($mycon,$currentuserid,"Update channel category #$category_id ($name)");

        openPage("channels-categories.php");
    }

    function channels_add()
    {
	$code = $_POST['code'];
	$name = $_POST['name'];
	$category = $_POST['category'];
	$position = $_POST['position'];
	$caption = $_POST['caption'];
	$details = $_POST['details'];
	$logo = $_FILES['logo'];
        
        $currentuserid = getCookie("userid");
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($category) < 1) $msg .= "**Select the channel category";
	if(strlen($name) < 1) $msg .= "**Enter the channel name";
	if(strlen($code) < 1) $msg .= "**Enter the channel code";
        if(strpos(strtoupper($logo['type']),"IMAGE") === false) $msg .= "**Select the channel logo to upload";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
                
        $channel_id = $datawrite->channels_add($mycon, $category, $code, $name, $position, $caption, $details);

        if(!$channel_id)
        {
            showAlert("There was an error saving this channel. Please try again.");
            return;
        }
                
        if(strpos(strtoupper($logo['type']),"IMAGE") > -1) 
        {
            move_uploaded_file($logo['tmp_name'],"../pictures/channels/{$channel_id}.jpg");
        }
        
        $datawrite->admin_activities($mycon,$currentuserid,"Created new channel #$channel_id ($name)");

        openPage("channels-view.php?code=$channel_id");
    }

    function channels_edit()
    {
	$channel_id = $_POST['channel_id'];
	$code = $_POST['code'];
	$name = $_POST['name'];
	$position = $_POST['position'];
	$caption = $_POST['caption'];
	$details = $_POST['details'];
	$logo = $_FILES['logo'];
        
        $currentuserid = getCookie("userid");
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($name) < 1) $msg .= "**Enter the channel name";
	if(strlen($code) < 1) $msg .= "**Enter the channel code";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
                
        $done = $datawrite->channels_update($mycon, $channel_id, $name, $code, $position, $caption, $details);

        if(!$done)
        {
            showAlert("There was an error saving this channel. Please try again.");
            return;
        }
                
        if(strpos(strtoupper($logo['type']),"IMAGE") > -1) 
        {
            move_uploaded_file($logo['tmp_name'],"../pictures/channels/{$channel_id}.jpg");
        }
        
        $datawrite->admin_activities($mycon,$currentuserid,"Updated channel #$channel_id ($name)");

        openPage("channels-view.php?code=$channel_id");
    }
    
    function channels_update_status()
    {
	$channel_id = $_POST['channel_id'];
	$status = $_POST['status'];
	$reason = $_POST['reason'];
        $currentuserid = getCookie("userid");
        
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
        
        //get the channel details
        $channeldetails = $dataread->channels_get($mycon,$channel_id);
        if(!$channeldetails)
        {
		showAlert("The details of this channel could not be loaded. Please refresh this page and try again");
		return;
        }
        
        //check if status was changed
        if($status == $channeldetails['status'])
        {
		showAlert("The channel status was not changed.");
		return;            
        }
        
        $done = $datawrite->channels_update_status($mycon, $channel_id, $status, $reason, $currentuserid);
        
        if(!$done)
        {
            showAlert("There was an error updating this channel. Please try again.");
            return;
        }
        else
        {

            $datawrite->admin_activities($mycon,$currentuserid,"Updated channel status for #$channel_id from ".$channeldetails['status']." to ".$status);
            openPage("channels-view.php?code=$channel_id");
        }
    }
   
    function programs_add()
    {
	$channel_id = $_POST['channel_id'];
	$name = $_POST['name'];
	$caption = $_POST['caption'];
	$logo = $_FILES['logo'];
        
        $currentuserid = getCookie("userid");
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($name) < 1) $msg .= "**Enter the program name";
        if(strpos(strtoupper($logo['type']),"IMAGE") === false) $msg .= "**Select the program banner to upload";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
                
        $program_id = $datawrite->programs_add($mycon, $channel_id, $name, $caption);

        if(!$program_id)
        {
            showAlert("There was an error saving this program. Please try again.");
            return;
        }
                
        if(strpos(strtoupper($logo['type']),"IMAGE") > -1) 
        {
            move_uploaded_file($logo['tmp_name'],"../pictures/programs/{$program_id}.jpg");
        }
        
        $datawrite->admin_activities($mycon,$currentuserid,"Created new program #$program_id ($name)");

        openPage("programs-schedules-add.php?code=$program_id");
    }

    function programs_edit()
    {
	$program_id = $_POST['program_id'];
	$name = $_POST['name'];
	$caption = $_POST['caption'];
	$logo = $_FILES['logo'];
        
        $currentuserid = getCookie("userid");
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($name) < 1) $msg .= "**Enter the program name";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
                
        $done = $datawrite->programs_update($mycon, $program_id, $name, $caption);

        if(!$done)
        {
            showAlert("There was an error saving this program. Please try again.$program_id");
            return;
        }
                
        if(strpos(strtoupper($logo['type']),"IMAGE") > -1) 
        {
            move_uploaded_file($logo['tmp_name'],"../pictures/programs/{$program_id}.jpg");
        }
        
        $datawrite->admin_activities($mycon,$currentuserid,"Updated program #$program_id ($name)");

        openPage("programs-view.php?code=$program_id");
    }
    
    function programs_update_status()
    {
	$program_id = $_POST['program_id'];
	$status = $_POST['status'];
	$reason = $_POST['reason'];
        
        $thedate = date("Y-m-d");
        $currentuserid = getCookie("userid");

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
        
        //get the program details
        $programdetails = $dataread->programs_get($mycon,$program_id);
        if(!$programdetails)
        {
		showAlert("The details of this program could not be loaded. Please refresh this page and try again");
		return;
        }
        
        //check if status was changed
        if($status == $programdetails['status'])
        {
		showAlert("The program status was not changed.");
		return;            
        }
        
        $done = $datawrite->programs_update_status($mycon, $program_id, $status, $reason, $currentuserid);
        
        if(!$done)
        {
            showAlert("There was an error updating this program. Please try again.");
            return;
        }
        else
        {

            $datawrite->admin_activities($mycon,$currentuserid,"Updated program status for #$program_id from ".$programdetails['status']." to ".$status);
            openPage("programs-view.php?code=$program_id");
        }
    }
   

    function schedules_add()
    {
	$program_id = $_POST['program_id'];
	$startdate = $_POST['startdate'];
	$starthour = $_POST['starthour'];
	$startminute = $_POST['startminute'];
	$enddate = $_POST['enddate'];
	$endhour = $_POST['endhour'];
	$endminute = $_POST['endminute'];
	$caption = $_POST['caption'];
	$logo = $_FILES['logo'];
        
        $currentuserid = getCookie("userid");
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if($startdate == "") $msg .= "**Select the start date";
	if($enddate == "") $msg .= "**Select the end date";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
        
        $starthour = ($starthour < 10) ? "0$starthour" : $starthour;
        $startminute = ($startminute < 10) ? "0$startminute" : $startminute;
        $endhour = ($endhour < 10) ? "0$endhour" : $endhour;
        $endminute = ($endminute < 10) ? "0$endminute" : $endminute;
        $startdatetime = $startdate." ".$starthour.":".$startminute.":00";
        $enddatetime = $enddate." ".$endhour.":".$endminute.":00";
        
        //check if start date is higher than end date
        if(strtotime($enddatetime) <= strtotime($startdatetime))
	{
            showAlert("The start date and time can not be later than the end date and time($startdatetime)($enddatetime)");
            return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataRead = New DataRead();
        
        //get the program details
        $programdetails = $dataRead->programs_get($mycon, $program_id);
        if(!$programdetails)
	{
            showAlert("The detailt of this program could not be loaded. Please refresh this page and try again.");
            return;
	}
                
        $schedule_id = $datawrite->schedules_add($mycon, $programdetails['channel_id'], $programdetails['program_id'], $caption, $startdatetime, $enddatetime);

        if(!$schedule_id)
        {
            showAlert("There was an error saving this schedule. Please try again.");
            return;
        }
                
        if(strpos(strtoupper($logo['type']),"IMAGE") > -1) 
        {
            move_uploaded_file($logo['tmp_name'],"../pictures/schedules/{$program_id}.jpg");
        }
        
        $datawrite->admin_activities($mycon,$currentuserid,"Created new schedule #$schedule_id ($program_id)");
        showAlert("The schedule has been added.");

        //openPage("programs-schedules-add.php?code=$program_id");
    }


    function newsletter_subscribe()
    {
        $mycon = databaseConnect();

        $email = $_POST['email'];

        $msg = "";
        if(count(explode("@",$email)) < 2)
        {
            showAlert("Please enter your valid email address.");
            return;
        }

        $thedate = date("Y-m-d H:i:s");
        $sql = "INSERT IGNORE INTO `mailinglist` SET `email` = :email,`groupname` = 'website',`thedate` = :thedate";
        $myrec = $mycon->prepare($sql);
        $myrec->bindValue(":email",$email);
        $myrec->bindValue(":thedate",$thedate);

        if(!$myrec->execute())
        {
            //var_dump($mycon->errorInfo());
            showAlert("There was an error processing your request. Please try again later");
            return;
        }
        else
        {

            showAlert("Thank you! you have been subscribed.");
            //header("Location: actionmanager.php?fake=yes");
        }
    }
    

    function transmissions_add()
    {
	$name = $_POST['name'];
	$position = $_POST['position'];
	$caption = $_POST['caption'];
	$details = $_POST['details'];
	$logo = $_FILES['logo'];
        
        $currentuserid = getCookie("userid");
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($name) < 1) $msg .= "**Enter the transmission name";
        if(strpos(strtoupper($logo['type']),"IMAGE") === false) $msg .= "**Select the channel logo to upload";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
                
        $transmission_id = $datawrite->transmissions_add($mycon, $name, $position, $caption, $details);

        if(!$transmission_id)
        {
            showAlert("There was an error saving this transmission. Please try again.");
            return;
        }
                
        if(strpos(strtoupper($logo['type']),"IMAGE") > -1) 
        {
            move_uploaded_file($logo['tmp_name'],"../pictures/transmissions/{$transmission_id}.jpg");
        }

        openPage("transmissions-pictures.php?code=$transmission_id");
    }

    function transmissions_edit()
    {
	$transmission_id = $_POST['transmission_id'];
	$name = $_POST['name'];
	$position = $_POST['position'];
	$caption = $_POST['caption'];
	$details = $_POST['details'];
	$logo = $_FILES['logo'];
        
        $currentuserid = getCookie("userid");
        
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
	if(strlen($name) < 1) $msg .= "**Enter the transmission name";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
                
        $done = $datawrite->transmissions_update($mycon, $transmission_id, $name, $position, $caption, $details);

        if(!$done)
        {
            showAlert("There was an error saving this transmission. Please try again.");
            return;
        }
                
        if(strpos(strtoupper($logo['type']),"IMAGE") > -1) 
        {
            move_uploaded_file($logo['tmp_name'],"../pictures/transmissions/{$transmission_id}.jpg");
        }

        openPage("transmissions-view.php?code=$transmission_id");
    }
    
    function transmissions_update_status()
    {
	$transmission_id = $_POST['transmission_id'];
	$status = $_POST['status'];
	$reason = $_POST['reason'];
        $currentuserid = getCookie("userid");
        
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
        
        //get the channel details
        $transmissiondetails = $dataread->transmissions_get($mycon,$transmission_id);
        if(!$transmissiondetails)
        {
		showAlert("The details of this transmission could not be loaded. Please refresh this page and try again");
		return;
        }
        
        //check if status was changed
        if($status == $transmissiondetails['status'])
        {
		showAlert("The transmission status was not changed.");
		return;            
        }
        
        $done = $datawrite->transmissions_update_status($mycon, $transmission_id, $status, $reason, $currentuserid);
        
        if(!$done)
        {
            showAlert("There was an error updating this transmission. Please try again.");
            return;
        }
        else
        {

            //$datawrite->admin_activities($mycon,$currentuserid,"Updated channel status for #$channel_id from ".$channeldetails['status']." to ".$status);
            openPage("transmissions-view.php?code=$transmission_id");
        }
    }
       
    function transmissions_pictures_add()
    {
	$transmission_id = $_POST['transmission_id'];
	$picture = $_FILES['picture'];
        $currentuserid = getCookie("userid");
        
        $thedate = date("Y-m-d");

	//check if the fields where filled
	$msg = "";
        if(strpos(strtoupper($picture['type']),"IMAGE") === false) $msg .= "**Select the picture to upload";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}
	

        $mycon = databaseConnect();
        $datawrite = New DataWrite();
        $dataread = New DataRead();
        
        //get the channel details
        $transmissiondetails = $dataread->transmissions_get($mycon,$transmission_id);
        if(!$transmissiondetails)
        {
		showAlert("The details of this transmission could not be loaded. Please refresh this page and try again");
		return;
        }
        
        $picture_id = $datawrite->transmissions_pictures_add($mycon, $transmission_id);
        
        if(!$picture_id)
        {
            showAlert("There was an error saving this picture. Please try again.");
            return;
        }
        else
        {
            move_uploaded_file($picture['tmp_name'],"../pictures/transmissions/pictures/{$picture_id}.jpg");

            //$datawrite->admin_activities($mycon,$currentuserid,"Updated channel status for #$channel_id from ".$channeldetails['status']." to ".$status);
            openPage("transmissions-pictures.php?code=$transmission_id");
        }
    }
       
        

    function admins_add()
    {
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
                
        $thedate = date("Y-m-d");
        
        $currentuserid = getCookie("userid");

	//check if the fields where filled
	$msg = "";
	if(strlen($name) < 1) $msg .= "**Enter the admin name.";
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
        
        $dataWrite = New DataWrite();
        $admin_id = $dataWrite->admins_add($mycon, $name, $username, $password);
        
        if(!$admin_id)
        {
            showAlert("There was an error saving this admin. Please try again.");
            return;
        }
        
        //save the categories
        if(isset($_POST['category_id']) && is_array($_POST['category_id']))
        {
            foreach($_POST['category_id'] as $category_id)
            {
                $dataWrite->admins_categories_add($mycon, $admin_id, $category_id);
            }
        }
        
        $dataWrite->admin_activities($mycon,$currentuserid,"Created new admin #$admin_id ($name)");
        openPage("admins-list.php");
    }


    function admins_update()
    {
	$admin_id = $_POST['admin_id'];
        $name = $_POST['name'];
	$status = "";//$_POST['status'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
        
        $thedate = date("Y-m-d");
        
        $currentuserid = getCookie("userid");

	//check if the fields where filled
	$msg = "";
	if(strlen($name) < 1) $msg .= "**Enter the name.";
	if(strlen($password) > 0 && $password2 != $password) $msg .= "**The password confirmation does not match.";
	
	if($msg != "")
	{
		showAlert("Please correct the following before saving:**$msg");
		return;
	}

        $mycon = databaseConnect();        
        $dataread = New DataRead();        
        $dataWrite = New DataWrite();
	
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
        
        $done = $dataWrite->admins_update($mycon, $admin_id, $name, $password, $status);
        
        if(!$done)
        {
            showAlert("There was an error saving this admin. Please try again.");
            return;
        }
        
        //save the categories
        $dataWrite->admins_categories_delete($mycon, $admin_id);
        if(isset($_POST['category_id']) && is_array($_POST['category_id']))
        {
            foreach($_POST['category_id'] as $category_id)
            {
                $dataWrite->admins_categories_add($mycon, $admin_id, $category_id);
            }
        }

        showAlert("The details has been updated.");
        $dataWrite->admin_activities($mycon,$currentuserid,"Updated admin details #$admin_id ($name)");
        openPage("admins-list.php");
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