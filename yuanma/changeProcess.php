<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<script>
function goBack() {
    window.history.back()
}
</script>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["loadTag"] == 2) {
  $lastname = test_input($_POST["lastname"]);
  $firstname = test_input($_POST["firstname"]);
  $gender = test_input($_POST["gender"]);
  $email = test_input($_POST["email"]);
  $usrtel = test_input($_POST["usrtel"]);
  $bday = test_input($_POST["bday"]);
  $age = test_input($_POST["age"]);
  $identity = test_input($_POST["identity"]);
  $browser = test_input($_POST["browser"]);
  $homepage = test_input($_POST["homepage"]);
  $favcolor = test_input($_POST["favcolor"]);
  $luckyNumber = test_input($_POST["luckyNumber"]);
  $information = test_input($_POST["information"]);
}

if($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["loadTag"] == 1){//管理用户
  $lastname = test_input($_POST["lastname"]);
  $firstname = test_input($_POST["firstname"]);
  $email = test_input($_POST["email"]);
  $usrtel = test_input($_POST["usrtel"]);
  $psw = test_input($_POST["psw"]);
}

function test_input($data) {
  $data = trim($data);
//Strip unnecessary characters (extra space, tab, newline) from the user input data
  $data = stripslashes($data);
//Remove backslashes (\) from the user input data
  $data = htmlspecialchars($data);
  return $data;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zlfDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if($_SESSION["loadTag"] == 2){
  $uid=$_SESSION["uId"];
  $_SESSION["userId"]=$uid;
}

if($_SESSION["loadTag"] == 1 && $_SERVER["REQUEST_METHOD"] == "POST"){//管理用户
  $uid=$_POST["submitId"];
}

if($_SESSION["loadTag"] == 2){//用户
$sql = "UPDATE MyGuests SET firstname='$firstname', lastname='$lastname', gender='$gender', birthday='$bday', age='$age', rank='$identity', email='$email', phone='$usrtel', browser='$browser', favoriteWeb='$homepage', favoriteColor='$favcolor', luckyNumber='$luckyNumber', addText='$information' WHERE id='$uid'";
}

if($_SESSION["loadTag"] == 1){//管理员
$sql = "UPDATE MyGuests SET firstname='$firstname', lastname='$lastname', email='$email', phone='$usrtel', password='$psw' WHERE id='$uid'";
}

if (mysqli_query($conn, $sql)) {
  echo "<script>alert('修改成功!')</script>";
  echo "修改成功!<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

echo "<br>";

?>
<div id="userShow" style="display: none;">
<form action="imgUpload.php" method="post" enctype="multipart/form-data">
    上传头像来修改原头像:
    <input type="file" name="headImg">
    <input type="submit" value="上传" name="submit">
</form>

<hr>
<button><a href="homePage.php" target="_self">返回主页面</a></button>
</div>
<div id="managerShow" style="display: none;">
<input type="button" value="返回上一层级" onclick="goBack()">
</div>
<?php
if($_SESSION["loadTag"] == 1){//管理员
  echo "<script>document.getElementById('userShow').style.display='none';document.getElementById('managerShow').style.display='block';</script>";
}
if($_SESSION["loadTag"] == 2){//用户
  echo "<script>document.getElementById('userShow').style.display='block';document.getElementById('managerShow').style.display='none';</script>";
}
?>
</body>
</html>