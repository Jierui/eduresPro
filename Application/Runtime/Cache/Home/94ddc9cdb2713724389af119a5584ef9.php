<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="中南大学远程教育资源管理系统" />
<title>中南大学远程教育资源管理系统</title>
<link href="/eduresPro/Public/otherfiles/styles/glDatePicker.flatwhite.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="/eduresPro/Public/css/amazeui.min.css" />
<link type="text/css" rel="stylesheet" href="/eduresPro/Public/css/css.css" />
<link type="text/css" rel="stylesheet" href="/eduresPro/Public/css/style.css" />
<link type="text/css" rel="stylesheet" href="/eduresPro/Public/css/Upload.css" />
<script src="/eduresPro/Public/js/ChangeContent.js" type="text/javascript"></script> 
<script src="/eduresPro/Public/js/jquery2.1.4.js" type="text/javascript"></script> 
<script src="/eduresPro/Public/Jquery/js/vendor/jquery.ui.widget.js"></script>
<script src="/eduresPro/Public/Jquery/js/jquery.iframe-transport.js"></script>
<script src="/eduresPro/Public/Jquery/js/jquery.fileupload.js"></script>
<script src="/eduresPro/Public/otherfiles/js/upimg.js"></script>
<script src="/eduresPro/Public/otherfiles/js/glDatePicker.min.js"></script>
<script src="/eduresPro/Public/otherfiles/js/datePicker.js"></script> 

<script type="text/javascript">
$(document).ready(function() {
	projekktor('#player_a'); // instantiation
});
</script>


</head>

<body style="background:none;">

<!---发布相关文件开始--->
<div id="fade" class="black_overlay"></div>
<div id="MyDiv" class="white_content">
	<div class="close_box">
		<span onClick="CloseDiv('MyDiv','fade')"><a href="#" class="close">关闭</a></span>
	</div>
	 <div id="demo" class="demo"></div>   
</div>
<!---发布相关文件结束--->


<div class="header">
   <div class="top">
		<img class="logo" src="/eduresPro/Public/images/logo.jpg" />
		<ul class="nav" id="intrL-T">
		   <li onMouseOver="change(this)"><a href="message_feedback">消息提醒</a></li>
		   <li onMouseOver="change(this)"><a href="personal_center">个人中心</a></li>
		   <li   class="seleli"  onMouseOver="change(this)"><a href="Teacher_Resource" >资源管理</a></li>
		   <li onMouseOver="change(this)"><a href="Announcement" >公告管理</a></li>
		   <li onMouseOver="change(this)"><a href="message_board" >留言板</a></li>
		</ul>
		<a href="<?php echo U('Home/Index/exit_login');?>" class="exit">退出</a>
   </div>
</div>   <!--header结束-->
	
<div class="container clearfix">
    <div class="leftbar">
		<div class="lm01 clearfix"> 
			<img class="peptx" src="/eduresPro/<?php echo ((isset($imgpath) && ($imgpath !== ""))?($imgpath):'Public/images/tximg.jpg'); ?>" /><a  href="javascript:select_img_file();" class="changeImg">更换头像</a>
			<input type="file" name="files[]" id="img_upload" style="display:none"/>
	   		 <div class="pepdet" style="clear:both;">
				<p>姓名：<?php echo ($userinfo["username"]); ?></p>
				<p>层次：<?php echo ($userinfo["level"]); ?></p>
				<p>专业：<?php echo ($userinfo["major"]); ?></p>
	  		</div>
	    </div>
		
	<div class="lm02 clearfix">
	    <div class="title">
			<img class="icon" src="/eduresPro/Public/images/dataicon.jpg" />
			<h2>日历</h2>
	    </div>
	     <div class="detail"> 
	  		<!--<img class="" src="images/kj_01.jpg" /> -->
	  	    <div id="imgdate"></div>
	  		<!--<img class="" src="/eduresPro/Public/images/kj_01.jpg" /> -->  
	  		<div  style="width:212px;height:204px;"  id="imgdate1"></div>
	  		<script type="text/javascript">
             message_date("#imgdate");
            </script>
	    </div>
   </div>
	<div class="lm03">
	    <div class="title">
	    	<img style="padding-right:5px;" class="icon" src="/eduresPro/Public/images/weaicon.jpg" />
			<h2>天气</h2>
	  </div>
	 <div class="detail"> 
	  	  <!--<img class="" src="images/kj_02.jpg" /> -->
	  	  <iframe src="http://www.thinkpage.cn/weather/weather.aspx?uid=U578735513&cid=CHHN000000&l=zh-CHS&p=SMART&a=0&u=C&s=11&m=2&x=1&d=3&fc=B00C22&bgc=C6C6C6&bc=&ti=1&in=1&li=&ct=iframe" 
	  	  frameborder="0" scrolling="no" width="214" height="300" allowTransparency="true"></iframe>
	  </div>
    </div>
