<?php 

include_once("_con.php");

//查詢擁有此ID的文章
$sql="SELECT * FROM `article` WHERE `artid` = '".$_GET['id']."'";
$query = mysqli_query($_con,$sql);
$row=mysqli_fetch_assoc($query);

//新增點擊數
$click_sql="UPDATE `article` SET `artclick` = '".($row['artclick']+1)."' WHERE `article`.`artid` = '".$_GET['id']."';";
$click_query = mysqli_query($_con,$click_sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章內容</title>
</head>
<body>
    <h1><?php echo $row['arttitle']; ?></h1>
    <hr>
    <ul>
        <li>發佈人：<?php echo $row['artposter']; ?></li>
        <li>發佈時間：<?php echo $row['artdate']; ?></li>
    </ul>
    <hr>
    <div>
        <?php echo $row['artcontent']; ?>
    </div>
    <li>點擊數：<?php echo $row['artclick']; ?></li>
    <a href="index.php">回列表</a>
</body>
</html>