<?php
//var_dump($_SERVER);
//var_dump($_REQUEST);
@ob_start();
@session_start();
//ini_set('display_errors',1);
//ini_set('display_startup_errors',1);
//error_reporting(-1);
	//require_once("admin/imagecropper.php") 
@header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past

require_once("inc_dbfunctions.php");

if(strpos(CurrentPageURL(),"index.php") === false && strpos(CurrentPageURL(),"/admin") > -1 && getCookie("adminlogin") != "YES")
{
	showAlert("Access denied. Please login.");
	openPage("index.php");
	header("Location: index.php");
}


//check if loging out
if(isset($_GET['logout']))
{
	setcookie(str_rot13("userid"),"",time()-3600);
	setcookie(str_rot13("userlogin"),"",time()-3600);
	setcookie(str_rot13("fullname"),"",time()-3600);
	header("Location: index.php");
}

 //require_once("admin/facebook/ui.php");


//store the full path to the current page so that it can be refreshed at any time
$currentpage = CurrentPageURL();
if(strpos($currentpage,"login.php") === false && strpos($currentpage,"register.php") === false && strpos($currentpage,"actionmanager.php") === false && strpos($currentpage,"inc_") === false) setcookie("CurrentPageURL",CurrentPageURL());

//connect to the database
function databaseConnect()
{
	require("connectionstrings.php");


	$mycon = new PDO("mysql:host=$MYSQL_Server;dbname=$MYSQL_Database;charset=utf8", "$MYSQL_Username", "$MYSQL_Password");	
	$mycon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$mycon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);	
	return $mycon;
}
function databaseConnectDealers()
{
	require("dealer/connectionstrings.php");


	$mycon = new PDO("mysql:host=$MYSQL_Server;dbname=$MYSQL_Database;charset=utf8", "$MYSQL_Username", "$MYSQL_Password");	
	$mycon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$mycon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);	
	return $mycon;
}
//End databaseConnect()///////////////////////////

//Returns the descripted value of the specified cookie id
function getCookie($key)
{
    $key = str_rot13("$key");
    if(isset($_COOKIE["$key"])) return str_rot13($_COOKIE["$key"]);
    return "";
}
//End getCookie()////////////////////

//creates an encrypted cookie
function createCookie($key,$value)
{
	setcookie(str_rot13("$key"),str_rot13("$value"));
}
//End getCookie()////////////////////

//The title of all the pages
function pageTitle()
{
	echo "Selfcare - TSTV :: Connecting your world";
	
}
function seoPageContent()
{
	echo "Selfcare - TSTV :: Connecting your world";
	
}
function seoPageDescriptions()
{
	echo "Selfcare - TSTV :: Connecting your world";
	
}
//End pageTitle()/////////////////////////////////

function getSettings($mycon)
{
    $sql = "SELECT * FROM `settings`";
    $myrec = $mycon->query($sql);
    $myrec->execute();

    $settings = array();

    //loop through settings
    foreach($myrec->fetchAll(PDO::FETCH_ASSOC) as $row)
    {
        $key = $row['item_key'];
        $value = $row['item_value'];
        $settings[$key] = $value;
    }

    return $settings;

}

//function to encrypt user password
function generatePassword($password)
{
    $password = hash('sha256', hash('sha256', $password)); // . "brightisagoodguy1234567890" . strtolower($password));
    
    return $password;
    
}

function getYouTubeVideoId($url)
{
    $video_id = false;
    $url = parse_url($url);
    if (strcasecmp($url['host'], 'youtu.be') === 0)
    {
        #### (dontcare)://youtu.be/<video id>
        $video_id = substr($url['path'], 1);
    }
    elseif (strcasecmp($url['host'], 'www.youtube.com') === 0)
    {
        if (isset($url['query']))
        {
            parse_str($url['query'], $url['query']);
            if (isset($url['query']['v']))
            {
                #### (dontcare)://www.youtube.com/(dontcare)?v=<video id>
                $video_id = $url['query']['v'];
            }
        }
        if ($video_id == false)
        {
            $url['path'] = explode('/', substr($url['path'], 1));
            if (in_array($url['path'][0], array('e', 'embed', 'v')))
            {
                #### (dontcare)://www.youtube.com/(whitelist)/<video id>
                $video_id = $url['path'][1];
            }
        }
    }
    return $video_id;
}

//Return a formated date based on the passed date
function formatDate($mydate,$showtime = "no")
{
	if(strtoupper($showtime) == "YES")
	{
		return date("F d Y, h:ia",strtotime($mydate));
	}
	else
	{
		return date("F d Y",strtotime($mydate));
	}
	
}

