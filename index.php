<?php 

# CRUD參考： https://wenhaoyi.notion.site/MySQL-CRUD-7730c33181594311a4a2e6d156fa8cfb

include_once("con.php");

$sql="SELECT `artid`, `arttitle`, `artdate`, `artclick` FROM `article`";
$query = mysqli_query($_con,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章列表</title>
</head>
<body>
    <h1>文章列表</h1>
    <caption><?php if(isset($_GET['success'])&&$_GET['success']==1){echo "新增成功!!";}  if(isset($_GET['success'])&&$_GET['success']==2){echo "刪除成功!!";} ?></caption>
    <hr>
    <table>
        <thead>
            <tr>
                <th>發佈日期</th>
                <th>文章標題</th>
                <th>點擊數</th>
                <th>動作</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_assoc($query)){ ?>
            <tr>
                <td><?php echo $row['artdate']; ?></td>
                <td><a href="article.php?id=<?php echo $row['artid']; ?>"><?php echo $row['arttitle']; ?></a></td>
                <td><?php echo $row['artclick']; ?></td>
                <td><a href="process.php?action=DELETE&artid=<?php echo $row['artid']; ?>">刪除</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <hr>
    <h2>新增文章</h2>
    
    <form action="process.php" method="POST">
        <label for="arttitle">文章標題</label>
        <input type="text" id="arttitle" name="arttitle" required>
        <br>
        <label for="artcontent">文章內容</label>
        <textarea name="artcontent" id="artcontent" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" name="action" value="新增文章">
    </form>
</body>
</html>