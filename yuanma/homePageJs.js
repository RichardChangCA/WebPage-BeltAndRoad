"use strict"

var displayTime = new Date();
document.getElementById('nowDate').innerHTML = displayTime.getFullYear() + "年" +
  (displayTime.getMonth()+1) + "月" + displayTime.getDate() + "日";

function welcomeAlert(){
	alert("欢迎光临一带一路网站!");
}

function validateFormLogInForm(){
	var x = document.forms["dengluForm"]["zhanghao"];
	if(x.validity.valueMissing) {
		alert("账号不能为空!");
		return false;
	}else if(isNaN(x.value)){
		alert("账号只能为数字!");
		return false;
	} else if(x.validity.patternMismatch){
		alert(document.getElementById("userNumber").validationMessage);
		return false;
	}else {
		x = document.forms["dengluForm"]["mima"].value;
		if(x == "") {
			alert("密码不能为空!");
			return false;
		}
	}
}

document.getElementsByClassName("logInButton")[0].style.float="left";

function obtainTime() {
var myVar = setInterval(myTimer ,1000);
function myTimer() {
    var d = new Date();
    document.getElementById("showTime").innerHTML = d.toLocaleDateString() + 
    " " + d.toTimeString();
}
}

function countDown() {
    setTimeout(countDown1, 0);
    setTimeout(countDown2, 1000);
    setTimeout(countDown3, 2000);
    setTimeout(countDownNone, 3000);
    setTimeout(welcomeAlert, 3200);
}

function countDown1() {
	var newTagOne = document.createElement("DIV");
	document.getElementsByTagName("body")[0].appendChild(newTagOne);
	var newAttOne = document.createAttribute("id");     
	newAttOne.value = "countDownId";                     
	newTagOne.setAttributeNode(newAttOne);
	var x = document.getElementById("countDownId").style;
	x.display = "block";
	x.width = "100%";
	x.height = "100%";
	x.position = "fixed";
	x.left = "0";
	x.top = "0";
	x.zIndex = "2";
	x.backgroundColor = "hsla(0, 100%, 50%,1)";
	var newTag = document.createElement("METER");
	document.getElementById("countDownId").appendChild(newTag);
	var newAtt = document.createAttribute("id");     
	newAtt.value = "meterId";                     
	newTag.setAttributeNode(newAtt);
	var newAtt2 = document.createAttribute("value");     
	newAtt2.value = "0";                     
	newTag.setAttributeNode(newAtt2);
	var newAtt3 = document.createAttribute("min");     
	newAtt3.value = "0";                     
	newTag.setAttributeNode(newAtt3);
	var newAtt4 = document.createAttribute("max");     
	newAtt4.value = "9";                     
	newTag.setAttributeNode(newAtt4);
	var x = document.getElementById("meterId").style;
	x.position = "fixed";
	x.left = "0";
	x.top = "0";
	x.zIndex = "3";
	x.width="100%";
	x.height="200px";
	var newTagTwo = document.createElement("P");
	document.getElementById("countDownId").appendChild(newTagTwo);
	var newAttTwo = document.createAttribute("id");     
	newAttTwo.value = "animateId";                     
	newTagTwo.setAttributeNode(newAttTwo);
	var y = document.getElementById("animateId").style;
	y.display = "block";
	y.width = "400px";
	y.height = "400px";
	y.position = "absolute";
	y.zIndex = "3";
	y.backgroundColor = "rgba(0, 0, 0, 0)";
	y.color = "yellow";
	y.textAlign = "center";
	y.fontSize = "350px";
	y.margin = "0";
	y.padding= "0";
	y.borderWidth = "0";
	document.getElementById("countDownId").style.cursor="wait";
	myMove();
    document.getElementById("animateId").innerHTML = "<b>3</b>";
}

function countDown2() {
    document.getElementById("animateId").innerHTML = "<b>2</b>";
    document.getElementById("countDownId").style.backgroundColor = "hsla(0, 100%, 50%,0.8)";
    document.getElementById("animateId").style.opacity = "0.8";
    document.getElementById("meterId").value="3";
}

function countDown3() {
    document.getElementById("animateId").innerHTML = "<b>1</b>";
    document.getElementById("countDownId").style.backgroundColor="hsla(0, 100%, 50%,0.6)";
    document.getElementById("animateId").style.opacity = "0.6";
    document.getElementById("meterId").value="6";
}

function countDownNone(){
    document.getElementById("countDownId").style.display="none";
}

