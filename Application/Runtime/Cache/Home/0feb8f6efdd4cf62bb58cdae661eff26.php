<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="中南大学远程教育资源管理系统" />
<title>中南大学远程教育资源管理系统</title>
<link href="/eduresPro/Public/otherfiles/styles/glDatePicker.flatwhite.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="/eduresPro/Public/css/style.css" />
<script src="/eduresPro/Public/js/ChangeContent.js" type="text/javascript"></script>
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
<!--<script src="/eduresPro/Public/Jquery/js/jquery-1.12.0.min.js"></script>-->
<script src="/eduresPro/Public/js/jquery2.1.4.js" type="text/javascript"></script>
<script src="/eduresPro/Public/Jquery/js/vendor/jquery.ui.widget.js"></script>
<script src="/eduresPro/Public/Jquery/js/jquery.iframe-transport.js"></script>
<script src="/eduresPro/Public/Jquery/js/jquery.fileupload.js"></script>
<script src="/eduresPro/Public/otherfiles/js/upimg.js"></script>
<script src="/eduresPro/Public/otherfiles/js/glDatePicker.min.js"></script>
<script src="/eduresPro/Public/otherfiles/js/datePicker.js"></script>
<script src="/eduresPro/Public/otherfiles/js/face.js"></script> <!-- 消息发送接收 -->
</head>

<body style="background:none;">

<div class="header">
   <div class="top">
		<img class="logo" src="/eduresPro/Public/images/logo.jpg" />
		<ul class="nav" id="intrL-T">
		   <li class="seleli" onMouseOver="change(this)"><a href="message_feedback">消息提醒</a></li>
		   <li onMouseOver="change(this)"><a href="personal_center">个人中心</a></li>
		   <li onMouseOver="change(this)"><a href="Teacher_Resource" >资源管理</a></li>
		   <li onMouseOver="change(this)"><a href="Announcement" >公告管理</a></li>
		   <li onMouseOver="change(this)"><a href="message_board" >留言板</a></li>
		</ul>
		<a href="<?php echo U('Home/Index/exit_login');?>" class="exit">退出</a>
   </div>
