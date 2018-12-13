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
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $lastname = test_input($_POST["lastname"]);
  $firstname = test_input($_POST["firstname"]);
  $gender = test_input($_POST["gender"]);
  $email = test_input($_POST["email"]);
  $usrtel = test_input($_POST["usrtel"]);
  $bday = test_input($_POST["bday"]);
//  $interest = test_input($_POST["interest"]);
  $age = test_input($_POST["age"]);
  $identity = test_input($_POST["identity"]);
  $psw = test_input($_POST["psw"]);
  $browser = test_input($_POST["browser"]);
  $homepage = test_input($_POST["homepage"]);
  $favcolor = test_input($_POST["favcolor"]);
  $luckyNumber = test_input($_POST["luckyNumber"]);
  $information = test_input($_POST["information"]);
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

$sql = "INSERT INTO MyGuests (firstname, lastname, gender, birthday, age, rank, email, phone, password, browser,  favoriteWeb, favoriteColor, luckyNumber, addText)
VALUES ('$firstname', '$lastname', '$gender', '$bday', '$age', '$identity', '$email', '$usrtel', '$psw', '$browser',  '$homepage', '$favcolor', '$luckyNumber', '$information')";

if (mysqli_query($conn, $sql)) {
	$last_id = mysqli_insert_id($conn);
  echo "<script>alert('注册成功!')</script>";
  echo "<h1>新用户:</h1>";
	echo "<table style='text-align:left'>";
	echo "<tr><th>账号:</th><td>".$last_id;
	echo "</td></tr><tr><th>姓氏:</th><td>".$_POST["lastname"];
	echo "</td></tr><tr><th>名称:</th><td>".$_POST["firstname"];
	echo "</td></tr><tr><th>性别:</th><td>".$_POST["gender"];
	echo "</td></tr><tr><th>电子邮箱:</th><td>".$_POST["email"];
	echo "</td></tr><tr><th>联系电话:</th><td>".$_POST["usrtel"];
	echo "</td></tr></table>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$_SESSION["userId"] = $last_id;

mysqli_close($conn);

echo "<br>";
//$cookie_name = "user";
//$cookie_value = $_POST["firstname"]." ".$_POST["lastname"];
//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

?>

<form action="imgUpload.php" method="post" enctype="multipart/form-data">
    选择所要上传的头像:
    <input type="file" name="headImg">
    <input type="submit" value="上传" name="submit">
</form>

<hr>
<button><a href="homePage.php" target="_self">返回主页面</a></button>

</body>
</html>