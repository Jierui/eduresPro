<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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

<title>登录页</title>

</head>

<body onload="createCode()">
	<form role="form" class="form" name="login" method="post" action="/eduresPro/index.php/Home/Index/login">
		<div class="group">
			<label>用户名: </label>
			<input type="text" class="form-control" name="userName" placeholder="请输入名称" required>  
		</div>
		
		<div class="group">			
		 	<label>密&nbsp;&nbsp;&nbsp;码: </label>
		 	<input type="password" class="form-control" name="Passard" placeholder="请输入密码" requried>  <a href="#" class="find_psd"><u>&nbsp;忘记密码？</u></a>
		</div>
		
		<div class="group">
		 	 <label>验证码: </label>
		 	<input type="text" class="form-control verify" name="verify"> 
		    <!--<span id="discode"></span><a href="#" onclick="createCode()"><u>&nbsp;看不清，换一张</u></a>  -->
		    <img alt="看不清，请点击" src="/eduresPro/index.php/Home/Index/verify" onclick="this.src='/eduresPro/index.php/Home/Index/verify/'+Math.random()">
		    <?php if(empty($error) == false): ?><center>
	          <span style="color:red;font-size:20px;"><?php echo ($error); ?></span>
	         </center><?php endif; ?>
	     </div>
		 
		 <div class="group2">		    
		 	<button type="submit" class="btn  btn-primary">登录</button>
		 	<a href="/eduresPro/index.php/Home/Index/beforregister"><button type="button" class="btn  btn-primary">注册</button></a>
		 </div>
	</form>
	
</body>
</html>