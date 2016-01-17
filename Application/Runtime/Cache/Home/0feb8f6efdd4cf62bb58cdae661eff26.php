<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="中南大学远程教育资源管理系统" />
<title>中南大学远程教育资源管理系统</title>
<link href="/eduresPro/Public/otherfiles/styles/glDatePicker.darkneon.css" rel="stylesheet" type="text/css">
<link href="/eduresPro/Public/otherfiles/styles/glDatePicker.default.css" rel="stylesheet" type="text/css">
<link href="/eduresPro/Public/otherfiles/styles/glDatePicker.flatwhite.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="/eduresPro/Public/css/css.css" />
<link type="text/css" rel="stylesheet" href="/eduresPro/Public/css/style.css" />
<script src="/eduresPro/Public/js/ChangeContent.js" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/eduresPro/Public/Jquery/js/vendor/jquery.ui.widget.js"></script>
<script src="/eduresPro/Public/Jquery/js/jquery.iframe-transport.js"></script>
<script src="/eduresPro/Public/Jquery/js/jquery.fileupload.js"></script>
<script src="/eduresPro/Public/otherfiles/js/upimg.js"></script>
<script src="/eduresPro/Public/otherfiles/js/glDatePicker.min.js"></script>
<script src="/eduresPro/Public/otherfiles/js/datePicker.js"></script>
</head>

<body style="background:none;">

<div class="header">
   <div class="top">
		<img class="logo" src="/eduresPro/Public/images/logo.jpg" />
		<ul class="nav" id="intrL-T">
		   <li class="seleli" onMouseOver="change(this)"><a href="#">消息提醒</a></li>
		   <li onMouseOver="change(this)"><a href="#">个人中心</a></li>
		   <li onMouseOver="change(this)"><a href="#" >资源管理</a></li>
		   <li onMouseOver="change(this)"><a href="#" >公告管理</a></li>
		   <li onMouseOver="change(this)"><a href="#" >留言板</a></li>
		</ul>
		<a href="<?php echo U('Home/Index/exit_login');?>" class="exit">退出</a>
   </div>
</div>   <!--header结束-->
	
<div class="container clearfix">
    <div class="leftbar">
		<div class="lm01 clearfix"> 
			<img class="peptx" src="/eduresPro/<?php echo ((isset($imgpath) && ($imgpath !== ""))?($imgpath):'Public/images/tximg.jpg'); ?>" /><a  href="javascript:select_img_file();" class="changeImg">更换头像</a>
			<input type="file" name="files[]" id="img_upload" style="display:none"/>
	   		 <div class="pepdet">
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
	  	   <img class="" src="/eduresPro/Public/images/kj_02.jpg" /> 
	  </div>
    </div>
</div>   <!--leftbar结束-->
  
