<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="中南大学远程教育资源管理系统" />
<title>中南大学远程教育资源管理系统</title>
<link href="/eduresPro/Public/otherfiles/styles/glDatePicker.flatwhite.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="/eduresPro/Public/css/css.css" />
<link type="text/css" rel="stylesheet" href="/eduresPro/Public/css/style.css" />
<script src="/eduresPro/Public/js/ChangeContent.js" type="text/javascript"></script>
<script src="/eduresPro/Public/js/jquery2.1.4.js" type="text/javascript"></script>
<script src="/eduresPro/Public/Jquery/js/vendor/jquery.ui.widget.js"></script>
<script src="/eduresPro/Public/Jquery/js/jquery.iframe-transport.js"></script>
<script src="/eduresPro/Public/Jquery/js/jquery.fileupload.js"></script>
<script src="/eduresPro/Public/otherfiles/js/upimg.js"></script>
<script src="/eduresPro/Public/otherfiles/js/glDatePicker.min.js"></script>
<script src="/eduresPro/Public/otherfiles/js/datePicker.js"></script> 
<script>
$(function(){
	$('.changeInfo').click(function(){
		$('.InfoList').hide();
		$('.InfoList2').show();
    });
	$('.btn2').click(function(){
		var val=$(".InfoList2").val()
		$('.InfoList2').hide();
		$('.InfoList').show().text(val);
		
	})
})

</script>
</head>

<body style="background:none;">

<div class="header">
   <div class="top">
		<img class="logo" src="/eduresPro/Public/images/logo.jpg" />
		<ul class="nav" id="intrL-T">
		   <li onMouseOver="change(this)"><a href="message_feedback">消息提醒</a></li>
		   <li  class="seleli"  onMouseOver="change(this)"><a href="personal_center">个人中心</a></li>
		   <li onMouseOver="change(this)"><a href="Teacher_Resource" >资源管理</a></li>
		   <li onMouseOver="change(this)"><a href="Announcement" >公告管理</a></li>
		   <li onMouseOver="change(this)"><a href="message_board" >留言板</a></li>
		</ul>
		<a href="<?php echo U('Home/Index/exit_login');?>" class="exit">退出</a>
   </div>
</div>   <!--header结束-->
	
<!--<div class="container clearfix">
    <div class="leftbar">
		<div class="lm01 clearfix"> 
			<img class="peptx" src="/eduresPro/Public/images/tximg.jpg" /><a href="#" class="changeImg">更换头像</a>
	   		 <div class="pepdet">
				<p>姓名：李小雅</p>
				<p>层次：教授</p>
				<p>专业：计算机科学与技术</p>
	  		</div>
	    </div>-->
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
	  		<!--<img class="" src="/eduresPro/Public/images/kj_01.jpg" /> -->
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
	  	   <!--<img class="" src="/eduresPro/Public/images/kj_02.jpg" /> -->
	  	   <iframe src="http://www.thinkpage.cn/weather/weather.aspx?uid=U578735513&cid=CHHN000000&l=zh-CHS&p=SMART&a=0&u=C&s=11&m=2&x=1&d=3&fc=B00C22&bgc=C6C6C6&bc=&ti=1&in=1&li=&ct=iframe" 
	  	  frameborder="0" scrolling="no" width="214" height="300" allowTransparency="true"></iframe>
	  </div>
    </div>
</div>   <!--leftbar结束-->
  
<div class="mainbody">
    <div class="currmenu">
		  <ul class="rig_nav" id="intrL">
				<li  class="hidden a1"><a href="#">资源反馈消息</a>|<a href="#">短消息</a></li>
				<li><a href="#">个人信息中心</a></li>
				<li class="hidden a2"><a href="#">课程资源</a>|<a href="#">非课程资源</a></li>
				<li class="hidden a3"><a href="#">公共信息模块</a></li>
				<li class="hidden a4"><a href="#">发布留言</a></li>
		  </ul>		  
    </div>
	
    <div class="adtip">
        <div class="tip">
        	<!--<p class="goom">早上好，小雅！</p>-->
        	<p class="goom"><?php echo ($info["alert"]); ?>，<?php echo ($userinfo["username"]); ?>！</p>
        	<p>您目前有<span>4</span>条资源反馈消息，<span>6</span>条短消息</p>
       </div>
   
    <div class="rig_lm03">
        <div class="title">
			<img src="/eduresPro/Public/images/listicon.jpg" class="icon" style="padding-top:13px;">
        	<h2>个人信息</h2>
        </div>
	 </div>	 
	 
	 <div class="per_infor">
	 	<div class="fr changeInfo clearfix"><a href="#">修改资料</a></div>
		<div class="InfoList clearfix form">
			<ul>
				<li>用户名：&nbsp;&nbsp;<span><?php echo ($userinfo["username"]); ?></span></li>
				<li>层&nbsp;&nbsp;&nbsp;次：&nbsp;&nbsp;<span><?php echo ($userinfo["level"]); ?></span></li>
				<li>性&nbsp;&nbsp;&nbsp;别：&nbsp;&nbsp;<span><?php echo ($userinfo["sex"]); ?></span></li>
				<li>专&nbsp;&nbsp;&nbsp;业：&nbsp;&nbsp;<span><?php echo ($userinfo["major"]); ?></span></li>
				<li>电&nbsp;&nbsp;&nbsp;话：&nbsp;&nbsp;<span><?php echo ($userinfo["phone"]); ?></span></li>
				<li>邮&nbsp;&nbsp;&nbsp;箱：&nbsp;&nbsp;<span><?php echo ($userinfo["email"]); ?></span></li>

			</ul>
		</div> <!---InfoList结束-->

		<div class="InfoList2 hidden">
				<form role="form" class="form form2" method="post" action="updateUserInfo" >
				<div class="group">
					<label>用户名:&nbsp; </label>
					<input type="text" class="form-control" placeholder="李小雅" name="userName">
				</div>
										
				<div class="group">
					<label>层&nbsp;&nbsp;&nbsp;次: </label>
					 <select class="form-control" name="Level">
						 <option>讲师</option>
						 <option>副教授</option>
						 <option>教授</option>
					</select>
				</div>
				
				<div class="group">
					<label>专&nbsp;&nbsp;&nbsp;业: </label>
					<input type="text" class="form-control" placeholder="计算机科学与技术" name="Major">  
				</div>
				
				<div class="group">
					<label>电&nbsp;&nbsp;&nbsp;话: </label>
					<input type="text" class="form-control" placeholder="15111354194" name="Phone">  
				</div>
				
				<div class="group">
					<label>邮&nbsp;&nbsp;&nbsp;箱: </label>
					<input type="text" class="form-control" placeholder="752326846@@qq.com" name="Email">  
				</div>
				
				<div class="group">
					<label>性&nbsp;&nbsp;&nbsp;别: </label>
					 <input type="radio" name="Sex" id="optionsRadios3" 
				 value="女"> 女
				 
				  <input type="radio" name="Sex" id="optionsRadios3" 
				 value="男" checked > 男
				</div>
				<div class="group2">
					<button type="submit" class="btn  btn-primary">保存修改</button>
				 </div>
			 </form>
		  </div> <!--InfoList2结束-->
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
</body>
</html>