function myMove() {
  var elem = document.getElementById("animateId");   
  var pos = 0;
  var id = setInterval(frame, 1000);
  function frame() {
    if (pos == 3) {
      clearInterval(id);
    } else {
      pos++; 
      elem.style.top = Math.random() * 210 + 'px'; 
      elem.style.left = Math.random() * (screen.availWidth - 400 + 1) + 'px'; 
    }
  }
}

document.getElementById("jianSuo").addEventListener("click",searchData);

function searchData(){
	var x = prompt("请你要检索数据的编号:\n若为多组数据,编号间用逗号(英文)分隔\n如:1,2,3\n","");
	var y = 0;
	var i=0;
	var xArray = x.split(',');
	for(i in xArray){
		while (xArray[i].charAt(0) == ' ') {
            xArray[i] = xArray[i].substring(1);
        }
        while (xArray[i].charAt(xArray[i].length-1) == ' '){
        	xArray[i] = xArray[i].slice(0,xArray[i].length-1);
        }
	}
	$("tfoot,#firstData,#secondData,#thirdData,#forthData,#fifthData")
		.css("display","none");
    for(i = 0; i < xArray.length; i++) {//用循环多次输入
    	y = xArray[i];
	switch ( y ) {
		case '1' : 
		$("#firstData").css("display","table-row");
		console.log(1);
		break;
		case '2' : 
		$("#secondData").css("display","table-row");
		console.log(2);
		break;
		case '3' : 
		$("#thirdData").css("display","table-row");
		console.log(3);
		break;
		case '4' : 
		$("#forthData").css("display","table-row");
		console.log(4);
		break;
		case '5' : 
		$("#fifthData").css("display","table-row");
		console.log(5);
		break;
		default : 
		console.log(0);
		continue;
	}
}
};

document.getElementById("huiFu").addEventListener("click",rebuildData);

function rebuildData(){
	$("#firstData,#secondData,#thirdData,#forthData,#fifthData")
		.css("display","table-row");
	$("tfoot").css("display","table-footer-group");
};

$(document).ready(function(){
	$("ul li").mousedown(function(){
		$(this).css("fontSize","30px");
	});
	$("ul li").mouseup(function(){
		$(this).css("fontSize","inherit");
	});
	$("#nav1").click(function(){
		$(this).css("backgroundColor","green");
		$("#nav2").css("backgroundColor","#333333");
		$("#nav3").css("backgroundColor","#333333");
	});
	$("#nav2").click(function(){
		$(this).css("backgroundColor","green");
		$("#nav1").css("backgroundColor","#333333");
		$("#nav3").css("backgroundColor","#333333");
	});
	$("#nav3").click(function(){
		$(this).css("backgroundColor","green");
		$("#nav1").css("backgroundColor","#333333");
		$("#nav2").css("backgroundColor","#333333");
	});
	$(window).scroll(function() {
    if ($(document).scrollTop() >=0 && $(document).scrollTop()<200) {
    	$("#nav1").css("backgroundColor","green");
		$("#nav2").css("backgroundColor","#333333");
		$("#nav3").css("backgroundColor","#333333");
	}else if ($(document).scrollTop()>=200 && $(document).scrollTop()<620){
    	$("#nav2").css("backgroundColor","green");
		$("#nav1").css("backgroundColor","#333333");
		$("#nav3").css("backgroundColor","#333333");
  	}else if ($(document).scrollTop()>=620 && $(document).scrollTop()<880){
    	$("#nav3").css("backgroundColor","green");
		$("#nav1").css("backgroundColor","#333333");
		$("#nav2").css("backgroundColor","#333333");
  	}else if ($(document).scrollTop()>=880){
    	$("#nav3").css("backgroundColor","#333333");
		$("#nav1").css("backgroundColor","#333333");
		$("#nav2").css("backgroundColor","#333333");
  	}
  });
});

/*function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
};

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
};

function checkCookie() {
    var user=getCookie("username");
    if (user != "") {
        alert("欢迎再次回来" + user);
    } else {
       if (confirm("欢迎光临一带一路网站\n您要建立Cookie吗?\n") == true) {
       user = prompt("请输入你的昵称:","");
       if (user != "" && user != null) {
           setCookie("username", user, 7);
           }//Cookie保留7天
       }
       else {
       		document.cookie = "username=; expires=Thu, 20 May 2017 00:00:00 UTC; path=/;";
       }
    }
};*/
//暂时还没有后台数据库，不能建立Cookie


