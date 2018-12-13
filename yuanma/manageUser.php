<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<link rel="stylesheet" type="text/css" href="homePageCss.css">
<meta charset="utf-8">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<!--Microsoft-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><!--Google-->
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zlfDB";

$idNumber=0;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	die("Database Connection failed: " . mysqli_connect_error());
	}
$aid=$_SESSION["aId"];
echo "<h1>您好：管理员".$aid."</h1>";

$sql = "SELECT id, password, firstname, lastname, email, phone, reg_date FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table><caption>用户信息</caption><thead><tr><th>账号</th><th>密码</th><th>姓名</th><th>邮箱</th><th>联系电话</th><th>最后一次操作数据</th><th>管理用户</th></tr></thead><tbody>";
    while($row = mysqli_fetch_assoc($result)) {
    	echo "<tr><td>".$row["id"]."</td><td>".$row["password"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["reg_date"]."</td><td><a href='manageUser.php' class='del'>删除</a>"." "."<a href='#modifyForm' class='modify'>修改</a></td></tr>";
    }
    echo "</tbody></table>";
} else {
    echo "0 guests";
}
?>

<form validate action="changeProcess.php" method="post" enctype="multipart/form-data" style="display: none;" id="modifyForm">
<fieldset>
<legend>修改信息:</legend>
	<input type="text" id="submitId" name="submitId" style="display: none;">
	<label for="zhanghao">账号:</label><br>
	<input type="text" id="zhanghao" disabled>
	<br>
	<label for="key">输入新密码:</label><br>
    <input type="text" name="psw" autofocus required autocomplete="off" id="key">
    <br>
    <label for="lname">姓氏:</label><br>
	<input type="text" name="lastname" size="9" maxlength="9" required
	autocomplete="on" id="lname">
	<br>
	<label for="fname">名称:</label><br>
	<input type="text" name="firstname" size="9" maxlength="9" required autocomplete="on" id="fname">
	<br>
	<label for="email" title="要用正确的电子邮箱格式填写">电子邮箱:</label><br>
    <input type="email" name="email" required autocomplete="off" multiple placeholder="xxx@xxx.com" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"><!--多个邮箱用,分隔-->
    <br>
    <label for="telephone">联系电话:</label><br>
    <input type="tel" name="usrtel" required autocomplete="off" id="telephone" 
    pattern="[0-9]{7,11}" title="联系电话输入为一串数字,6到13位">
    <br><br>
    <input type="submit" value="修改" formtarget="_self">
	<input type="reset" value="重置">
</fieldset>
</form>

<?php
echo '<script type="text/javascript">$(document).ready(function(){
    $("a.del").click(function(){
        $.ajax({
		url:"manageUser.php",
		type:"POST",
		data:"id="+$(this).parent().siblings().eq(0).text()
		});
    });
	});</script>';

echo '<script type="text/javascript">$(document).ready(function(){
    $("a.modify").click(function(){
		document.getElementsByTagName("form")[0].style.display="block";
		idValue=$(this).parent().siblings().eq(0).text();
		$("#submitId").val(idValue);
		$("#zhanghao").val(idValue);
    });
	});</script>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//删除数据
	$uid=$_POST["id"];

	$sql="DELETE FROM MyGuests WHERE id='$uid'";

	mysqli_query($conn, $sql);
}

mysqli_close($conn);
?>
<hr>
<button><a href="registerPage.html" style="text-decoration: none;color:green;">添加新用户</a></button>
</body>
</html>