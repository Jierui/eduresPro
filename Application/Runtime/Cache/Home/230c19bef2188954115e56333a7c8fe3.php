<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="中南大学远程教育资源管理系统" />
<title>中南大学远程教育资源管理系统</title>
<link href="/eduresPro/Public/otherfiles/styles/glDatePicker.flatwhite.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="/eduresPro/Public/css/css.css" />
<link type="text/css" rel="stylesheet" href="/eduresPro/Public/css/style.css" />
<script src="/eduresPro/Public/js/ChangeContent.js" type="text/javascript"></script> 
<script src="/eduresPro/Public/js/jquery2.1.4.js" type="text/javascript"></script>
<script src="/eduresPro/Public/otherfiles/js/glDatePicker.min.js"></script>
<script src="/eduresPro/Public/otherfiles/js/datePicker.js"></script> 
<script src="/eduresPro/Public/otherfiles/js/message_board.js"></script> 
<script>
$(function(){
	$('.changeInfo').click(function(){
		$('.InfoList').hide();
		$('.InfoList2').show();
    });
	$('.btn2').click(function(){
		var val=$(".InfoList2").val()
		$('.InfoList2').hide();
		$('.InfoList').show().text(val);
		
	})
})

</script>

<!--<script>
$(function(){
	$('.repeat_info').click(function(){
		$('.repeat_box').hide();
		$('.repeat_box').show();
    });
	$('.btn2').click(function(){
		var val=$(".repeat_box").val()
		$('.repeat_box').hide();
		$('.repeat_box').show().text(val);
		
	})
})

</script>-->



<script>
$(function(){
	$('.repeat_info2').click(function(){
		$('.repeat_box2').hide();
		$('.repeat_box2').show();
    });
	$('.btn3').click(function(){
		var val=$(".repeat_box2").val()
		$('.repeat_box2').hide();
		$('.repeat_box2').show().text(val);
		
	})
})

</script>

</head>

<body style="background:none;">

<div class="header">
   <div class="top">
		<img class="logo" src="/eduresPro/Public/images/logo.jpg" />
		<ul class="nav" id="intrL-T">
		   <li onMouseOver="change(this)"><a href="message_feedback">消息提醒</a></li>
		   <li onMouseOver="change(this)"><a href="personal_center">个人中心</a></li>
		   <li onMouseOver="change(this)"><a href="Teacher_Resource" >资源管理</a></li>
		   <li onMouseOver="change(this)"><a href="#" >公告管理</a></li>
		   <li    class="seleli"  onMouseOver="change(this)"><a href="message_board" >留言板</a></li>
		</ul>
		<a href="<?php echo U('Home/Index/exit_login');?>" class="exit">退出</a>
   </div>
</div>   <!--header结束-->
	
