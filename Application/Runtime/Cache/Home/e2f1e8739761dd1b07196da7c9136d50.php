<?php if (!defined('THINK_PATH')) exit();?><!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">-->
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--确保适当的绘制和触屏缩放，需要在网页的 head 之中添加 viewport meta 标签-->
 
<link href="/eduresPro/Public/css/style.css" type="text/css"  rel="stylesheet"/>    <!--我的样式表-->
<script src="/eduresPro/Public/js/verify.js"></script>

<!--bootstrap-->
<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

<title>注册页</title>

</head>

<body onload="createCode()">
	<form role="form" class="form form2" method="post" action="/eduresPro/index.php/Home/Index/register" id="register_form">
		<div class="group">
			<label>用户名: </label>
			<input type="text" class="form-control" name="userName" placeholder="请输入名称" required> 
		</div>
		
		<div class="group">			
		 	<label>密&nbsp;&nbsp;&nbsp;码: </label>
		 	<input type="password" class="form-control" name="Password" placeholder="请输入密码" required>  <a href="#" class="find_psd"><u>&nbsp;忘记密码？</u></a>
		</div>
		
		<div class="group">
			<label>确认密码: </label>
			<input type="password" class="form-control" name="enpassword" placeholder="确认密码" required>  
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
			<input type="text" class="form-control" name="Major" placeholder="请输入你的专业">  
		</div>
		
		<div class="group">
			<label>电&nbsp;&nbsp;&nbsp;话: </label>
			<input type="text" class="form-control" name="Phone" placeholder="请输入你的电话">  
		</div>
		
		<div class="group">
			<label>邮&nbsp;&nbsp;&nbsp;箱: </label>
			<input type="email" class="form-control" name="Email" placeholder="请输入你的邮箱" required>  
		</div>
		
		<div class="group">
			<label>性&nbsp;&nbsp;&nbsp;别: </label>
			 <input type="radio" name="Sex" id="optionsRadios3" 
         value="F"> 女
		 
		  <input type="radio" name="Sex" id="optionsRadios3" 
          value="M" checked> 男
		</div>
		
		<!--<div class="group">
			<label>上传头像: </label>
			<input type="file" id="inputfile" class="picture" style="display: inline;" > 
		</div>-->
		
		<div class="group2">
		 	<button type="submit" class="btn  btn-primary">注册</button>
		 	<a href="#"><button type="reset" class="btn  btn-primary">重置</button></a>
		</div>
	</form>
	<!--<form class="form form2" action="/eduresPro/index.php/Home/Index/register" enctype="multipart/form-data" method="post" id="img_file_form">
	<div class="group">
			<label>上传头像: </label>
			<input type="file" id="inputfile" class="picture" style="display: inline;" name="file" > 
	</div>
    </form>
    <div class="group2">
		 	<button type="submit" class="btn  btn-primary" onclick="img_file_form.submit();register_form.submit();">注册</button>
		 	<a href="#"><button type="reset" class="btn  btn-primary">重置</button></a>
	</div>-->
</body>
</html>