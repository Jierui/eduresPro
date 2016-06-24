<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="中南大学远程教育资源管理系统" />
<title>中南大学远程教育资源管理系统</title>
<link type="text/css" rel="stylesheet" href="css/amazeui.min.css" />
<link type="text/css" rel="stylesheet" href="css/css.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link type="text/css" rel="stylesheet" href="css/Upload.css" />
<script src="js/ChangeContent.js" type="text/javascript"></script>


</head>

<body style="background:none;">
<div class="header">
   <div class="top">
		<img class="logo" src="images/logo.jpg" />
		<ul class="nav" id="intrL-T">
		   <li onMouseOver="change(this)"><a href="#">消息提醒</a></li>
		   <li onMouseOver="change(this)"><a href="#">个人中心</a></li>
		   <li   class="seleli"  onMouseOver="change(this)"><a href="#" >资源管理</a></li>
		   <li onMouseOver="change(this)"><a href="#" >公告管理</a></li>
		   <li onMouseOver="change(this)"><a href="#" >留言板</a></li>
		</ul>
		<a href="#" class="exit">退出</a>
   </div>
</div>   <!--header结束-->
	
<div class="container clearfix">
<div class="leftbar clearfix">
		<div class="lm01 clearfix"> 
			<img class="peptx" src="images/tximg.jpg" /><a href="#" class="changeImg">更换头像</a>
	   		 <div class="pepdet">
				<p>姓名：李小雅</p>
				<p>层次：教授</p>
				<p>专业：计算机科学与技术</p>
	  		</div>
	    </div>   
		
	<div class="lm02 clearfix">
	    <div class="title">
			<img class="icon" src="images/dataicon.jpg" />
			<h2>日历</h2>
	    </div>
	    <div class="detail"> 
	  		<img class="" src="images/kj_01.jpg" /> 
	    </div>
   </div>
	
	<div class="lm03">
	    <div class="title">
	    	<img style="padding-right:5px;" class="icon" src="images/weaicon.jpg" />
			<h2>天气</h2>
	  </div>
	  <div class="detail"> 
	  	   <img class="" src="images/kj_02.jpg" /> 
	  </div>
    </div>
</div>   <!--leftbar结束-->
<div class="mainbody">
    <div class="currmenu">
		  <ul class="rig_nav" id="intrL">
				<li  class="hidden a1"><a href="#">资源反馈消息</a>|<a href="#">短消息</a></li>
				<li  class="hidden a2"><a href="#">个人信息中心</a></li>
				<li><a href="#">课程资源</a>|<a href="#">非课程资源</a></li>
				<li class="hidden a3"><a href="#">公共信息模块</a></li>
				<li class="hidden a4"><a href="#">发布留言</a></li>
		  </ul>		  
    </div>
	
	<div class="tip">
		<p class="goom">早上好，小雅！</p>
		<p>您目前有<span>4</span>条资源反馈消息，<span>6</span>条短消息</p>
    </div>
   
    <div class="rig_lm03 video_res Teach_res  asse_res eva_teacher">
		<div id="tabCot_product" class="zhutitab">
             <div class="title">
			<img src="images/listicon.jpg" class="icon" style="padding-top:13px;">
        	<h2>课程资源打包及发布情况</h2>
        </div>
			<div id="tabCot_product_1" class="tabCot">  
				<div class="clearfix Admin_Info">
					<div class="buttons">
					   <div class="fl add">
						  <button type="button">打印</button>
						  <button type="button">删除</button>
					   </div>
						  							
						<div class="fr search">
							<input type="text">
							<button type="button">搜索</button>
						</div>
					</div>
					
					<div>
				      <table class="tabindex" width="100%" border="0" cellpadding="0" cellspacing="0">
					   <tr>
						  <th><input type="checkbox" /></th>
						  <th>ID</th>
						  <th>授课教师</th>
						  <th>专业</th>
						  <th>层次</th>
						  <th  scope="col">课程名称</th>
						  <th  scope="col">打包名称</th>
						  <th scope="col">发布时间</th>
					  </tr>
					 <tr  class="b_white">
						  <td><input type="checkbox" /></td>
						  <td>1</td>
						<td><a href="#"><p>张秋杰</p><p>154612267</p></a></td>
						  <td>计算机科学与技术</td>
						  <td>讲师</td>
						  <td><div align="center">操作系统：设计及实现</div></td>
						  <td><div align="center">张秋杰讲师：操作系统-设计及实现</div></td>
						  <td>2016年2月29日</td>
					  </tr>
					 <tr  class="b_white">
						  <td><input type="checkbox" /></td>
						  <td>2</td>
						<td><a href="#"><p>李小雅</p><p>154612267</p></a></td>
						  <td>计算机科学与技术</td>
						  <td>教授</td>
						  <td><div align="center">操作系统：设计及实现</div></td>
						  <td><div align="center">李小雅教授：操作系统-设计及实现</div></td>
						  <td>2016年2月29日</td>
					  </tr>
				   </table>
			    </div>	
				 <div class="fanye">
					 <p class="fytip">Showing 1 to 10 of 12 entries</p>
					   <div class="yem">
						  <ul>
							 <li><a href="#">First</a></li>
							 <li><a href="#">&lt;</a></li>
							 <li class="sellify"><a href="#">1</a></li>
							 <li><a href="#">2</a></li>
							 <li><a href="#">&gt;</a></li>
							 <li><a href="#">Last</a></li>
						  </ul>
					  </div>
				 </div>  <!--fanye结束-->
			  </div>  <!---Admin_Info结束-->
		</div>
	</div>

  </div>  <!---tabCot_product结束-->    
 </div>   <!---mainbody结束-->
</div>   <!---container结束-->
</div>

<div class="footer clearfix">
	<p class="one">地址：长沙市岳麓区中南大学</p>
    <p>电话：0731-84204761/0731-84204762/0731-84204763/0731-84204753</p>
    <p>传真：0755-26730372   网址：www.csuRM.com </p>
    <p class="two">版权所有：长沙市岳麓区中南大学，侵权必究</p>
</div>
</body>
</html>