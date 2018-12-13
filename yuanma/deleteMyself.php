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

$sql="DELETE FROM MyGuests WHERE id='$uid'";

if (mysqli_query($conn, $sql)) {
    echo "用户成功被删除!";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);

?>
<hr>
<button><a href="homePage.php" target="_self">返回主页面</a></button>

</body>
</html>