<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<title>The Belt and Road Initiative</title>
<link rel="stylesheet" type="text/css" href="homePageCss.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">
<meta name="description" content="Homework Web">
<meta "keywords" content="HTML5">
<meta name="author" content="Lingfeng Zhang">
<meta name="viewport" content="width=device-width, initial-scake=1.0">
<style type="text/css">
	form#denglu {
		width:20%;
		padding:0;
	}
	fieldset{
		border:2px solid blue;
		border-radius: 4px;
		margin:0;
		background-image: url(hongqi.jpg);
		background-size: 100% 100%;
		background-clip: border-box;
	}
	legend {
		color:blue;
		font-weight: 10px;
	}

	label{
		color:blue;
		font-weight: 10px;
	}

	input[type=submit]{
		color:blue;
		width:85px;
		height:30px;
	}

	input[type=submit]:nth-of-type(2){
		margin-left: 3px;
	}

	input[type=submit]:first-of-type{
		margin-left: 0;
	}

	input[type=submit]:hover{
		box-shadow: 2px 2px grey;
		cursor:pointer;
	}
</style>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<!--Microsoft-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><!--Google-->
</head>
<body onload="countDown()">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zlfDB";

$_SESSION["loadTag"]=0;
$idNumber=0;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	die("Database Connection failed: " . mysqli_connect_error());
	}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$idNumber = $_POST["zhanghao"];
	$sql = "SELECT password,firstname,lastname FROM MyGuests WHERE id='$idNumber'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		if($row["password"]===$_POST["mima"]){
			if($_POST["authCode"]==$_POST["randomCode2"]){
				echo "<script>alert('登陆成功!\\n"."您好:".$row["firstname"]." ".$row["lastname"]."')</script>";
				$_SESSION["loadTag"] = 2;//用户登录设置为2
				$_SESSION["uId"]=$idNumber;//用户的账号
			}else {
				echo "<script>alert('验证码错误!\\n请重新登陆!')</script>";
			}
		}else {
			echo "<script>alert('密码错误!\\n请重新登陆!')</script>";
		}
	} else{
		$sql = "SELECT adminPassword FROM MyAdmins WHERE adminId='$idNumber'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			if($row["adminPassword"]===$_POST["mima"]){
				if($_POST["authCode"]==$_POST["randomCode2"]){
					echo "<script>alert('登陆成功!\\n"."您好:管理员".$idNumber."')</script>";
					$_SESSION["loadTag"] = 1;//管理员登录设置为1
					$_SESSION["aId"]=$idNumber;//管理员的账号
				}else {
					echo "<script>alert('验证码错误!\\n请重新登陆!')</script>";
				}
			}else {
			echo "<script>alert('密码错误!\\n请重新登陆!')</script>";
			}
		} else{
			echo "<script>alert('无此账号!\\n请重新登陆!')</script>";
		}
	}
}
?>
<h1 id="head">一带一路</h1>
<ul type="none">
	<li id="nav1"><a href="homePage.php#head" class="nav">简介</a></li>
	<li id="nav2"><a href="homePage.php#chengxiao" class="nav">成效</a></li>
	<li id="nav3"><a href="homePage.php#iframe_baidu" class="nav">内联</a></li>
	<details id="common"><summary><i class="fa fa-address-card-o" style="font-size: inherit,color:white;"></i>登录</summary>
	<div class="dropDown">
		<a href="homePage.php#dengluDiv" class="showBlock"><span>登录</span></a>	
		<a href="registerPage.html" target="_blank" class="enroll"><span>注册</span></a>
		<div id="dengluDiv">
			<ruby>
				<rb>一带一路</rb>
				<rp>(</rp>
				<rt>y&#237 d&#224i y&#237 l&#249</rt>
				<rp>)</rp>
			</ruby>
			<a href="homePage.php#" target="_self" class="close">+</a>
			<form id="denglu" name="dengluForm" method="post" onsubmit="return validateFormLogInForm()" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<fieldset>
					<legend>登录</legend>
					<label for="userNumber">帐号:<br>
					<input type="text" name="zhanghao" autocomplete="on" id="userNumber" placeholder="ID" autofocus title="输入账号,账号只能为3到7位数字且非空" pattern="[0-9]{3,7}" required></label>
					<br>
					<label for="key">输入密码:<br>
    				<input type="password" name="mima" autocomplete="off" id="key" placeholder="Keywords" title="输入密码,密码非空"></label>
			    	<br>
			    	<label for="authCode">验证码:<br>
			    	<input type="text" name="authCode" id="authCode" placeholder="authCode" size="4"></label>
			    	<input type="text" name="randomCode" size="4" disabled id="randomCode">
			    	<input type="text" name="randomCode2" id="randomCode2" style="display: none;">
			    	<br><br>
					<input type="submit" value="登录" formtarget="_self" class="logInButton" style="margin-left: 40px;">
				</fieldset>
			</form>
		</div>
	</div>
	</details>
	<details id="person"><summary><i class="fa fa-address-card-o" style="font-size: inherit,color:white;"></i>个人信息</summary>
	<div class="dropDown">
		<a href="#informationDiv" class="showBlock"><span>我的信息</span></a>	
		<a href="homePage.php" class="enroll"><span>退出登录</span></a>
		<div id="informationDiv">
			<h3>&nbsp&nbsp我的信息:&nbsp&nbsp</h3>
			<button id="changeInfo"><a href="changeInformation.php" style="text-decoration: none;color:black;"><b>修改信息</b></a></button>	
			<button id="changeKey"><a href="changeKeyNum.php" style="text-decoration: none;color:black;"><b>修改密码</b></a></button>
			<button id="changeHead"><a href="changeHeadDirect.php" style="text-decoration: none;color:black;"><b>修改头像</b></a></button>
			<a href="homePage.php#" target="_self" class="close">+</a>
			<div id=innerInformation></div>
		</div>
	</div>
	</details>
	<details id="admin"><summary><i class="fa fa-address-card-o" style="font-size: inherit,color:white;"></i>管理员<?php echo $idNumber;?></summary>
	<div class="dropDown">
		<a href="manageUser.php" class="showBlock" target="_blank"><span>管理用户</span></a>
		<a href="changeManagerKey.php" class="showBlock" target="_self"><span>修改密码</span></a>	
		<a href="createManager.html" class="showBlock" target="_blank"><span>新管理员</span></a>	
		<a href="homePage.php" class="enroll"><span>退出登录</span></a>
	</div>
	</details>
