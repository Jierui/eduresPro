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
<script type="text/javascript">
$(document).ready(function() {
	projekktor('#player_a'); // instantiation
});
</script>


</head>

<body style="background:none;">

<!---增加资源的审核建议开始--->
<div id="popDiv" class="mydiv" style="display:none;"> 
	<h4>建议框</h4>
	<textarea>请输入你的建议</textarea>
	<button  class="button1" type="submit" onClick="closeDiv1()">确定</button>
	<button class="button2" type="reset" onClick="closeDiv1()">取消</button>
</div>

<div id="bg" class="bg" style="display:none;"></div>

<!---增加资源的审核建议结束--->

<!---增加应提交课程资源记录开始--->
<div id="popDiv2" class="mydiv record_need" style="display:none;"> 
	<h4>新建应提交资源记录</h4>
	<!--<form id="need_submit_form">-->
	<div class="labels"><label>授课教师:</label><input type="text" name="userName" id="re_userName"/></div>
	<div class="labels"><label>教师ID:</label><input type="text" name="userID" id="re_userID" /></div>
	<div class="groups" style="position:relative;">
		<label>课程名称：</label>
		<span class="selects">
		<select name="dws" id="dws" onChange="javascript:document.getElementById('dw').value=document.getElementById('dws').options[document.getElementById('dws').selectedIndex].value;">
			<!--<option value="" style="color:#c2c2c2;">---请选择---</option>-->
			<script type="text/javascript">
			$.ajax({
				type:'post',
				dataType:"json",
				url:'getCourseName',
				async:false,
				success:function(data){
					html = '<option value="" style="color:#c2c2c2;">---请选择---</option>';
					$.each(data,function(index,value){
							html += '<option';
							html += ' value="';
							html += value.coursename;
							html += '">';
							html += value.coursename;
							html += '</option>'
					});
					$("#dws").append($(html));
				}
				
			});
			</script>
			<!--<option value='操作系统原理与设计'>操作系统原理与设计</option>
			<option value='数据库'>数据库</option>
			<option value='Jquuery权威指南'>Jquuery权威指南</option>
			<option value='javascript编程全解'>javascript编程全解</option>-->
		</select>
		</span>
		<span class="select_con">
			<input type="text" name="dw" id="dw" value="">
		</span>
	</div>

	<div class="needs">
		<label>课程概况：</label><select name="OverView" id="re_OverView"><option value="1">需要</option><option value="0">不需要</option></select>
		<!--<label>课程学习：</label><select><option>需要</option><option>不需要</option></select>	-->
		<label>媒体素材：</label><select name="Material" id="re_Material"><option value="1">需要</option><option value="0">不需要</option></select>	
		<label>实验：</label><select name="Experiment" id="re_Experiment"><option value="1">需要</option><option value="0">不需要</option></select>	
		<label>作业：</label><select name="Task" id="re_Task"><option value="1">需要</option><option value="0">不需要</option></select>	
		<label>考试：</label><select name="Exam" id="re_Exam"><option value="1">需要</option><option value="0">不需要</option></select>	
	</div>
	<!--</form>-->
	<div class="buttons">
		<button  class="button1" type="button" onClick="suer_add()">确定</button>
		<button class="button2" type="reset" onClick="closeDiv2()">取消</button>
	</div>
</div>
<div id="bg22" class="bg" style="display:none;"></div>

<!---增加新的应提交课程资源记录开始--->
<div id="fade" class="black_overlay"></div>
<div id="MyDiv" class="white_content">
	<div class="close_box">
		<span onClick="CloseDiv('MyDiv','fade')"><a href="#" class="close">关闭</a></span>
	</div>
	 <div id="demo3" class="demo"></div>   
