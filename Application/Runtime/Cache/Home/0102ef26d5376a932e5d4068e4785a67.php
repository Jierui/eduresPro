<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<form id="uploadForm" action="uploading" method="post" enctype="multipart/form-data">
				<div class="upload_box">
				<div class="upload_main">
				<div class="upload_choose">
				<div class="cource_res">
				<label>课程名称：</label><select name="courseName"><option>操作系统设计与实现</option><option>操作系统原理</option></select>
				<label>课程名称：</label>
				<label style="margin-left:30px;">资源类型：</label>
				<select name="resourceType">
				<option>媒体素材</option>
				<option>非媒体素材</option>
				</select>
				</div>

	            <div class="convent_choice">
	            <div class="andArea">
	            <div class="filePicker">点击选择文件</div>
	            <input id="fileImage" type="file" size="30" name="fileselect[]" '+multiple+'>
	            </div>
	            </div>
				<span id="fileDragArea" class="upload_drag_area">或者将文件拖到此处</span>
				</div>
		        <div class="status_bar">
		        <div id="status_info" class="info">选中0张文件，共0B。</div>
		        <div class="btns">
		        <div class="webuploader_pick">继续选择</div>
		        <div class="upload_btn">开始上传</div>
		        </div>
		        </div>
				<div id="preview" class="upload_preview"></div>
				</div>';
				<div class="upload_submit">
				<button type="submit" id="fileSubmit" class="upload_submit_btn">确认上传文件</button>
				</div>
				<div id="uploadInf" class="upload_inf"></div>
				</div>
				</form>
</body>
</html>