</div>   <!--leftbar结束-->

<div class="mainbody">
    <div class="currmenu">
		  <ul class="rig_nav" id="intrL">
				<li  class="hidden a1"><a href="#">资源反馈消息</a>|<a href="#">短消息</a></li>
				<li  class="hidden a2"><a href="#">个人信息中心</a></li>
				<li class="hidden a2"><a href="#">课程资源</a>|<a href="#">非课程资源</a></li>
				<li><a href="#">公共信息模块</a></li>
				<li class="hidden a4"><a href="#">发布留言</a></li>
		  </ul>		  
    </div>
	
	<div class="tip">
		<p class="goom"><?php echo ($info["alert"]); ?>，<?php echo ($userinfo["username"]); ?>！</p>
		<p>您目前有<span>4</span>条资源反馈消息，<span>6</span>条短消息</p>
    </div>
   
   <div class="center clearfix">
   		<div class="title" id="publish">
			<img src="/eduresPro/Public/images/listicon.jpg" class="icon fl" style="padding-top:13px;">
        	<h2 class="fl">公告管理模块</h2>
			<div class="am-dropdown fr" data-am-dropdown>
				<a  class="am-dropdown-toggle" data-am-dropdown-toggle>发布公告</a>
				<ul class="am-dropdown-content">
				  <li><a href="Announcement_Editor.html">1. 发布公告</a></li>
				  <li onClick="ShowDiv('MyDiv','fade')"><a href="#">2.  发布相关文件</a></li>
				</ul>
			</div>
        </div>

		<div class="con">
		  <div class="intro fl">
				<h4><a href="#">公告栏</a><span class="fr"><a href="#">更多>></a></span></h4>
				<ul>
					<li><a href="#"><span title="关于提交课程资源的要求">关于提交课程资源的要求</span><i>2015-07-21</i></a></li>
				</ul>

		  </div>
		   <div class="news fl">
				<h4><a href="#">课程资源</a><span class="fr"><a href="#">更多>></a></span></h4>
				<ul>
					<li><a href="#"><span title="李小雅老师操作系统原理课程相关资源">李小雅老师操作系统原理课程相关资源</span><i>2015-07-21</i></a></li>
					<li><a href="#"><span title="李小雅老师操作系统原理课程相关资源">李小雅老师操作系统原理课程相关资源</span><i>2015-07-21</i></a></li>
					<li><a href="#"><span title="李小雅老师操作系统原理课程相关资源">李小雅老师操作系统原理课程相关资源</span><i>2015-07-21</i></a></li>
					<li><a href="#"><span title="李小雅老师操作系统原理课程相关资源">李小雅老师操作系统原理课程相关资源</span><i>2015-07-21</i></a></li>
					<li><a href="#"><span title="李小雅老师操作系统原理课程相关资源">李小雅老师操作系统原理课程相关资源</span><i>2015-07-21</i></a></li>
					<li><a href="#"><span title="李小雅老师操作系统原理课程相关资源">李小雅老师操作系统原理课程相关资源</span><i>2015-07-21</i></a></li>
					<li><a href="#"><span title="李小雅老师操作系统原理课程相关资源">李小雅老师操作系统原理课程相关资源</span><i>2015-07-21</i></a></li>
					<li><a href="#"><span title="李小雅老师操作系统原理课程相关资源">李小雅老师操作系统原理课程相关资源</span><i>2015-07-21</i></a></li>
					<li><a href="#"><span title="李小雅老师操作系统原理课程相关资源">李小雅老师操作系统原理课程相关资源</span><i>2015-07-21</i></a></li>
					<li><a href="#"><span title="李小雅老师操作系统原理课程相关资源">李小雅老师操作系统原理课程相关资源</span><i>2015-07-21</i></a></li>
					<li><a href="#"><span title="李小雅老师操作系统原理课程相关资源">李小雅老师操作系统原理课程相关资源</span><i>2015-07-21</i></a></li>
					<li><a href="#"><span title="李小雅老师操作系统原理课程相关资源">李小雅老师操作系统原理课程相关资源</span><i>2015-07-21</i></a></li>
				</ul>
		  </div>
		  <div class="intro fr file">
				<h4><a href="#">相关文件</a><span class="fr"><a href="#">更多>></a></span></h4>
				<ul>
					<li><a href="#"><span title="关于提交课程资源的要求">关于提交课程资源的要求</span><i>2015-07-21</i></a></li>
				</ul>
		  </div>
		</div>
		
		<div class="case">
			<h4><a href="#">相关录制视频</a><span class="fr"><a href="#">更多>></a></span></h4>
			<div class="slider" id="img-play">
			
				
			 <div class="indexmaindiv" id="indexmaindiv">
			<div class="indexmaindiv1 clearfix" >
				<div class="stylesgoleft" id="goleft"><a class="pre"></a></div>
			  <div class="maindiv1 " id="maindiv1">
				<ul id="count1">
					<li>
						<a href="#">
						 <div>
							<video id="player_a" class="projekktor" title="我的视频"  controls>
								<source src="images/video.mp4" type="video/mp4" />
								<source src="images/video.mp4" type="video/ogg" />
								Your browser does not support HTML5 video.							
							</video>
						 </div>
					  </a>	
					 <p>操作系统原理第一讲</p>
					 <p>主讲人：李小雅</p>
					 </li>
					<li>
						<a href="#">
						 <div>
							<video id="player_a" class="projekktor" title="我的视频"  controls>
								<source src="images/video.mp4" type="video/mp4" />
								<source src="images/video.mp4" type="video/ogg" />
								Your browser does not support HTML5 video.							
							</video>
						 </div>
					  </a>	
					  <p>操作系统原理第一讲</p>
					  <p>主讲人：李小雅</p>
					 </li>
					<li>
						<a href="#">
						 <div>
							<video id="player_a" class="projekktor" title="我的视频"  controls>
								<source src="images/video.mp4" type="video/mp4" />
								<source src="images/video.mp4" type="video/ogg" />
								Your browser does not support HTML5 video.							
							</video>
							
						 </div>
					  </a>
					  <p>操作系统原理第一讲</p>
					  <p>主讲人：李小雅</p>
					 </li>
					<li>
						<a href="#">
						 <div>
							<video id="player_a" class="projekktor" title="我的视频"  controls>
								<source src="images/video.mp4" type="video/mp4" />
								<source src="images/video.mp4" type="video/ogg" />
								Your browser does not support HTML5 video.							
							</video>
						 </div>
					  </a>
					  <p>操作系统原理第一讲</p>
					  <p>主讲人：李小雅</p>
					 </li>
					<li>
						<a href="#">
						 <div>
							<video id="player_a" class="projekktor" title="我的视频"  controls>
								<source src="images/video.mp4" type="video/mp4" />
								<source src="images/video.mp4" type="video/ogg" />
								Your browser does not support HTML5 video.							
							</video>
						 </div>
					  </a>	
					  <p>操作系统原理第一讲</p>
					  <p>主讲人：李小雅</p>
					 </li>
					<li>
						<a href="#">
						 <div>
							<video id="player_a" class="projekktor" title="我的视频"  controls>
								<source src="images/video.mp4" type="video/mp4" />
								<source src="images/video.mp4" type="video/ogg" />
								Your browser does not support HTML5 video.							
							</video>
						 </div>
					  </a>	
					  <p>操作系统原理第一讲</p>
					  <p>主讲人：李小雅</p>
					 </li>
					<li>
						<a href="#">
						 <div>
							<video id="player_a" class="projekktor" title="我的视频"  controls>
								<source src="images/video.mp4" type="video/mp4" />
								<source src="images/video.mp4" type="video/ogg" />
								Your browser does not support HTML5 video.							
							</video>
						 </div>
					  </a>
					  <p>操作系统原理第一讲</p>
					  <p>主讲人：李小雅</p>
					</li>
					<li>
						<a href="#">
						 <div>
							<video id="player_a" class="projekktor" title="我的视频"  controls>
								<source src="images/video.mp4" type="video/mp4" />
								<source src="images/video.mp4" type="video/ogg" />
								Your browser does not support HTML5 video.						
							</video>
						 </div>
					  </a>
					  <p>操作系统原理第一讲</p>
					  <p>主讲人：李小雅</p>
					</li>
				</ul>
			  </div>
				<div class="stylesgoright" id="goright"><a  class="next"></a></div>
			</div>
		  </div>
			 
		</div>
	</div>
                              
