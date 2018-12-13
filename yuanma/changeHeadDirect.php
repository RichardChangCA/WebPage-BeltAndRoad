<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
</head>
<body>
<form action="imgUpload.php" method="post" enctype="multipart/form-data">
    上传头像来修改原头像:
    <input type="file" name="headImg">
    <input type="submit" value="上传" name="submit">
</form>

<hr>
<button><a href="homePage.php" target="_self">返回主页面</a></button>
<?php

$_SESSION["userId"]=$_SESSION["uId"];

?>
</body>
</html>