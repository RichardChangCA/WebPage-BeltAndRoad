<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<link rel="stylesheet" type="text/css" href="registerPageCss.css">
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

$sql = "SELECT firstname, lastname, birthday, age, email, phone, browser,  favoriteWeb, favoriteColor, luckyNumber FROM MyGuests WHERE id='$uid'";
if(mysqli_query($conn, $sql)){
    $result=mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    }
?>
<form oninput="x.value=parseInt(a.value)" validate action="changeProcess.php" method="post" enctype="multipart/form-data">
<fieldset>
<legend>个人信息:</legend>
    <label for="lname" class="require">姓氏:</label><br>
	<input type="text" name="lastname" size="9" maxlength="9" required
	autocomplete="on" autofocus id="lname" onblur="FamilyNameToUpper()" value='<?php echo $row["lastname"]?>'>
	<br>
	<label for="fname" class="require">名称:</label><br>
	<input type="text" name="firstname" size="9" maxlength="9" required autocomplete="on" id="fname" onblur="FirstNameToLower()" value='<?php echo $row["firstname"]?>'>
	<br>
    <script type="text/javascript">
        function FamilyNameToUpper(){
            var x;
            x=document.getElementById("lname");
            x.value=x.value.toUpperCase();
        }
        function FirstNameToLower(){
            var x;
            x=document.getElementById("fname");
            x.value=x.value.toLowerCase();
        }
    </script>
	<label class="require">性别:</label><br>
	<input type="radio" name="gender" value="male" required checked id="male"><label for="male" class="hoverClass">男&#9794</label>
	<br>
	<input type="radio" name="gender" value="female" id="female"><label for="female" class="hoverClass">女&#x2640</label>
	<br>
	<label>生日:</label><br>
	<input type="date" name="bday" max="2017-4-27" min="1897-1-1" value='<?php echo $row["birthday"]?>'>
	<br>
	<label>年龄:</label><output name="x" for="a"></output><br>
	0<input type="range" id="a" name="age" value="20" max="120" value='<?php echo $row["age"]?>'>120<br>
	<label>身份:</label><br>
	<select name="identity">
	<optgroup label="学生">
	<option value="undergraduate" selected>本科生</option>
	<option value="graduateStudent">研究生</option>
	<option value="doctor">博士生</option>
    </optgroup>
	<optgroup label="教师">
	<option value="lecturer">讲师</option>
	<option value="associateProfessor">副教授</option>
	<option value="professor">教授</option>
    </optgroup>
	<optgroup label="其他">
    <option value="other">其他</option>
    </optgroup>
    </select>
    <br>
    <label for="email" class="require" title="要用正确的电子邮箱格式填写">电子邮箱:</label><br>
    <input type="email" name="email" required autocomplete="off" multiple placeholder="xxx@xxx.com" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value='<?php echo $row["email"]?>'><!--多个邮箱用,分隔-->
    <br>
    <label for="telephone" class="require">联系电话:</label><br>
    <input type="tel" name="usrtel" required autocomplete="off" id="telephone" 
    pattern="[0-9]{7,11}" title="联系电话输入为一串数字,6到13位" value='<?php echo $row["phone"]?>'>
    <br>
    <label>你所使用的浏览器:</label><br>
    <input list="browsers" name="browser" value='<?php echo $row["browser"]?>'>
    <datalist id="browsers">
        <option value="Internet Explorer"></option>
        <option value="Firefox"></option>
  		<option value="Chrome"></option>
  		<option value="Opera"></option>
        <option value="Safari"></option>
    </datalist>
    <br>
    <label for="favoriteWeb">你最喜欢的网站:</label><br>
    <input type="url" name="homepage" placeholder="FullURL" id="favoriteWeb" unrequired title="若要输入此网址,网址的地址必须是整个URL" value='<?php echo $row["favoriteWeb"]?>'>
    <br>
    <label>你最喜欢的颜色:</label><br>
    <input type="color" name="favcolor" value='<?php echo $row["favoriteColor"]?>'>
    <br>
    <label>幸运数字:</label><br>
    <input type="number" name="luckyNumber" value='<?php echo $row["luckyNumber"]?>' min="0" max="9" step="1">
    <br>
    <label for="addText">附加说明:</label><br>
    <textarea name="information" rows="5" cols="30" placeholder="xxx..." id="addText" title="附加说明一些内容，可以是任意内容，也可以为空"></textarea>
    <br><br>
	<input type="submit" value="修改" formtarget="_self">
    <hr>
	<a href="deleteMyself.php">注销用户</a>
</fieldset>
</form>
<?php
mysqli_close($conn);
?>
</body>
</html>