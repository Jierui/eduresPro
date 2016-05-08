<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<form action="/eduresPro/index.php/Home/Index/uploading" enctype="multipart/form-data" method="post">
	<input type="file" name="photo" />
	
	<select name="resourceType" value="1">
					<option>媒体素材</option>
					<option>非媒体素材</option>
	</select>';
	<input type="submit" value="提交" />
</form>
</body>
</html>