function getStatesList()
{
    $states = "Abuja FCT,Abia,Adamawa,Akwa Ibom,Anambra,Bauchi,Bayelsa,Benue,Borno,Cross River,Delta,Ebonyi,Edo,Ekiti,Enugu,Gombe,Imo,Jigawa,Kaduna,Kano,Katsina,Kebbi,Kogi,Kwara,Lagos,Nassarawa,Niger,Ogun,Ondo,Osun,Oyo,Plateau,Rivers,Sokoto,Taraba,Yobe,Zamfara";
    return explode(",",$states);
}

//Process Image cropping
function cropImage($src, $size, $x, $y, $w, $h, $dest)
{
	$targ_w = $w;//$size;
	$targ_h = $h;//$size;
	$jpeg_quality = 100;

	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$x,$y,$targ_w,$targ_h,$w,$h);

	//header('Content-type: image/jpeg');
	//delete the current picture
	//if(file_exists($dest)) unlink($dest);
	imagejpeg($dst_r,$dest,$jpeg_quality);

	//delete original file
	@unlink($src);

}
//END cropImage()////////////////////////////////////////////////


//Returns the full url of the current page
function CurrentPageURL() 
{
	$pageURL = "https://";
	if(strpos(strtolower($_SERVER['SERVER_PROTOCOL']),"https") === false) $pageURL = "http://";
	$pageURL .= $_SERVER['SERVER_PORT'] != '80' ? $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"] : $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	return $pageURL;
}
//End CurrentPageURL()//////////////////////////


//Change row color
function changeRowColor($pos)
{
	
	if($pos % 2 == 1)
	{
		echo "#FFFFFF";
	}
	else
	{
		echo "#EBDDCD";
	}

}
//End changeRowColor()////////////////////////


//Return the name for the month code
function getMonthName($code)
{
	return date("F",strtotime("2012-{$code}-01"));
}


//Opens the requested page
function openPage($page)
{
?>
	<script language="javascript">
    	window.parent.window.parent.window.parent.document.location.href="<?php echo $page ?>";
    </script>
<?php
}
//End openPage()////////////////


//Closes the pop-up window
function closePopupWindow()
{
?>
	<script language='javascript' type='text/javascript'>window.parent.window.$.fancybox.close(); </script>
<?php    
}

//Displays error message
function showErrorMessage($message)
{
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FF0000">
        <tr>
          <td height="38"><div align="center"><span class="style1"><?php echo $message ?>.</span></div></td>
        </tr>
      </table>
<?php
}
//End showErrorMessage()////////////////////

//Displays message
function showMessage($message)
{
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#006600">
        <tr>
          <td><div align="center"><span class="style1"><?php echo $message ?>.</span></div></td>
        </tr>
      </table>
<?php
}
//End showMessage()////////////////////

//Displays a javascript alert
function showAlert($message)
{
?>
	<script language="javascript">
    	alert("<?php echo str_replace("**","\\n",$message) ?>");
    </script>
<?php
}
//End showAlert()///////////////////


//Returns a recordset 
function getRecordset($mycon,$sql,$rowCount = 0,$pageNum = 0)
{
	$query_Recordset1 = $sql;
	$Recordset1 = mysql_query($query_Recordset1, $mycon) or die(mysql_error());
	$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	
	//check if listing all records or not
	if($rowCount > 0)
	{
		if($pageNum < 0) $pageNum = 0;
		//$pageNum = $pageNum +1;
		$startRow = $pageNum * $rowCount;
		$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow, $rowCount);
		$Recordset1 = mysql_query($query_limit_Recordset1, $mycon) or die(mysql_error());
		$all_Recordset1 = mysql_query($query_Recordset1);
		$totalRows = mysql_num_rows($all_Recordset1);
		$totalPages = ceil($totalRows/$rowCount)-1;
	}
	return $Recordset1;
}
//End getRecordset()////////////////////////////////////

//Returns recordset page numbers
function getRecordsetPaging($mycon,$sql,$rowCount = 0,$pageNum=0)
{
	if($rowCount > 0) require("admin/recordPaging.php");
	
}
//End getRecordsetPage()////////////////////////////////////



function imageResize($file, $myheight, $mywidth) 
{ 
//	$mywidth = 350;
//	$myheight = 250;
	
	$picture = getimagesize($file); 
	$width = $picture[0];
	$height = $picture[1];
	//$postpicture = "<img src='$picture' ". imageResize($mysock[0], $mysock[1], 150)." >";


	if ($width > $height) 
	{ 
		//check if the if the size if bigger than 300
		if($width > $mywidth && $height > $myheight)
		{
			$width = $mywidth;
			$height = $myheight;
		}
	} 
	else 
	{ 
		//check if the if the size if bigger than 300
		if($width > $myheight && $height > $mywidth)
		{
			$width = $myheight;
			$height = $mywidth;
		}
	} 
	
	//returns the new sizes in html image tag format...this is so you 
	return "width='$width' height='$height'"; 
	
//						$mysock = getimagesize($picture); 
//						$picture = "<img src='$picture' ". imageResize($mysock[0], $mysock[1], 150)." >";
} 






?>