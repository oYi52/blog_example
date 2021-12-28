<?php

$flag=0;

include_once("_con.php");

if(isset($_POST['action'])&&$_POST['action']=="新增文章"){
    $sql = "INSERT INTO `article` (`arttitle`, `artcontent`, `artposter`) VALUES ('".$_POST['arttitle']."', '".$_POST['artcontent']."','管理者');";
    $query = mysqli_query($_con,$sql);
    if($query){
        $flag=1;
    }
}

if(isset($_GET['action'])&&$_GET['action']=="DELETE"){
    $sql="DELETE FROM `article` WHERE `artid` = '".$_GET['artid']."'";
    $query = mysqli_query($_con,$sql);
    if($query){
        $flag=2;
    }
}

if(isset($_POST['action'])&&$_POST['action']=="儲存編輯"){
    $sql = "UPDATE `article` SET `arttitle`='".$_POST['arttitle']."', `artcontent`='".$_POST['artcontent']."' WHERE `artid` = '".$_POST['artid']."';";
    $query = mysqli_query($_con,$sql);
    if($query){
        $flag=3;
    }
}

header("Location: index.php?success=".$flag);
exit;


?>