<?php

session_start();

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
    $sql = "UPDATE `article` SET `arttitle`='".$_POST['arttitle']."', `artcontent`='".$_POST['artcontent']."' WHERE `artid` = '".$_POST['id']."';";
    $query = mysqli_query($_con,$sql);
    if($query){
        $flag=3;
    }
}

if(isset($_POST['action'])&&$_POST['action']=="登入帳號"){
    $sql="SELECT `uid`, `upass`, `uname`, `uauth` FROM `user` WHERE `uid` = '".$_POST['uid']."'";
    $query = mysqli_query($_con,$sql);
    $row=mysqli_fetch_assoc($query);
    if(mysqli_num_rows($query)<1){
        header("Location: login.php?error=1");
        exit;
    }else{
        if($_POST['upass']==$row['upass']){
            $_SESSION['login']['id']=$row['uid'];
            $_SESSION['login']['name']=$row['uname'];
            $_SESSION['login']['auth']=$row['uauth'];

            header("Location: index.php?login=1");
            exit;
        }else{
            header("Location: login.php?error=1");
            exit;
        }
    }
}

header("Location: index.php?success=".$flag);
exit;


?>