</div> <!--center结束-->
   
 </div>   <!---mainbody结束-->
</div>   <!---container结束-->

<div class="footer clearfix">
	<p class="one">地址：长沙市岳麓区中南大学</p>
    <p>电话：0731-84204761/0731-84204762/0731-84204763/0731-84204753</p>
    <p>传真：0755-26730372   网址：www.csuRM.com </p>
    <p class="two">版权所有：长沙市岳麓区中南大学，侵权必究</p>
</div>

<script type="text/javascript">   <!--发布相关文件-->
	//弹出隐藏层
	function ShowDiv(show_div,bg_div){
	document.getElementById(show_div).style.display='block';
	document.getElementById(bg_div).style.display='block' ;
	var bgdiv = document.getElementById(bg_div);
	bgdiv.style.width = document.body.scrollWidth;
	// bgdiv.style.height = $(document).height();
	$("#"+bg_div).height($(document).height());
	};
	//关闭弹出层
	function CloseDiv(show_div,bg_div)
	{
	document.getElementById(show_div).style.display='none';
	document.getElementById(bg_div).style.display='none';
	};
</script>

<script type="text/javascript">
window.onload = function () {
	var oBtnLeft = document.getElementById("goleft");
	var oBtnRight = document.getElementById("goright");
	var oDiv = document.getElementById("indexmaindiv");
	var oDiv1 = document.getElementById("maindiv1");
	var oUl = oDiv.getElementsByTagName("ul")[0];
	var aLi = oUl.getElementsByTagName("li");
	var now = -1 * (aLi[0].offsetWidth + 0);  //改变前面的数字(-1)可以控制其一次滚动的数量,而改变数字0可以控制移动的长度的增值.
	oUl.style.width = aLi.length * (aLi[0].offsetWidth + 0) + 'px';//改变数字0可以控制移动的长度的增值
	oBtnRight.onclick = function () {
		var n = Math.floor((aLi.length * (aLi[0].offsetWidth + 0) + oUl.offsetLeft) / aLi[0].offsetWidth);

		if (n <= 4) {
			move(oUl, 'left', 0);
		}
		else {
			move(oUl, 'left', oUl.offsetLeft + now);
		}
	}
	oBtnLeft.onclick = function () {
		var now1 = -Math.floor((aLi.length / 4)) * 4 * (aLi[0].offsetWidth + 0); 
		if (oUl.offsetLeft >= 0) {
			move(oUl, 'left', now1);
		}
		else {
			move(oUl, 'left', oUl.offsetLeft - now);
		}
	}
	var timer = setInterval(oBtnRight.onclick, 5000);
	oDiv.onmouseover = function () {
		clearInterval(timer);
	}
	oDiv.onmouseout = function () {
		timer = setInterval(oBtnRight.onclick, 5000);
	}

};