<div class="mainbody">
    <div class="currmenu">
		  <ul class="rig_nav" id="intrL">
				<li><a href="#">资源反馈消息</a>|<a href="#">短消息</a></li>
				<li class="hidden a1"><a href="#">个人信息中心</a></li>
				<li class="hidden a2"><a href="#">课程资源</a>|<a href="#">非课程资源</a></li>
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
			<img src="images/listicon.jpg" class="icon" style="padding-top:13px;">
        	<h2>消息事项</h2>
        </div>
	  
    <div class="detail">
        <div class="inner03">
           <div id="tabCot_product" class="zhutitab">
             <div class="tabContainer">
				  <ul class="tabHead" id="tabCot_product-li-currentBtn-">
					 <li class="currentBtn"><a href="javascript:void(0)" title="绩效考核" rel="1">资源反馈消息</a><span class="red_numb">4</span></li>
					 <li ><a href="javascript:void(0)" title="人事考核" rel="2">短消息</a><span class="red_numb">6</span></li>
				  </ul>
                  <div class="shent"><span>Show entries: </span>
                 	<input style="width:30px;" type="text" value="10">
                 	<img src="images/sz.jpg" class="icon" style="">
				 </div>
             </div>
			
            <div id="tabCot_product_1" class="tabCot" >
				  <table class="tabindex" width="100%" border="0" cellpadding="0" cellspacing="0">
					<tr>
					  <th width="10%" scope="col"><div>头像</div></th>
					  <th width="21%" scope="col"><div>资源名称</div></th>
					  <th width="22%" scope="col"><div>创建时间</div></th>
					  <th width="21%"  scope="col"><div>审核人员</div></th>
					  <th width="7%"  scope="col"><div>状态</div></th>
					  <th width="19%"  scope="col"><div>操作</div></th>
					</tr>
					
					<tr  class="b_white">
					  <td><div align="center"><img src="images/tx.jpg"></div></td>
					  <td class="datacol">操作系统课程概况</td>
					  <td>2015年1月15日</td>
					  <td>张秋杰</td>
					  <td class="yccol">未处理</td>
					  <td class="czcol"><a href="#">处理</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">查看</a></td>
					</tr>
					
					<tr>
					  <td><div align="center"><img src="images/tx.jpg"></div></td>
					  <td class="datacol">操作系统课程概况</td>
					  <td>2015年1月15日</td>
					  <td>张秋杰</td>
					  <td>已处理</td>
					  <td class="czcol"><a href="#">查看</a></td>
					</tr>
					
					<tr  class="b_white">
					  <td><div align="center"><img src="images/tx.jpg"></div></td>
					  <td class="datacol">操作系统课程概况</td>
					  <td>2015年1月15日</td>
					  <td>张秋杰</td>
					  <td class="yccol">未处理</td>
					  <td class="czcol"><a href="#">处理</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">查看</a></td>
					</tr>
					
					<tr>
					  <td><div align="center"><img src="images/tx.jpg"></div></td>
					  <td class="datacol">操作系统课程概况</td>
					  <td>2015年1月15日</td>
					  <td>张秋杰</td>
					  <td>已处理</td>
					  <td class="czcol"><a href="#">查看</a></td>
					</tr>
					
					<tr  class="b_white">
					  <td><div align="center"><img src="images/tx.jpg"></div></td>
					  <td class="datacol">操作系统课程概况</td>
					  <td>2015年1月15日</td>
					  <td>张秋杰</td>
					  <td class="yccol">未处理</td>
					  <td class="czcol"><a href="#">处理</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">查看</a></td>
					</tr>
					
					<tr>
					  <td><div align="center"><img src="images/tx.jpg"></div></td>
					  <td class="datacol">操作系统课程概况</td>
					  <td>2015年1月15日</td>
					  <td>张秋杰</td>
					  <td>已处理</td>
					  <td class="czcol"><a href="#">查看</a></td>
					</tr>
					
					<tr  class="b_white">
					  <td><div align="center"><img src="images/tx.jpg"></div></td>
					  <td class="datacol">操作系统课程概况</td>
					  <td>2015年1月15日</td>
					  <td>张秋杰</td>
					  <td class="yccol">未处理</td>
					  <td class="czcol"><a href="#">处理</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">查看</a></td>
					</tr>
					
					<tr>
					  <td><div align="center"><img src="images/tx.jpg"></div></td>
					  <td class="datacol">操作系统课程概况</td>
					  <td>2015年1月15日</td>
					  <td>张秋杰</td>
					  <td>已处理</td>
					  <td class="czcol"><a href="#">查看</a></td>
					</tr>
					
		
					
				  </table>
				  
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
         </div>   <!--tabCot结束-->
		  
		  
         <div id="tabCot_product_2" class="tabCot"  style="display: none;"> 2222222222 </div>   
          <script language="JavaScript" type="text/javascript" src="js/tab.js"></script> 
		  
        </div>   <!--zhutitab结束-->
     </div>  <!--inner03结束-->  
   </div>   <!---detail结束-->
  </div>   <!---adtip结束-->
 </div>  <!--mainbody结束-->
</div>  <!---container结束-->
</div>

<div class="footer">
	<p class="one">地址：长沙市岳麓区中南大学</p>
    <p>电话：0731-84204761/0731-84204762/0731-84204763/0731-84204753</p>
    <p>传真：0755-26730372   网址：www.csuRM.com </p>
    <p class="two">版权所有：长沙市岳麓区中南大学，侵权必究</p>
</div>
</body>
</html>