<!--<div class="container clearfix">
    <div class="leftbar clearfix">
		<div class="lm01 clearfix"> 
			<img class="peptx" src="/eduresPro/Public/images/tximg.jpg" /><a href="#" class="changeImg">更换头像</a>
	   		 <div class="pepdet">
				<p>姓名：李小雅</p>
				<p>层次：教授</p>
				<p>专业：计算机科学与技术</p>
	  		</div>
	    </div>   -->
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
	  		<!--<img class="" src="/eduresPro/Public/images/kj_01.jpg" /> -->
	  		<div id="imgdate"></div>
	  		<!--<img class="" src="/eduresPro/Public/images/kj_01.jpg" /> -->  
	  		<div  style="width:212px;height:204px;"  id="imgdate1"></div>
	  		<script type="text/javascript">
             message_date("#imgdate");
            </script>
	    </div>
   </div>
	
	<div class="lm03 clearfix">
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
				<li  class="hidden a1"><a href="#">资源反馈消息</a>|<a href="#">短消息</a></li>
				<li class="hidden"><a href="#">个人信息中心</a></li>
				<li class="hidden a2"><a href="#">课程资源</a>|<a href="#">非课程资源</a></li>
				<li class="hidden a3"><a href="#">公共信息模块</a></li>
				<li class="a4"><a href="#">发布留言</a></li>
		  </ul>		  
    </div>
	
	 <div class="adtip clearfix">
        <div class="tip">
        	<!--<p class="goom">早上好，小雅！</p>-->
        	<p class="goom"><?php echo ($info["alert"]); ?>，<?php echo ($userinfo["username"]); ?>！</p>
        	<p>您目前有<span>4</span>条资源反馈消息，<span>6</span>条短消息</p>
       </div>
   
    <div class="rig_lm03">
        <div class="title">
			<img src="/eduresPro/Public/images/listicon.jpg" class="icon" style="padding-top:13px;">
        	<h2>留言板</h2>
        </div>
	 </div>	 
  </div> <!--adtip结束-->
   
   <div class="message per_infor">
   		<div class=" changeInfo"><a href="#">发布留言</a></div>
		<!--onsubmit="return board_chek_form()"-->
		<div class="InfoList2 hidden">
				<form role="form" class="form form2" id="submitmessageform"  method="post" action="submitMessageBoard">
					<div class="group">
						<label>主&nbsp;题:&nbsp; </label>
						<input type="text" class="form-control" placeholder="请输入你的主题" name="Caption" required>
						<label class="note" style="font-size:12px;" id="captionnote">长度不要超过50个字</label>
					</div>
					
					<div class="group">
						<label>内&nbsp;容:&nbsp; </label>
						<textarea rows="5" cols="50" name="Content" required>
						</textarea>
						<label class="note" style="font-size:12px;" id="contentnote"></label>
					</div>
					
					<div class="group">
						<!--<button type="submit" class="btn  btn-primary" onclick="return board_chek_form()">发表留言</button>-->
						<input type="submit" class="btn  btn-primary"  value="发表留言" />
					 </div>
			 </form>
		  </div> <!--InfoList2结束-->
		  
		  <div class="message_board clearfix">
		  <?php if(is_array($arraymessage)): foreach($arraymessage as $key=>$item): ?><div class="mess_info">
				<div class="Mess_por fl">
					<img src="/eduresPro/<?php echo ($item["leamessage"]["imagepath"]); ?>" align="头像" />
					<?php $userid = $item['leamessage']['userid']; ?>
					<p class="names"><?php echo ($user->where("`userID`= $userid")->getField('userName')); ?></p>
					<p class="names"><?php echo ($user->where("`userID`=$userid")->getField('Level')); ?></p>
				</div>
				<div class="mess_con fl">
					<div class="time" id="time">
							<span class="detail_time">于<?php echo ($item["leamessage"]["time"]); ?>发布的留言</span>
							<a href="#" class="repeat_info" onclick="getLeamessageID(this,<?php echo ($item["leamessage"]["messageid"]); ?>)">回复</a>
							<?php if(session('userID') == $userid){?>
							<a href="delMessage?mid=<?php echo $item['leamessage']['messageid']?>" class="del">删除</a>
							<?php } ?>
					</div>
					<div class="sub_con">
							<div class="subject">
								<p><b>【主题】<?php echo ($item["leamessage"]["caption"]); ?></b></p>
							</div>
							<div class="content">
								<p><?php echo ($item["leamessage"]["content"]); ?></p>
							</div>
					</div>
					<?php $ansmessage = $item['ansmessage'];$demo="1";?>
					<?php if(empty($ansmessage)==true): ?><div class="repeat_con">
							<img src="/eduresPro/Public/images/tximg.jpg" alt="头像" style="visibility:hidden;"/>	
					 </div>
					<?php else: ?>
					<?php if(is_array($ansmessage)): foreach($ansmessage as $key=>$value): $luserid = $value['userid'];?>
					<div class="repeat_con">
							<img src="/eduresPro/<?php echo ($value["imagepath"]); ?>" alt="头像" />
							<label class="names"><?php echo ($user->where("`userID`= $luserid")->getField('userName')); ?></label>
							<span><?php echo ($value["content"]); ?></span>
							<br />
							<span class="detail_time"><?php echo ($value["time"]); ?></span>
							<!--<a href="#" class="repeat_info">回复</a>
							<a href="#" class="del">删除</a>-->
					 </div><?php endforeach; endif; endif; ?>
					<!--<div class="repeat_con">
							<img src="/eduresPro/Public/images/tximg.jpg" alt="头像" />
							<label class="names">王凌：</label>
							<span>我很赞同你的观点！</span>
							<br />
							<span class="detail_time">2016年3月3日14：59</span>
							<a href="#" class="repeat_info">回复</a>
							<a href="#" class="del">删除</a>
					 </div>-->
					 
					 
					 <div class="repeat_box hidden">
							<textarea rows="1" cols="50" required class="ansmessagetext"></textarea>
							<br />
							<button type="button" class="answer" onclick="ansmessage(this,<?php echo session('userID');?>)">回复</button>
			   		 </div> <!--回复框-->
				</div>  <!--mess_con结束-->
			</div> <!--mess_info结束--><?php endforeach; endif; ?>
		  </div> <!--message_board结束-->
		  <div class="fanye clearfix">
                   <p class="fytip">Showing 1 to 7 of 12 entries</p>
                   <div class="yem">
					  <ul>
						 <li><a href="message_board?page=1">First</a></li>
						 <li><a href="message_board?page=<?php echo ($page-1); ?>">&lt;</a></li>
						 <?php for($i=1;$i<=$totalPage;$i++){ if($page == $i){?>
						          <li class="sellify"><a href="message_board?page={$i}"><?php echo ($i); ?></a></li>
						          <?php }else{ ?>
						           <li><a href="message_board?page=<?php echo ($i); ?>"><?php echo ($i); ?></a></li>
						 <?php } }?>
						 <li><a href="message_board?page=<?php echo ($page+1); ?>">&gt;</a></li>
						 <li><a href="message_board?page=<?php echo ($totalPage); ?>">Last</a></li>
					  </ul>
                  </div>
           </div>  <!--fanye结束-->
			  
   </div>   <!--message结束-->
</div>   <!--mainbody结束-->
</div> <!--container结束-->

<div class="footer clearfix">
	<p class="one">地址：长沙市岳麓区中南大学</p>
    <p>电话：0731-84204761/0731-84204762/0731-84204763/0731-84204753</p>
    <p>传真：0755-26730372   网址：www.csuRM.com </p>
    <p class="two">版权所有：长沙市岳麓区中南大学，侵权必究</p>
</div>
</body>
</html>