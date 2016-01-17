<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="/eduresPro/index.php/Home/Index/upload" enctype="multipart/form-data" method="post">
	<input type="file" name="photo" />
	<input type="submit" value="提交" />
</form>
<?php echo ($name); ?>
</body>
</html>