</div>   <!--header结束-->
	
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
		  
		  
         <div id="tabCot_product_2" class="tabCot"  style="display: none;">
         <!---消息列表开始--->
		 <div class="imforlist fl">
		 	  <table class="tabindex" width="100%" border="0" cellpadding="0" cellspacing="0">
			  		
					<tr>
					  <th width="8%" scope="col">头像</th>
					  <th width="8%" scope="col">发送者</th>
					  <th width="15%" scope="col">发送内容</th>
					  <th width="10%" scope="col">发送时间</th>
					  <th width="10%"  scope="col">操作</th>
					</tr>
					
					<tr  class="b_white">
					  <td><div align="center"><img src="/eduresPro/Uploads/images/userImg/img_11453007667.jpg"></div></td>
					  <td class="datacol">宋老师</td>
					  <td>琳琳，这个图片太大了</td>
					  <td>2016年1月19日</td>
					  <td class="datacol"><a href="#">回复</a>&nbsp;&nbsp;<a href="#">删除</a></td>
					</tr>
					
					<tr>
					  <td><div align="center"><img src="images/tx.jpg"></div></td>
					  <td class="datacol">王老师</td>
					  <td>之前发的文件有问题</td>
					  <td>2016年1月19日</td>
					  <td class="datacol"><a href="#">回复</a>&nbsp;&nbsp;<a href="#">删除</a></td>
					</tr>
					
					<tr>
					  <td><div align="center"><img src="images/tx.jpg"></div></td>
					  <td class="datacol">王老师</td>
					  <td>之前发的文件有问题</td>
					  <td>2016年1月19日</td>
					  <td class="datacol"><a href="#">回复</a>&nbsp;&nbsp;<a href="#">删除</a></td>
					</tr>
					
					<tr>
					  <td><div align="center"><img src="images/tx.jpg"></div></td>
					  <td class="datacol">王老师</td>
					  <td>之前发的文件有问题</td>
					  <td>2016年1月19日</td>
					  <td class="datacol"><a href="#">回复</a>&nbsp;&nbsp;<a href="#">删除</a></td>
					</tr>
					
					<tr>
					  <td><div align="center"><img src="images/tx.jpg"></div></td>
					  <td class="datacol">王老师</td>
					  <td>之前发的文件有问题</td>
					  <td>2016年1月19日</td>
					  <td class="datacol"><a href="#">回复</a>&nbsp;&nbsp;<a href="#">删除</a></td>
					</tr>
					
					<tr>
					  <td><div align="center"><img src="images/tx.jpg"></div></td>
					  <td class="datacol">王老师</td>
					  <td>之前发的文件有问题</td>
					  <td>2016年1月19日</td>
					  <td class="datacol"><a href="#">回复</a>&nbsp;&nbsp;<a href="#">删除</a></td>
					</tr>
					
					<tr>
					  <td><div align="center"><img src="images/tx.jpg"></div></td>
					  <td class="datacol">张老师</td>
					  <td>之前发的文件有问题</td>
					  <td>2016年1月19日</td>
					  <td><a href="#"  class="yccol">查看</a>&nbsp;&nbsp;<a href="#">删除</a></td>
					</tr>
			 </table>
				  
				   <div class="fanye clearfix">
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
			
			</div>	  <!--inforlist结束--->
				   <div class="chat fr clearfix" id="close">
					<!-- 信息展示框 -->
					<div class="show2">
						   <p class="name" id="t_name" value="">请选择</p>
						   <!--<div class="neirong">
								<img src="/eduresPro/Uploads/images/userImg/img_11453007667.jpg" alt="头像"  class="portrait"/><span>琳琳，这个图片太大了</span>
							</div> 
							
							<div class="neirong fr">
								<span>好的，我修改一下</span><img src="images/tx2.png" alt="头像"  class="portrait"/>
							</div> -->  
					</div>
					<!-- 在线用户框 -->
					<div class="online">
						<p class="friendlist">好友列表(1/<?php echo count($messageinfo) - 1;?>)</p>
						<ul id="onlineid">
							<!--<li><img src="images/tx.jpg" alt="头像" /><a href="#">宋老师</a></li>
							<li><img src="images/tx.jpg" alt="头像" /><a href="#">王老师</a></li>
							<li><img src="images/tx.jpg" alt="头像" /><a href="#">张老师</a></li>
							<li><img src="images/tx.jpg" alt="头像" /><a href="#">李老师</a></li>-->
							<?php if(is_array($messageinfo)): $i = 0; $__LIST__ = $messageinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i; if($data["username"] != session('userName' )): ?><li><img src="/eduresPro/<?php echo ((isset($data["imagepath"]) && ($data["imagepath"] !== ""))?($data["imagepath"]):'Public/images/tximg.jpg'); ?>" alt="头像" />
							<a href="javascript:face_a(<?php echo session('userID');?>,'#face_<?php echo ($data["userid"]); ?>')" 
							id="face_<?php echo ($data["userid"]); ?>"><?php echo ($data["username"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
					<!-- 输入框 -->
					<div class="option">
						<ul>
							<li><a href="javascript:void(0);" id="face" title="表情">^_^</a></li>
							<li><a href="javascript:void(0);" id="face" title="插入图片"><img src="images/image.png" alt="插入图片"  /></a></li>
							<li class="record"><a href="#">聊天记录</a></li>
			 			</ul>
					</div>
					<div class="neir">
						<textarea name="content" class="content" id="content" cols="45" rows="3"  style="width: 394px; height: 70px;"></textarea>
					</div>
					<div class="fs">
						<input type="button" class="button" value="关 闭" />
						<input type="submit" class="submit" value="发 送" />
					</div>
			 </div>	 <!--chat结束--->	
				  <script language="JavaScript" type="text/javascript">
				    deal_send(<?php echo session('userID');?>,'<?php echo ($imgpath); ?>');
				    //messageloop(<?php echo session('userID');?>,'$imgpath');
				    //setInterval(updatemsg(<?php echo session('userID');?>,'<?php echo ($imgpath); ?>'));
				    setInterval("updatemsg(<?php echo session('userID');?>,'<?php echo ($imgpath); ?>')",4000);
				    
				  </script>
             
		 <!---消息列表结束--->
         </div>   <!-- 结束交流 -->
          <script language="JavaScript" type="text/javascript" src="/eduresPro/Public/js/tab.js"></script> 
		  
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