</ul>
<audio loop controls>
<source src="webMusic/music.mp3" type="audio/mpeg">
您的浏览器不支持音乐播放！
</audio>
<div class="layout"><div class="goodLook"><img src="yidaiyilu.jpg" alt="21世纪一带一路" class="yidaiyilu"><span class="tooltip">21世纪陆上丝绸之路起点<div class="tooltipPoint"></div></span></div>
<p id="jianjie" class="zhengwen"><a href="http://baike.baidu.com/link?url=hhKhTNr7j-sKYQ7Smh5nJ6r0FmhJuWP5F_9sV8rX5A_EMmiG9gJTrYB4yToiTJ35vcBVYU01dXHcF-yJZ__K-yP8SwQEf5dxMnnVb0xGkm-65tP1NRmpfOLjIkfX-ACz" target="_blank" class="baidubaike"><img title="点此进入百度百科" src="baidu.jpg" alt="百度百科一带一路" class="baidubaike"></a><q><mark>一带一路</mark></q>（英文：<i>The Belt and Road</i>，缩写<abbr title="The Belt and Road">B&R</abbr>）是"丝绸之路经济带"和“21世纪海上丝绸之路”的<strong>简称</strong>。它将充分依靠中国与有关国家既有的双多边机制，借助既有的、行之有效的区域合作平台，一带一路旨在<ins>借用古代丝绸之路的历史符号，高举和平发展的旗帜，积极发展与沿线国家的经济合作伙伴关系，共同打造政治互信、经济融合、文化包容的利益共同体、命运共同体和责任共同体。</ins></p></div>
<hr>
<button id="jianSuo" >检索数据</button>
<button id="huiFu" >恢复数据</button>
<table id="chengxiao">
	<caption>一带一路取得成效的企业</caption>
	<thead>
	<tr>
		<th rowspan="2">编号</th>
		<th colspan="2">排名</th>
		<th rowspan="2">公司名称</th>
		<th rowspan="2">完成国际营业额</th>
	</tr>
	<tr>
		<th>2016</th>
		<th>2015</th>
	</tr>
	</thead>
	<tfoot>
		<tr class="foot">
		<td>...</td>
		<td>...</td>
		<td>...</td>
		<td>...</td>
		<td>...</td>
	</tr>
	</tfoot>
	<tbody>
	<tr id='firstData'>
		<td>1</td>
		<td>9</td>
		<td>10</td>
		<td>中交集团</td>
		<td>13162.47</td>
	</tr>
	<tr id='secondData'>
	    <td>2</td>
	    <td>20</td>
	    <td>24</td>
		<td>中国建筑股份有限公司</td>
		<td>5742.67</td>
	</tr>
	<tr id='thirdData'>
		<td>3</td>
		<td>23</td>
		<td>20</td>
		<td>中国水利水电建设股份有限公司</td>
		<td>5314.36</td>
	</tr>
	<tr id='forthData'>
		<td>4</td>
		<td>25</td>
		<td>25</td>
		<td>中国机械工业集团有限公司</td>
		<td>5288.89</td>
	</tr>
	<tr id='fifthData'>
		<td>5</td>
		<td>28</td>
		<td>34</td>
		<td>中国中铁股份有限公司</td>
		<td>4766.93</td>
	</tr>
	</tbody>