function getStyle(obj, name) {
	if (obj.currentStyle) {
		return obj.currentStyle[name];
	}
	else {
		return getComputedStyle(obj, false)[name];
	}
}

function move(obj, attr, iTarget) {
	clearInterval(obj.timer)
	obj.timer = setInterval(function () {
		var cur = 0;
		if (attr == 'opacity') {
			cur = Math.round(parseFloat(getStyle(obj, attr)) * 100);
		}
		else {
			cur = parseInt(getStyle(obj, attr));
		}
		var speed = (iTarget - cur) /4;
		speed = speed > 0 ? Math.ceil(speed) : Math.floor(speed);
		if (iTarget == cur) {
			clearInterval(obj.timer);
		}
		else if (attr == 'opacity') {
			obj.style.filter = 'alpha(opacity:' + (cur + speed) + ')';
			obj.style.opacity = (cur + speed) / 100;
		}
		else {
			obj.style[attr] = cur + speed + 'px';
		}
	}, 50);
}  
</script>


<script type="text/javascript" src="/eduresPro/Public/js/video_jquery.js"></script>
<script type="text/javascript" src="/eduresPro/Public/js/video.js"></script>

<script type="text/javascript" src="/eduresPro/Public/js/amazeui.min.js"></script>
<script type="text/javascript"  src="/eduresPro/Public/js/jquery.min.js"></script>

<script src="js/jquery-1.7.2.js" type="text/javascript"></script>
<script src="js/zyFile.js" type="text/javascript"></script>
<script  src="js/zyUpload_4.js" type="text/javascript"></script>
<script  src="js/upload_demo.js" type="text/javascript"></script>


</body>
</html>