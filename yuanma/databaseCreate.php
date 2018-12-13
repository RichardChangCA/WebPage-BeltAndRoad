<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Database Connection failed: " . mysqli_connect_error());
}
echo "Database Connected successfully";

// Create database
$sql = "CREATE DATABASE zlfDB";
if (mysqli_query($conn, $sql)) {
    echo "<br>Database created successfully";
} else {
    echo "<br>Error creating database: " . mysqli_error($conn);
}

$dbname = "zlfDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("<br>Database Connection failed: " . mysqli_connect_error());
}

// sql to create table


$sql = "CREATE TABLE MyGuests (
id BIGINT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
gender VARCHAR(10) NOT NULL,
birthday DATE,
age INT(3),
rank VARCHAR(20),
email VARCHAR(50) NOT NULL,
phone BIGINT(13) UNSIGNED NOT NULL,
password VARCHAR(20) NOT NULL,
browser VARCHAR(20),
headfile VARCHAR(100),
favorite VARCHAR(50),
favoriteWeb VARCHAR(50),
favoriteColor VARCHAR(10),
luckyNumber INT(1) UNSIGNED,
addText TEXT,
reg_date TIMESTAMP
)";
//headfile文件上传的为路径
if (mysqli_query($conn, $sql)) {
    echo "<br>Table MyGuests created successfully";
} else {
    echo "<br>Error creating table: " . mysqli_error($conn);
}

$sql="ALTER TABLE MyGuests AUTO_INCREMENT = 100000";
//账号最少六位数
if(!mysqli_query($conn, $sql)){
echo "<br>Error creating table: " . mysqli_error($conn);
}

$sql = "INSERT INTO MyGuests (firstname, lastname,password)
VALUES ('ZHANG', 'lingfeng','20152649')";

if (mysqli_query($conn, $sql)) {
    echo "<br>用户初始账号:100000<br>用户初始密码:20152649";
} else {
    echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "CREATE TABLE MyAdmins (
adminId BIGINT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
adminPassword VARCHAR(20) NOT NULL,
admin_reg_date TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "<br>Table MyAdmins created successfully";
} else {
    echo "<br>Error creating table: " . mysqli_error($conn);
}

$sql="ALTER TABLE MyAdmins AUTO_INCREMENT = 100";
if(!mysqli_query($conn, $sql)){
echo "Error creating table: " . mysqli_error($conn);
}

$sql = "INSERT INTO MyAdmins (adminPassword)
VALUES ('2015')";

if (mysqli_query($conn, $sql)) {
    echo "<br>管理员初始账号:100<br>用户初始密码:2015";
} else {
    echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<hr>
<button><a href="homePage.php" target="_self">进入主页面</a></button>
</body>
</html>