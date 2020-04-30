<?php
ob_start();

require_once("config.php");

ini_set("memory_limit","60M");
set_time_limit(300);

$mycon = databaseConnect();

require_once("inc_dbfunctions.php");

if(isset($_POST['command']) && $_POST['command'] == "export_dealers_excel") export_dealers_excel($mycon);


function export_dealers_excel($mycon)
{
    header("Expires: 0");
    header("Cache-control: private");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Description: File Transfer");
    header("Content-Type: application/vnd.ms-excel");
    header("Content-disposition: attachment; filename=Dealers_report.csv");

    $dataRead = New DataRead();

    $sql = "";
    $param = array();

    //$param[":createdby"] = $currentuserid;
    if(isset($_POST['search']) && $_POST['search'] != "")
    {
        $search = $_POST['search'];
        $sql .= " AND (`company` LIKE :company OR `firstname` LIKE :firstname OR `surname` LIKE :surname) ";
        $param[":company"] = "%$search%";
        $param[":firstname"] = "%$search%";
        $param[":surname"] = "%$search%";
    }
    if(isset($_POST['regtype']) && $_POST['regtype'] != "")
    {
        $search = $_POST['regtype'];
        $sql .= " AND (`type` = :type) ";
        $param[":type"] = "$search";
    }
    if(isset($_POST['state']) && $_POST['state'] != "")
    {
        $search = $_POST['state'];
        $sql .= " AND (`state` = :state) ";
        $param[":state"] = "$search";
    }
    if(isset($_POST['datefrom']) && $_POST['datefrom'] != "")
    {
        $search = $_POST['datefrom'];
        $sql .= " AND (`thedate` >= :datefrom) ";
        $param[":datefrom"] = "$search 00:00:00";
    }
    if(isset($_POST['dateto']) && $_POST['dateto'] != "")
    {
        $search = $_POST['dateto'];
        $sql .= " AND (`thedate` <= :dateto) ";
        $param[":dateto"] = "$search 23:59:59";
    }

    $dealerslist = $dataRead->dealers_list($mycon,$sql,$param);

    $pos = 0;
    $lines = "";
    $pos = 0;
    foreach($dealerslist as $row)
    {            //var_dump($row);

        $line = "'".$row['dealer_id']."'";
        $line .= ",".str_replace(",",".",$row['type']);
        $line .= ",".str_replace(",",".",$row['company']);
        $line .= ",".str_replace("\r"," ",str_replace("\n"," ",str_replace(",",".",$row['firstname']." ".$row['surname'])));
        $line .= ",".str_replace(",",".",$row['state']);
        $line .= ",".str_replace(",",".",$row['city']);
        $line .= ",".str_replace("\r"," ",str_replace("\n"," ",str_replace(",",".",$row['address'])));
        $line .= ",".str_replace(",",".",$row['phone']);
        $line .= ",".str_replace(",",".",$row['email']);

        $line .= "\r\n";
        $lines .= $line;

    }

    $header = "REG ID,TYPE,COMPANY NAME,CONTACT PERSON,STATE,CITY,ADDRESS,PHONE,EMAIL";
    $header = strtoupper($header);
    echo $header;
    echo "\r\n";
    echo $lines;
}






//connect to the database
function databaseConnect2()
{
	require("connectionstrings.php");


	$mycon = new PDO("mysql:host=$MYSQL_Server;dbname=$MYSQL_Database;charset=utf8", "$MYSQL_Username", "$MYSQL_Password");	
	$mycon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$mycon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);	
	return $mycon;
}
//End databaseConnect()///////////////////////////




?>