</table>
<hr>
<iframe src="iframePage.html" id="iframe_baidu"></iframe>
<div class="time"><button class="time" id="timeId" type="button" onclick="obtainTime()">点此获取时间</button>
<p id="showTime" class="time"></p></div>
<hr>
<p class="outLink"><a class="outLink" href="http://www.yidaiyilu.gov.cn/" target="_blank"><i class="fa fa-link" style="font-size: inherit;"></i>点此前往访问一带一路官网</a></p>

<br>
<p class="copyright">copyright&copy &nbspLi&#769ngfe&#772ng Zha&#772ng &nbsp<time datetime="2017-4-26">2017年4月26日</time>-<time id="nowDate"></time></p>
<h3 style="box-align: center;margin-left: 45%;"><a data-email="zlf465074419@gmail.com" href="mailto:zlf465074419@gmail.com" style="border:1px solid red;"><i class="fa fa-envelope-o" style="font-size:25px"></i>联系我们</a></h3>
<script src="homePageJs.js" defer="true"></script>
<script>
document.getElementById("randomCode").value = Math.floor(Math.random() * 8999) + 1000;
document.getElementById("randomCode2").value = document.getElementById("randomCode").value;
</script>
<?php
if($_SESSION["loadTag"]==2){//用户
	echo "<script>document.getElementById('common').style.display='none';
	document.getElementById('person').style.display='block';
	document.getElementById('admin').style.display='none';
	</script>";
	$uid=$_SESSION["uId"];
	$sql = "SELECT id,firstname, lastname, gender, birthday, age, rank, email, phone, browser,  favoriteWeb, favoriteColor, luckyNumber, addText ,headfile ,reg_date FROM MyGuests WHERE id='$uid'";
	if(mysqli_query($conn, $sql)){
		$result=mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		echo '<script>document.getElementById("innerInformation").innerHTML="<table><tr><th>账号:</th><td>'.$row["id"].'</td></tr><tr><th>姓氏:</th><td>'.$row["lastname"].'</td></tr><tr><th>名称:</th><td>'.$row["firstname"].'</td></tr><tr><th>性别:</th><td>'.$row["gender"].'</td></tr><tr><th>电子邮箱:</th><td>'.$row["email"].'</td></tr><tr><th>联系电话:</th><td>'.$row["phone"].'</td></tr><tr><th>出生日期:</th><td>'.$row["birthday"].'</td></tr><tr><th>年龄:</th><td>'.$row["age"].'</td></tr><tr><th>身份:</th><td>'.$row["rank"].'</td></tr><tr><th>所用的浏览器:</th><td>'.$row["browser"].'</td></tr><tr><th>喜欢的网站:</th><td>'.$row["favoriteWeb"].'</td></tr><tr><th>喜欢的颜色:</th><td>'.$row["favoriteColor"].'</td></tr><tr><th>幸运数字:</th><td>'.$row["luckyNumber"].'</td></tr><tr><th>头像:</th><td><img src=\''.$row["headfile"].'\' width=100 height=100 alt=\'nonHeadfile\'></td></tr><tr><th>注册时间:</th><td>'.$row["reg_date"].'</td></tr><tr><th>附加说明:</th><td>'.$row["addText"].'</td></tr></table>";
		</script>';
	}
}
if($_SESSION["loadTag"]==1){//管理员
	echo "<script>document.getElementById('common').style.display='none';
	document.getElementById('person').style.display='none';
	document.getElementById('admin').style.display='block';
	</script>";
}
mysqli_close($conn);
?>
</body>
</html>