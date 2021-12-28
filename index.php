<?php 

session_start();

# CRUD參考： https://wenhaoyi.notion.site/MySQL-CRUD-7730c33181594311a4a2e6d156fa8cfb

include_once("_con.php");

$sql="SELECT `artid`, `arttitle`, `artdate`, `artclick`, `artposter` FROM `article`";
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
    <?php if(isset($_SESSION['login'])){echo "您好，".$_SESSION['login']['name'];echo ' <a href=\'logout.php\'>登出</a>';}else{echo '<a href=\'login.php\'>登入</a>'; } ?>
    
    <caption>
        <?php 
        if(isset($_GET['success'])&&$_GET['success']==1){echo "新增成功!!";}  
        if(isset($_GET['success'])&&$_GET['success']==2){echo "刪除成功!!";} 
        if(isset($_GET['success'])&&$_GET['success']==3){echo "編輯成功!!";} 
        if(isset($_GET['login'])&&$_GET['login']==1){echo "登入成功!!";} 
        if(isset($_GET['login'])&&$_GET['login']==0){echo "登出成功!!";} 

        ?>
    </caption>
    <hr>
    <table>
        <thead>
            <tr>
                <th>發佈日期</th>
                <th>文章標題</th>
                <th>發佈人</th>
                <th>點擊數</th>
                <th>動作</th> 
            </tr>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_assoc($query)){ ?>
            <tr>
                <td><?php echo $row['artdate']; ?></td>
                <td><a href="article.php?id=<?php echo $row['artid']; ?>"><?php echo $row['arttitle']; ?></a></td>
                <td><?php echo $row['artposter']; ?></td>
                <td><?php echo $row['artclick']; ?></td>
                <?php if(isset($_SESSION['login'])&&$_SESSION['login']['auth']=="9"){ ?>  <td><a href="edit.php?id=<?php echo $row['artid']; ?>">編輯</a> | <a href="process.php?action=DELETE&artid=<?php echo $row['artid']; ?>">刪除</a></td> <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <hr>
    <?php if(isset($_SESSION['login'])&&$_SESSION['login']['auth']=="9"){ ?> 
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
    <?php } ?>
</body>
</html>