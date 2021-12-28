<?php 


session_start();
include_once("_con.php");

$sql="SELECT * FROM `article` WHERE `artid` = '".$_GET['id']."'";
$query = mysqli_query($_con,$sql);
$row=mysqli_fetch_assoc($query);

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
    <h1>編輯文章</h1>
    <form action="process.php" method="POST">
        <label for="arttitle">文章標題</label>
        <input type="text" id="arttitle" name="arttitle" value="<?php echo $row['arttitle']; ?>" required>
        <ul>
            <li>發佈人：<?php echo $row['artposter']; ?></li>
            <li>發佈時間：<?php echo $row['artdate']; ?></li>
        </ul>
        <hr>
        <label for="artcontent">文章內容</label>
        <textarea name="artcontent" id="artcontent" cols="30" rows="10"><?php echo $row['artcontent']; ?></textarea>
        <br>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <input type="submit" name="action" value="儲存編輯">
    </form>
    <a href="index.php">回列表</a>
</body>
</html>