</div>
<!---增加新的应提交课程资源记录结束--->


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
	  		<!--<img class="" src="images/kj_01.jpg" /> -->
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
	  	  <!--<img class="" src="images/kj_02.jpg" /> -->
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
   
    <div class="rig_lm03 Teach_res video_res asse_res">
		<div id="tabCot_product" class="zhutitab">
            <div class="tabContainer">
				 <ul class="tabHead" id="tabCot_product-li-currentBtn-">
					 <li class="currentBtn"><a href="javascript:void(0)" title="课程视频资源">课程资源</a></li>
					 <li><a href="javascript:void(0)" title="应提交资源" rel="2" onclick="show_need_resource(1)">应提交资源</a></li>
					 <li ><a href="javascript:void(0)" title="应提交资源" rel="2" onclick="showPlanAndProtocol(1,1,false);">资源制作计划</a></li>
					 <li ><a href="javascript:void(0)" title="应提交资源" rel="2" onclick="showPlanAndProtocol(1,2,false);">合作协议</a></li>
				 </ul>
			</div>
			
			<div id="tabCot_product_1" class="tabCot">
				<div class="clearfix Admin_Info">
					<div class="buttons">
					   <div class="fl add">
						  <a href="evaluate_teacher.html"><button type="button" class="evaluate">教师评价</button></a>
						  <button type="button" onclick="through_review()">审核通过</button>
						  <button type="button" onclick="del_resource()">删除</button>
					   </div>
						  
					  <div class="filtrate fl"	>
							<label>筛选：</label>
						  <select data-am-selected="{btnSize: 'sm'}" >
							 <option value="option1">全部资源</option>
							 <option value="option1">已审核资源</option>
							 <option value="option2">待审核资源</option>
							 <option value="option3">最新课程资源</option>
						  </select>
					  </div>
							
						<div class="fr search">
							<!--<input type="text">
							<button type="button">搜索</button>-->
							<div class="am-dropdown fr" data-am-dropdown>
								<button class="am-dropdown-toggle" data-am-dropdown-toggle>统计</button>
								<ul class="am-dropdown-content">
								  <li><a href="Teacher_Resource_Statistics">1. 教师提交资源信息统计</a></li>
								  <li><a href="Teacher_Course_Statistics.html">2. 课程情况统计</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="userList">
					  <table id="special_table" class="tabindex" width="100%" border="0" cellpadding="0" cellspacing="0">
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
							  <th  scope="col"><div>状态</div></th>
							  <th  scope="col"><div>操作</div></th>
						</tr>
						 <?php $countNum = 1;?>
                         <?php if(is_array($showData)): $i = 0; $__LIST__ = $showData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr  class="b_white">
							  <td><input type="checkbox" class="checkbox" value="<?php echo ($arr[0]['userid']); ?>|<?php echo ($arr[0]['courseid']); ?>"/></td>
							  <td><?php echo $countNum++?></td>
							  <?php $ui = $user->where("userID=".$arr[0]['userid'])->select(); ?>
							  <td><a href="#"><?php echo $ui[0]['username'];?></a><p><a href="#"><?php echo $ui[0]['phone'];?></a></p></td>
							  <td><?php echo $ui[0]['major'];?></td>
							  <td><?php echo $ui[0]['level'];?></td>
							  <td><div align="center"><?php echo $course->where("courseID=".$arr[0]['courseid'])->getField("courseName");?></div></td>
							  <td>
								<?php if(is_array($arr)): foreach($arr as $key=>$v): if($v["type"] == 媒体素材): ?><div  class="video clearfix">
								<div class="note1 fl">
									<video id="player_a" class="projekktor" title="我的视频" width="40" height="40" controls>
										<source src="/eduresPro/Uploads/<?php echo ($v["path"]); ?>" type="video/mp4" />
										<source src="/eduresPro/Uploads/<?php echo ($v["path"]); ?>" type="video/ogg" />
										Your browser does not support HTML5 video.
									</video>
								</div>
								<div class="note2 fl">
									<p class="res_name"><a href="#"><?php echo ($v["name"]); ?></a></p>
									<p class="date"><?php echo ($v["time"]); ?></p>
								</div>
								<div class="am-dropdown fr" data-am-dropdown>
                					<a class="am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle>
										<img src="/eduresPro/Public/images/set.png">
									</a>
									<ul class="am-dropdown-content">
									  <li><a href="video?target=<?php echo ($v["resourceid"]); ?>">1. 打开</a></li>
									  <li><a href="resource_download?target=<?php echo ($v["resourceid"]); ?>" target="_blank">2. 下载</a></li>
									  <li><a href="del_single_resource?resourceid=<?php echo ($v["resourceid"]); ?>">3. 删除</a></li>
									</ul>
             				   </div>
						       </div>   <!---video结束--><?php endif; endforeach; endif; ?>
							  </td>
							  <td class="no_video">
							  <?php if(is_array($arr)): foreach($arr as $key=>$v): if($v["type"] == 非媒体素材): ?><div class="note3 clearfix">
									<p class="fl"><a href="#"><?php echo ($v["name"]); ?></a></p>
									<div class="am-dropdown fr" data-am-dropdown>
                					<a class="am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle>
										<img src="/eduresPro/Public/images/set.png">
									</a>
									<ul class="am-dropdown-content">
									  <li><a href="open_resource?resourceid=<?php echo ($v["resourceid"]); ?>" target="_blank">1. 打开</a></li>
									  <li><a href="resource_download?target=<?php echo ($v["resourceid"]); ?>" target="_blank"">2. 下载</a></li>
									  <li><a href="del_single_resource?resourceid=<?php echo ($v["resourceid"]); ?>">3. 删除</a></li>
									</ul>
             				 		</div>
								</div><?php endif; endforeach; endif; ?>
							  </td>
							  <td><?php $end=end($arr); echo $end['time'];?></td>
							  <td class="yccol">
							   <?php  $flg = 0; foreach($arr as $value){ if($value['status']!=1){ echo "待审核"; $flg = 1; break; } } if($flg == 0){ echo "已审核"; } ?>
							  </td>
							  <td class="czcol">
							  	<a href="through_review?user[]=<?php echo ($arr[0]['userid']); ?>&course[]=<?php echo ($arr[0]['courseid']); ?>">审核通过</a>&nbsp;&nbsp;&nbsp;&nbsp;
							  	<a href="delCourseResource?course_del[]=<?php echo $arr[0]['courseid'];?>&user[]=<?php echo $arr[0]['userid'];?>">删除</a>
								<p class="score"><b onClick="score(this)" id="click">打&nbsp;分：</b><span id="t">暂未打分</span></p>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>			  
					 </table>
					 
					</div>	
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
					 </div>  
					 <!--fanye结束-->
	
			  </div>  <!---Admin_Info结束-->
					
			</div>
		</div>

		<div id="tabCot_product_2" class="tabCot"  style="display: none;">
		   <div class="am-panel am-panel-default clearfix">   <!---第一个折叠框开始--->
		  
			  <div class="am-panel-hd" data-am-collapse="{target: '#collapse-panel-3'}">
				  <span>应提交资源列表</span>
				  <span class="am-fr" ><a href="#" class="fold"></a></span>
			  </div>
			  
			  <div class="am-panel-bd am-collapse am-in" id="collapse-panel-3">
			  	<div class="buttons">
				   <div class="fl add">
					  <button type="button" onClick="javascript:showDiv2()"> 新增</button>
					  <button type="button" onclick="delet_need_resource()"> 删除</button>
				   </div>
					  
					<div class="fr search">
						<input type="text">
						<button type="button">搜索</button>
					</div>
	             </div>
			  	<table class="need_submit" id="need_submit_resource">
				</table>
				
				<div class="fanye clearfix bottom_page">
					   <p class="fytip">Showing 1 to 3 of 12 entries</p>
					   <div class="yem">
						  <ul id="yem_need1">
						  </ul>
					  </div>
                 </div>  <!--fanye结束-->
			  </div>
           </div>   <!---第一个折叠框结束--->
		 
		 </div>  <!---tabCot_product—_2结束-->  
		 
		 <div id="tabCot_product_3" class="tabCot"  style="display: none;">
		   <div class="am-panel am-panel-default clearfix">   <!---第一个折叠框开始--->
		  
			  <div class="am-panel-hd" data-am-collapse="{target: '#collapse-panel-1'}">
				  <span>资源制作计划列表</span>
				  <span class="am-fr" ><a href="#" class="fold"></a></span>			  </div>
			  
			  <div class="am-panel-bd am-collapse am-in" id="collapse-panel-1">
			  	<div class="buttons">
				   <div class="fl add">
					  <button type="button" onClick="ShowDiv('MyDiv','fade',1)"> 新增</button>
					  <button type="button" onclick="del_protocolAndPlan(1)"> 删除</button>
				   </div>
					  
					<div class="fr search">
						<input type="text" id="inputtext1" >
						<button type="button" onclick="showPlanAndProtocol(1,1,true)">搜索</button>
					</div>
	             </div>
			  	<table class="need_submit" id="plantable">
					
				</table>
				
				<div class="fanye clearfix bottom_page">
					   <p class="fytip">Showing 1 to 3 of 12 entries</p>
					   <div class="yem">
						  <ul id="planul">
						
						  </ul>
					  </div>
                 </div>  <!--fanye结束-->
			  </div>
           </div>   
		   <!---第一个折叠框结束--->
		 </div>  <!---tabCot_product—_3结束-->  
		 
		 	 <div id="tabCot_product_4" class="tabCot"  style="display: none;">
		   <div class="am-panel am-panel-default clearfix">   <!---第一个折叠框开始--->
		  
			  <div class="am-panel-hd" data-am-collapse="{target: '#collapse-panel-2'}">
				  <span>合作协议列表</span>
				  <span class="am-fr" ><a href="#" class="fold"></a></span>			  </div>
			  
			  <div class="am-panel-bd am-collapse am-in" id="collapse-panel-2">
			  	<div class="buttons">
				   <div class="fl add">
					  <button type="button" onClick="ShowDiv('MyDiv','fade',2)"> 新增</button>
					  <button type="button" onclick="del_protocolAndPlan(2)"> 删除</button>
				   </div>
					  
					<div class="fr search">
						<input type="text" id="inputtext2" >
						<button type="button" onclick="showPlanAndProtocol(1,2,true)">搜索</button>
					</div>
	             </div>
			  	<table class="need_submit" id="protocoltable">
					
				</table>
				
				<div class="fanye clearfix bottom_page">
					   <p class="fytip">Showing 1 to 3 of 12 entries</p>
					   <div class="yem">
						  <ul id="protocolul">
							
						  </ul>
					  </div>
                 </div>  <!--fanye结束-->
			  </div>
           </div>      <!---第一个折叠框结束--->
		 </div>  <!---tabCot_product—_4结束-->  
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
<script type="text/javascript" src="/eduresPro/Public/js/video_jquery.js"></script>
<script type="text/javascript" src="/eduresPro/Public/js/video.js"></script>

