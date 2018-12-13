<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
$sql = "INSERT INTO MyAdmins (adminPassword)
VALUES ('$psw')";

if (mysqli_query($conn, $sql)) {
	$last_id = mysqli_insert_id($conn);
    echo "<script>alert('注册成功!')</script>";
    echo "新管理员:".$last_id;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
</body>
</html>
