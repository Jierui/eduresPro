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
<script src="/eduresPro/Public/otherfiles/js/resource.js"></script> 


</head>

<body style="background:none;">
<div class="header">
   <div class="top">
		<img class="logo" src="/eduresPro/Public/images/logo.jpg" />
		<ul class="nav" id="intrL-T">
		   <li onMouseOver="change(this)"><a href="message_feedback">消息提醒</a></li>
		   <li onMouseOver="change(this)"><a href="personal_center">个人中心</a></li>
		   <li   class="seleli"  onMouseOver="change(this)"><a href="Teacher_Resource" >资源管理</a></li>
		   <li onMouseOver="change(this)"><a href="#" >公告管理</a></li>
		   <li onMouseOver="change(this)"><a href="message_board" >留言板</a></li>
		</ul>
		<a href="<?php echo U('Home/Index/exit_login');?>" class="exit">退出</a>
   </div>
</div>   <!--header结束-->
	
<div class="container clearfix">
<div class="leftbar clearfix">
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
				<li><a href="#">课程资源</a>|<a href="#">非课程资源</a></li>
				<li class="hidden a3"><a href="#">公共信息模块</a></li>
				<li class="hidden a4"><a href="#">发布留言</a></li>
		  </ul>		  
    </div>
	
	<div class="tip">
		<p class="goom"><?php echo ($info["alert"]); ?>，<?php echo ($userinfo["username"]); ?>！</p>
		<p>您目前有<span>4</span>条资源反馈消息，<span>6</span>条短消息</p>
    </div>
   
    <div class="rig_lm03 video_res Teach_res  asse_res eva_teacher">
		<div id="tabCot_product" class="zhutitab">
             <div class="title">
			<img src="/eduresPro/Public/images/listicon.jpg" class="icon" style="padding-top:13px;">
        	<h2>教师提交资源信息统计情况</h2>
        </div>
			<div id="tabCot_product_1" class="tabCot">  
				<div class="clearfix Admin_Info">
					<div class="buttons">
					   <div class="fl add">
						  <button type="button" onclick="resource_print()">打印</button>
						  <button type="button" onclick="del_resource()">删除</button>
					   </div>
						  							
						<div class="fr search">
							<!--<input type="text">
							<button type="button">搜索</button>-->
						</div>
					</div>
					<!--startprint--> 
					<div>
				      <table class="tabindex" width="100%" border="0" cellpadding="0" cellspacing="0">
					   <tr>
						  <th><input type="checkbox" /></th>
						  <th>ID</th>
						  <th>授课教师</th>
						  <th>专业</th>
						  <th>层次</th>
						  <th  scope="col"><div>课程名称</div></th>
						  <th  scope="col" colspan="2" class="course_res"><div>课程资源</div>
						  	   <ul class="media">
							   		<li>媒体资源</li>
									<li>非媒体资源</li>
							   </ul>
						  </th>
						  <th scope="col"><div>创建时间</div></th>
					  </tr>
					  <?php $countNum = 1;?>
					  <?php if(is_array($showData)): foreach($showData as $key=>$arr): ?><tr  class="b_white">
						<td><input type="checkbox" class="checkbox" value="<?php echo ($arr[0]['userid']); ?>|<?php echo ($arr[0]['courseid']); ?>"/></td>
						<td><?php echo $countNum++?></td>
						<?php $ui = $user->where("userID=".$arr[0]['userid'])->select(); ?>
						<td><a href="#"><p><?php echo $ui[0]['username'];?></p><p><?php echo $ui[0]['phone'];?></p></a></td>
						  <td><?php echo $ui[0]['major'];?></td>
						  <td><?php echo $ui[0]['level'];?></td>
						  <td><div align="center"><?php echo $course->where("courseID=".$arr[0]['courseid'])->getField("courseName");?></div></td>
						  <td>
						  <?php if(is_array($arr)): foreach($arr as $key=>$v): if($v["type"] == 媒体素材): ?><p class="res_name"><a href="#"><?php echo ($v["name"]); ?></a></p><?php endif; endforeach; endif; ?>
						  </td>
						  <td>
						  	  <?php if(is_array($arr)): foreach($arr as $key=>$v): if($v["type"] == 非媒体素材): ?><p class="res_name"><a href="#"><?php echo ($v["name"]); ?></a></p><?php endif; endforeach; endif; ?>
						  </td>
						  <td><?php $end=end($arr); echo $end['time'];?></td>
					  </tr><?php endforeach; endif; ?>
				   </table>
			    </div>	
			    <!--endprint-->
				 <div class="fanye">
					 <p class="fytip">Showing 1 to 10 of 12 entries</p>
					   <div class="yem">
						  <ul>
							<li><a href="Teacher_Resource?page=1">First</a></li>
							     <li><a href="Teacher_Resource?page=<?php echo ($page-1); ?>">&lt;</a></li>
							     <?php for($value=1;$value<=$totalPage;$value++){ if($value == $page){?>
							     <li class="sellify"><a href="Teacher_Resource?page=<?php echo $value?>"><?php echo $value?></a></li>
							     <?php }else{?>
							     <li><a href="Teacher_Resource?page=<?php echo $value?>"><?php echo $value?></a></li>
							     <?php }}?>
							     <li><a href="Teacher_Resource?page=<?php echo ($page+1); ?>">&gt;</a></li>
							     <li><a href="Teacher_Resource?page=<?php echo ($totalPage); ?>">Last</a></li>
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