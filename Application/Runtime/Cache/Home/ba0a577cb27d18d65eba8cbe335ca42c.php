<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="中南大学远程教育资源管理系统" />
<title>中南大学远程教育资源管理系统</title>
<link href="/eduresPro/Public/otherfiles/styles/glDatePicker.flatwhite.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="/eduresPro/Public/css/css.css" />
<link type="text/css" rel="stylesheet" href="/eduresPro/Public/css/style.css" />
<link type="text/css" rel="stylesheet" href="/eduresPro/Public/css/amazeui.min.css" />
<link type="text/css" rel="stylesheet" href="/eduresPro/Public/css/Upload.css" />
<script src="/eduresPro/Public/js/ChangeContent.js" type="text/javascript"></script> 
<script src="/eduresPro/Public/js/jquery2.1.4.js" type="text/javascript"></script>
<script src="/eduresPro/Public/otherfiles/js/glDatePicker.min.js"></script>
<script src="/eduresPro/Public/otherfiles/js/datePicker.js"></script> 


</script>
</head>

<body style="background:none;">

<div class="header">
   <div class="top">
		<img class="logo" src="/eduresPro/Public/images/logo.jpg" />
		<ul class="nav" id="intrL-T">
		   <li onMouseOver="change(this)"><a href="message_feedback">消息提醒</a></li>
		   <li onMouseOver="change(this)"><a href="personal_center">个人中心</a></li>
		   <li  class="seleli"  onMouseOver="change(this)"><a href="Teacher_Resource" >资源管理</a></li>
		   <li onMouseOver="change(this)"><a href="#" >公告管理</a></li>
		   <li onMouseOver="change(this)"><a href="message_board" >留言板</a></li>
		</ul>
		<a href="<?php echo U('Home/Index/exit_login');?>" class="exit">退出</a>
   </div>
</div>   <!--header结束-->
	
<!--<div class="container clearfix">
    <div class="leftbar">
		<div class="lm01 clearfix"> 
			<img class="peptx" src="images/tximg.jpg" /><a href="#" class="changeImg">更换头像</a>
	   		 <div class="pepdet">
				<p>姓名：李小雅</p>
				<p>层次：教授</p>
				<p>专业：计算机科学与技术</p>
	  		</div>
	    </div>  --> 
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
	  	  <!-- <img class="" src="images/kj_02.jpg" /> -->
	  	  <iframe src="http://www.thinkpage.cn/weather/weather.aspx?uid=U578735513&cid=CHHN000000&l=zh-CHS&p=SMART&a=0&u=C&s=11&m=2&x=1&d=3&fc=B00C22&bgc=C6C6C6&bc=&ti=1&in=1&li=&ct=iframe" 
	  	  frameborder="0" scrolling="no" width="214" height="300" allowTransparency="true"></iframe>
	  </div>
    </div>
</div>   <!--leftbar结束-->
  
<div class="mainbody">
    <div class="currmenu">
		  <ul class="rig_nav" id="intrL">
				<li  class="hidden a1"><a href="#">资源反馈消息</a>|<a href="#">短消息</a></li>
				<li class="hidden a2"><a href="#">个人信息中心</a></li>
				<li><a href="#">课程资源</a>|<a href="#">非课程资源</a></li>
				<li class="hidden a3"><a href="#">公共信息模块</a></li>
				<li class="hidden a4"><a href="#">发布留言</a></li>
		  </ul>		  
    </div>
	
    <div class="adtip">
    <div class="tip">
		<p class="goom"><?php echo ($info["alert"]); ?>，<?php echo ($userinfo["username"]); ?>！</p>
		<p>您目前有<span>4</span>条资源反馈消息，<span>6</span>条短消息</p>
    </div>
   
    <div class="rig_lm03">
        <div class="title">
			<img src="/eduresPro/Public/images/listicon.jpg" class="icon" style="padding-top:13px;">
        	<h2>视频</h2>
        </div>
	 </div>	 
	 
	 <div class="per_infor play_video">
	 	<p class="introduce"><b>视频名称：</b><?php echo ($resourceInfo["name"]); ?></p>
		<video id="player_a" class="projekktor" poster="/eduresPro/Public/images/intro.png" title="这是视频的标题" width="640" height="385" controls>
			<source src="/eduresPro/Uploads/<?php echo ($resourceInfo["path"]); ?>" type="video/mp4" />
			<source src="/eduresPro/Uploads/<?php echo ($resourceInfo["path"]); ?>" type="video/ogg" />
			Your browser does not support HTML5 video.
		</video>
		<div class="introduce">
			<p><b>课程名称：</b><?php echo ($courseName); ?></p>
			<p><b>授课教师：</b><?php echo ($teacher[0]['username']); echo ($teacher[0]['level']); ?></p>
			<p><b>创建时间：</b><?php echo ($resourceInfo["time"]); ?></p>
		</div>
	 </div>   
   </div>  
 </div>   <!---mainbody结束-->
</div>   <!---container结束-->

<div class="footer clearfix">
	<p class="one">地址：长沙市岳麓区中南大学</p>
    <p>电话：0731-84204761/0731-84204762/0731-84204763/0731-84204753</p>
    <p>传真：0755-26730372   网址：www.csuRM.com </p>
    <p class="two">版权所有：长沙市岳麓区中南大学，侵权必究</p>
</div>
<script type="text/javascript">
$(document).ready(function() {
	projekktor('#player_a'); // instantiation
});
</script>
<script type="text/javascript" src="/eduresPro/Public/js/jquery.js"></script>
<!-- load projekktor -->
<script type="text/javascript" src="/eduresPro/Public/js/projekktor.js"></script>



</body>
</html>