<script type="text/javascript" src="/eduresPro/Public/js/amazeui.min.js"></script>
<script type="text/javascript"  src="/eduresPro/Public/js/jquery.min.js"></script>


<script type="text/javascript">   <!--建议框-->
function showDiv1(){
document.getElementById('popDiv').style.display='block';
document.getElementById('bg').style.display='block';
}

function closeDiv1(){
document.getElementById('popDiv').style.display='none';
document.getElementById('bg').style.display='none';
}
</script>

<script type="text/javascript">   <!--应提交资源记录-->
function showDiv2(){
document.getElementById('popDiv2').style.display='block';
document.getElementById('bg22').style.display='block';
}

function closeDiv2(){
document.getElementById('popDiv2').style.display='none';
document.getElementById('bg22').style.display='none';
}
function suer_add(){
	add_need_resource();
	closeDiv2();
}
</script>

<script type="text/javascript">   <!--新建资源框-->
	//弹出隐藏层
	function ShowDiv(show_div,bg_div,flg){
	document.getElementById(show_div).style.display='block';
	document.getElementById(bg_div).style.display='block' ;
	var bgdiv = document.getElementById(bg_div);
	bgdiv.style.width = document.body.scrollWidth;
	// bgdiv.style.height = $(document).height();
	$("#"+bg_div).height($(document).height());
	setflg(flg);
	};
	//关闭弹出层
	function CloseDiv(show_div,bg_div)
	{
	document.getElementById(show_div).style.display='none';
	document.getElementById(bg_div).style.display='none';
	};
</script>

<script>    <!--打分功能-->
function score(a){
    var text=a.nextElementSibling;
    var val=text.innerHTML;
    text.innerHTML="<input type='text' id='n' value="+val+" />";
    document.getElementById("n").addEventListener("blur",function(e){
        text.innerHTML=document.getElementById("n").value;
    });
};
</script>

<script src="/eduresPro/Public/js/jquery-1.7.2.js" type="text/javascript"></script>
<script src="/eduresPro/Public/js/zyFile.js" type="text/javascript"></script>
<script  src="/eduresPro/Public/js/zyUpload_3.js" type="text/javascript"></script>
<script  src="/eduresPro/Public/js/upload_demo_3.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript" src="/eduresPro/Public/js/tab.js"></script> 

</body>
</html>