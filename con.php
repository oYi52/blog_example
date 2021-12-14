<?php 


$dbaddress="localhost";
$dbuser="blog";
$dbsecret="n6x7PPTWyEFxbxkX";
$dbname = $dbuser;

$_con = mysqli_connect($dbaddress, $dbuser, $dbsecret, $dbname);

date_default_timezone_set("Asia/Taipei");
if(mysqli_connect_errno()){
    echo"無法連線 MySQL:" . mysqli_connect_error();
    exit;
}

$_con->query("SET NAMES utf8");


?>