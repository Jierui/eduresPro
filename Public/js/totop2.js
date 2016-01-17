// JavaScript Document
//控制返回顶部时滚动的效果

var rate = 100; //执行单次滚动的频率
var scroll = 100;//单次滚动的距离

//其他变量
var timer;
var screenh;

//本函数激发返回顶部页面滚动的函数
function go(){
	document.getElementById("to_top").style.backgroundPosition = "right top";
	screenh = getScrool();
	timer = setInterval("goTop()",rate);
	
	}
	
	//页面滚动函数
	
	function goTop(){
		
		if(screenh >scroll){
			screenh = screenh - scroll;
			document.documentElement.scrollTop = document.body.scrollTop = screenh;
		} else {
			document.documentElement.scrollTop = document.body.scrollTop = 0;
			document.getElementById("to_top").style.backgroundPosition ="left top";
			clearInterval(timer);
		}
		
		}
		
		//获取滚动距离
		
		function getScrool(){
			
			return document.documentElement.scrollTop || document.body.scrollTop;
		}
			


