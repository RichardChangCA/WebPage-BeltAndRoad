"use strict"

$(document).ready(function(){
	$("ol.lay1").css("height","400px");
	$("ol.lay1").dblclick(function(){
		if (confirm("你确定要删除此功能块吗") == true){
		$("ol.lay1").hide("slow");
		$("ol.lay1").remove();
	}
	});
	$("li.lay3").click(function(){
		$(this).hide(0);//先隐藏
	});
	$("ol.lay3").click(function(){
		$("li.lay3").show(2000);//再显示
	});
	$("li.lay1:nth-child(2)").click(function(){
        $("li.lay2:nth-child(1)").fadeToggle(500);
        $("li.lay2:nth-child(2)").fadeToggle(1000);
        $("li.lay2:nth-child(3)").fadeToggle(1500);
        $("li.lay2:nth-last-child(1)").fadeToggle(2000);
        $("li.lay2:nth-child(1)").fadeToggle(2500);
        $("li.lay2:nth-child(2)").fadeToggle(3000);
        $("li.lay2:nth-child(3)").fadeToggle(3500);
        $("li.lay2:nth-last-child(1)").fadeToggle(4000);
	});
	$("li.lay1:last-child").mouseenter(function(){
		$("li.lay2").stop();
		$("li.lay3").stop(true,true);

	})
	$("ol.lay1 li").mouseleave(function(){
		$(this).animate({
			opacity : '0.7' ,
			fontSize : "25px",
		})
	})
	$("ol li").mouseenter(function(){
		$(this).css("fontSize","50px").css("opacity","1");
	})
	$("ol li").mouseleave(function(){
		$(this).css("fontSize","inherit").css("opacity","0.5");
	})
	$("ol.lay1").attr("title","双击删除此功能块!");
	$("nav a.nav[id!=navSum]").slideUp(10000);
	$("nav a.nav:first-child").click(function(){
		$("nav a.nav[id!=navSum]").slideToggle("quick");
	}).mouseenter(function(){
		$(this).css("cursor","pointer").nextAll().stop(true,true);
	}).mouseleave(function(){
		$("nav a.nav[id!=navSum]").stop(true,true);
	});
	$("a:nth-child(2)").click(function(){
    	$(this).css("backgroundColor","red");
		$("a.nav:nth-child(3),a.nav:nth-child(4),a.nav:nth-child(5)")
		.css("backgroundColor","inherit");
    });	
    $("a:nth-child(3)").click(function(){
    	$(this).css("backgroundColor","red");
		$("a.nav:nth-child(2)").css("backgroundColor","inherit");
		$("a.nav:nth-child(4)").css("backgroundColor","inherit");
		$("a.nav:nth-child(5)").css("backgroundColor","inherit");
    });	
    $("a:nth-child(4)").click(function(){
    	$(this).css("backgroundColor","red");
		$("a.nav:nth-child(3)").css("backgroundColor","inherit");
		$("a.nav:nth-child(2)").css("backgroundColor","inherit");
		$("a.nav:nth-child(5)").css("backgroundColor","inherit");
    });	
    $("a:nth-child(5)").click(function(){
    	$(this).css("backgroundColor","red");
		$("a.nav:nth-child(3)").css("backgroundColor","inherit");
		$("a.nav:nth-child(4)").css("backgroundColor","inherit");
		$("a.nav:nth-child(2)").css("backgroundColor","inherit");
    });	
    $("#tuPianJi").on("dblclick",function(){
    	$("figure img").css("opacity","1");
    }).attr("title","双击完全显示图片");
})
