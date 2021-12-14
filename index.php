<?php 

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
    <hr>
    <table>
        <thead>
            <tr>
                <th>發佈日期</th>
                <th>文章標題</th>
                <th>點擊數</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_assoc($query)){ ?>
            <tr>
                <td><?php echo $row['artdate']; ?></td>
                <td><a href="article.php?id=<?php echo $row['artid']; ?>"><?php echo $row['arttitle']; ?></a></td>
                <td><?php echo $row['artclick']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>