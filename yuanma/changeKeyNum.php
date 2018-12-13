<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="author" content="Lingfeng Zhang">
<meta name="viewport" content="width=device-width, initial-scake=1.0">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zlfDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Database Connection failed: " . mysqli_connect_error());
    }

$uid=$_SESSION["uId"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$sql = "SELECT password FROM MyGuests WHERE id='$uid'";
	if(mysqli_query($conn,$sql)){
		$result=mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		if($row["password"]===$_POST["mima"]){
			$psw = test_input($_POST["psw"]);
			$sql = "UPDATE MyGuests SET password='$psw' WHERE id='$uid'";
			if (mysqli_query($conn, $sql)) {
				echo "<script>alert('密码修改成功!')</script>";
			} else {
				echo "Error updating password: " . mysqli_error($conn);
			}
		} else {
			echo "<script>alert('原密码错误!\\n请重新输入!')</script>";
		}
	}
}

function test_input($data) {
  $data = trim($data);
//Strip unnecessary characters (extra space, tab, newline) from the user input data
  $data = stripslashes($data);
//Remove backslashes (\) from the user input data
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form validate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<fieldset>
<legend>修改密码:</legend>
<label for="key1">输入原密码:<br>
    <input type="password" name="mima" autocomplete="off" id="key1"></label>
<br>
<label for="key2">输入新密码:<br>
    <input type="text" name="psw" required autocomplete="off" id="key2"></label>
<br><br>
<input type="submit" value="修改" formtarget="_self">
</fieldset>
</form>
<hr>
<button><a href="homePage.php" target="_self">返回主页面并重新登陆</a></button>
<?php

mysqli_close($conn);
?>
</body>
</html>