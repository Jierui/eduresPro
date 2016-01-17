<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>跳转</title>
</head>
<body>
<center>
<div>
<span style="font-size:25px;color:red"><?php echo ($info); ?></span>
<br>
<span>跳转等待时间：<b id="wait"><?php echo ($time); ?></b></span>
</div>
<div>
<a href="<?php echo ($url); ?>" id="href"><span>点击此处跳转</span></a>
</div>
</center>
<script type="text/javascript">
(function(){
	var wait = document.getElementById('wait'),href = document.getElementById('href').href;
	var interval = setInterval(function(){
		var time = --wait.innerHTML;
		if(time <= 0) {
			location.href = href;
			clearInterval(interval);
		};
	}, 1000);
	})();
</script>
</body>
</html>