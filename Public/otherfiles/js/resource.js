var flg = 0;
function through_review(){     //多项操作审核
	flg = 0;
	var s = "?";
	$(".checkbox").each(function(index,box){
		b = $(box);
		//if(b.attr("checked"))
		if(b.prop("checked"))
		{
			flg = 1;
			str = b.val();
			arr = str.split("|");
			s+="user[]=";
			s+=arr[0];
			s+="&";
			s+="course[]=";
			s+=arr[1];
			s+="&";
		}
	});
	if(flg == 0){
		alert("请选中相应的操作项");
		return;
	}
	s = s.substring(0,s.length-1);
	url="through_review";
	url+=s;
	location.href=url;
	document.URL = location.href;
	
}   

function del_resource(){
	flg = 0;
	var s = "?";
	$(".checkbox").each(function(index,box){
		b = $(box);
		//if(b.attr("checked"))
		if(b.prop("checked"))
		{
			flg = 1;
			str = b.val();
			arr = str.split("|");
			s+="user[]=";
			s+=arr[0];
			s+="&";
			s+="course_del[]=";
			s+=arr[1];
			s+="&";
		}
	});
	if(flg == 0){
		alert("请选中相应的操作项");
		return;
	}
	s = s.substring(0,s.length-1);
	url="delCourseResource";
	url+=s;
	location.href=url;
	document.URL = location.href;
}

function resource_print(){
	bdhtml=window.document.body.innerHTML;  
    sprnstr="<!--startprint-->";  
    eprnstr="<!--endprint-->";  
    prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17);  
    prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));  
    window.document.body.innerHTML=prnhtml;  
    window.print(); 
}

function need_submit_resource(){
	
}

function add_need_resource(){
	$.ajax({
		type:"post",
		url:"add_need_resource",
		dataType:"json",
		//data:$('#need_submit_form').serialize(),
		data:{
			userName:$('#re_userName').val(),
			userID:$("#re_userID").val(),
			//courseName:$("#dws option : selected").text(),
			courseName:$("#dw").val(),
			Overview:$("#re_OverView").val(),
			Material:$("#re_Material").val(),
			Experiment:$("#re_Experiment").val(),
			Task:$("#re_Task").val(),
			Exam:$("#re_Exam").val(),
		},
		async:true,
		error:function(){
			alert("添加失败,网络错误");
		},
		success:function(data){
			if(data.status == 1){
				show_need_resource(1);
				//alert("添加成功");
			}else if(data.status == 0){
				alert(data.msg);
			}else if(data.status == 101){
				console.log(data.msg);
			}else{
				alert(data.msg);
			}
		}
	});
}


function show_need_resource(page){   //显示需提交资源
	$.ajax({
		type:"post",
		url:"show_need_resource",
		dataType:"json",
		async:true,
		data:{
			Page:page,
			
		},
		error:function(){
			alert('网络错误');
		},
		success:function(Arraydata){
			div = $("#need_submit_resource");
			div.empty();
			var html='<tr> \
				<th><input type="checkbox"></th> \
				<th>ID</th> \
				<th>授课教师</th> \
				<th>专业</th> \
				<th>层次</th> \
				<th>课程名称</th> \
				<th>课程概况</th> \
				<!--<th>课程学习</th>--> \
				<th>媒体素材</th> \
				<th>实验</th> \
				<th>作业</th> \
				<th>考试</th> \
				<th>创建时间</th> \
			</tr>';
			$.each(Arraydata.data,function(index,data){
				html+= '<tr>';
				html+='<td><input type="checkbox" class="needresourcebox" value="';
				html+=data.needid;    //id
				html+='" /></td>';
				html+='<td>';
				html+=data.count;     //数字
				html+='</td>';
				html+='<td><a href="#"><p>';
				html+=data.userName; //用户
				html+='</p><p>';
				html+=data.phone;   //手机号
				html+='</p></a></td>';
				html+='<td>';
				html+=data.major;   //专业
				html+='</td>';
				html+='<td>';
				html+=data.level;    //层次
				html+='</td>';
				html+='<td>';
				html+=data.courseName;
				html+='</td>';
				html+='<td>';   //课程概况
				if(data.overview == 0){
					html+='不需要';
				}else{
					html+='需要';
				}
				html+='</td>';
//				html+='<td>';   //课程学习
//				if(data.overview == 0){
//					html+='不需要';
//				}else{
//					html+='需要';
//				}
//				html+='</td>';
				html+='<td>';   //媒体素材
				if(data.material == 0){
					html+='不需要';
				}else{
					html+='需要';
				}
				html+='</td>';
				html+='<td>';    //实验
				if(data.experiment == 0){
					html+='不需要';
				}else{
					html+='需要';
				} 
				html+='</td>';
				html+='<td>';    //作业
				if(data.task == 0){
					html+='不需要';
				}else{
					html+='需要';
				} 
				html+='</td>';
				html+='<td>';   //考试
				if(data.exam == 0){
					html+='不需要';
				}else{
					html+='需要';
				} 
				html+='</td>';
				html+='<td>';  //创建时间
				html+=data.time; //创建时间
				html+='</td>';
				html+='</tr>';
			});
			 html1='';
			 html1+='<li><a href="javascript:show_need_resource(1)">First</a></li>';
			 html1+=' <li><a href="javascript:show_need_resource(';
			 html1+=Arraydata.page-1;
			 html1+=')">&lt;</a></li>';
			 for(i=1;i<=Arraydata.totalPage;i++){
				 if(i==Arraydata.page){
					 html1+=' <li class="sellify"><a href="javascript:show_need_resource(';
					 html1+=i;
					 html1+=')">';
					 html1+=i;
					 html1+='</a></li>';
				 }else{
					 html1+=' <li><a href="javascript:show_need_resource(';
					 html1+=i;
					 html1+=')">';
					 html1+=i;
					 html1+='</a></li>';
				 }
			 }
			 html1+=' <li><a href="javascript:show_need_resource(';
			 html1+=Arraydata.page+1;
			 html1+=')">&gt;</a></li>';
			 html1+=' <li><a href="javascript:show_need_resource(';
			 html1+=Arraydata.totalPage;
			 html1+=')">Last</a></li>';
			div.append($(html));
			ul = $('#yem_need1');
			ul.empty();
			ul.append($(html1));
		}
	});
}
function delet_need_resource(){
	var array = new Array();
	$(".needresourcebox").each(function(index,box){
		b = $(box);
		if(b.attr("checked"))
		{
			array.push(b.val());
		}
	});
	if(array.length != 0){
		$.post("del_need_resource",{needID:array},function(count){
			if(count>0){
				show_need_resource(1);
			}
		},"json");
	}else{
		alert("至少选中一项进行删除操作");
	}
}

function showPlanAndProtocol(page,type,sear){
	var sear = arguments[2] ? arguments[2] : false;//设置参数b的默认值为false
	var text;
//	console.log(type);
//	console.log(page);
//	console.log(sear);
	if(type == 1){
		text = $("#inputtext1").val();
	}else if(type == 2){
		text = $("#inputtext2").val();
	}
	if(sear && (text != "")){
		postData={
				Page:page,
				search:1,
				searchData:text,
				Type:type
		}
	}else{
		postData={
				Page:page,
				Type:type
		}
	}
	var tabletitle = '<tr>\
		<th><input type="checkbox"></th>\
		<th>ID</th>\
		<th>授课教师</th>\
		<th>专业</th>\
		<th>层次</th>\
		<th>课程名称</th>';
	    if(type == 1){
	    	tabletitle+='<th>资源制作计划</th>';
	    }else{
	    	tabletitle+='<th>合作协议</th>';
	    }
	    tabletitle+='<th>创建时间</th></tr>';
	$.ajax({
		type:"post",
		url:"showPlanAndProtocol",
		dataType:"json",
		async:false,
		data:postData,
		error:function(){
			alert('网络错误');
		},
		success:function(Arraydata){
			if(Arraydata.msg){
				console.log(Arraydata.msg);
			}
			var table;
			var ul;
			if(type == 1){
				table = $("#plantable");
				ul = $("#planul");
			}else if(type == 2){
				table = $("#protocoltable");
				ul =$("#protocolul");
			}
			if(Arraydata.data){
				html = tabletitle;
				$.each(Arraydata.data,function(index,data){
				    html+='<tr>';
				    html+='<td><input type="checkbox" class="protocolbox" value="';
				    if(type == 1){
				    	html+=data.planid;
				    }else{
				    	html+=data.protocolid;
				    }
				    html+='" /></td>';
				    html+='<td>';
					  html+=data.countNum;     //数字
					  html+='</td>';
					  html+='<td><a href="#"><p>';
					  html+=data.userName; //用户
					  html+='</p><p>';
					  html+=data.phone;   //手机号
					  html+='</p></a></td>';
					  html+='<td>';
					  html+=data.major;   //专业
					  html+='</td>';
				      html+='<td>';
					  html+=data.level;    //层次
					  html+='</td>';
					  html+='<td>';
					  html+=data.courseName;
					  html+='</td>';
					  html+='<td><a href="planAndProtocol?Type=';
					  html+=type;
					  html+='&ID=';
					  if(type == 1){
						html+=data.planid;  
					  }else{
						 html+=data.protocolid; 
					  }
					  html+='">';
					  html+=data.name;
					  html+='</a></td>';
					  html+='<td>';  //创建时间
					  html+=data.time; //创建时间
					  html+='</td>';
					  html+='</tr>';
				});
				///////分页
				 html1='';
				 html1+='<li><a href="javascript:showPlanAndProtocol(1,';
				 html1+=type;
				 html1+=',';
				 html1+=sear;
				 html1+=')">First</a></li>';
				 html1+=' <li><a href="javascript:showPlanAndProtocol(';
				 html1+=Arraydata.page-1;
				 html1+=',';
				 html1+=type;
				 html1+=',';
				 html1+=sear;
				 html1+=')">&lt;</a></li>';
				 for(i=1;i<=Arraydata.totalPage;i++){
					 if(i==Arraydata.page){
						 html1+=' <li class="sellify"><a href="javascript:showPlanAndProtocol(';
						 html1+=i;
						 html1+=',';
						 html1+=type;
						 html1+=',';
						 html1+=sear;
						 html1+=')">';
						 html1+=i;
						 html1+='</a></li>';
					 }else{
						 html1+=' <li><a href="javascript:showPlanAndProtocol(';
						 html1+=i;
						 html1+=',';
						 html1+=type;
						 html1+=',';
						 html1+=sear;
						 html1+=')">';
						 html1+=i;
						 html1+='</a></li>';
					 }
				 }
				 html1+=' <li><a href="javascript:showPlanAndProtocol(';
				 html1+=Arraydata.page+1;
				 html1+=',';
				 html1+=type;
				 html1+=',';
				 html1+=sear;
				 html1+=')">&gt;</a></li>';
				 html1+=' <li><a href="javascript:showPlanAndProtocol(';
				 html1+=Arraydata.totalPage;
				 html1+=',';
				 html1+=type;
				 html1+=',';
				 html1+=sear;
				 html1+=')">Last</a></li>';
				table.empty();
				table.append($(html));
				ul.empty();
				ul.append($(html1));
			}else{
				table.empty();
				table.append($(tabletitle));
			}
		}
	});
	
}

function del_protocolAndPlan(type){
	var array = new Array();
	$(".protocolbox").each(function(index,box){
		b = $(box);
		if(b.attr("checked"))
		{
			array.push(b.val());
		}
	});
	if(array.length != 0){
		$.post("del_protocolAndPlan",{ID:array,Type:type},function(count){
			if(count>0){
				showPlanAndProtocol(1,type,false);
			}
		},"json");
	}else{
		alert("至少选中一项进行删除操作");
	}
}
function show_resource(page,sear){     //搜索应提交资源
	//收索还应提供检索的值
	if(sear){  // 暂时不做搜索功能
		
	}else{
		postData={
				Flg:flg,
				Page:page
		}
	}
	table = $('#tableresource');
	$.ajax({
		type:"post",
		url:"show_resource",
		dataType:"json",
		async:true,
		data:postData,
		error:function(){
			alert('网络错误');
		},
		success:function(Arraydata){
			tabletitle='<tr> \
				  <th><input type="checkbox" /></th> \
				  <th>ID</th> \
				  <th>授课教师</th> \
				  <th>专业</th> \
				  <th>层次</th> \
				  <th  scope="col"><div>课程名称</div></th> \
				  <th  scope="col" colspan="2" class="course_res"><div>教师提交课程资源</div> \
					   <ul class="media"> \
							<li>媒体资源</li> \
							<li>非媒体资源</li> \
					   </ul> \
				  </th> \
				  <th>录制资源</th> \
				  <th scope="col"><div>创建时间</div></th> \
				  <th  scope="col"><div>状态</div></th> \
				  <th  scope="col"><div>操作</div></th> \
			</tr>';
			if(Arraydata.status){
				html=tabletitle;
				$.each(Arraydata.data,function(index,data){
					  html+=' <tr  class="b_white">';
					  html+='<td><input type="checkbox" class="resource1" value="';
					  html+=data[0].userid;
					  html+='|';
					  html+=data[0].courseid;
					  html+='" /><td>';
					  html+='<td>';
					  html+=(index+1);
					  html+='</td>';
					  html+='<td><a href="#">';
					  html+=Arraydata.info[index].username;
					  html+='</a><p><a href="#">';
					  html+=Arraydata.info[index].phone;
					  html+='</a></p></td>';
					  html+='<td>';
					  html+=Arraydata.info[index].major;
					  html+='</td>';
					  html+='<td>';
					  html+=Arraydata.info[index].level;
					  html+='</td>';
					  html+='<td><div align="center">';
					  html+=Arraydata.info[index].coursename;
					  html+='</div></td>';
					  html+='td';
					  $.each(data,function(index1,data1){
						  if(data1.type == "媒体素材"){
							  html+='<div  class="video clearfix"> \
							         <div class="note1 fl">\
								     <video id="player_a" class="projekktor" title="我的视频" width="40" height="40" controls>';
							  html+='<source src="/eduresPro/Uploads/';
							  html+=data1.path;
							  html+='" type="video/mp4" />';
							  html+='<source src="/eduresPro/Uploads/';
							  html+=data1.path;
							  html+='" type="video/ogg" />';
							  html+='	Your browser does not support HTML5 video. \
								       </video>\
							           </div>\
							           <div class="note2 fl">\
								       <p class="res_name"><a href="#">';
							  html+=data1.name;
							  html+='</a></p>';
							  html+='<p class="date">';
							  html+=data1.time;
							  html+='</p></div><div class="am-dropdown fr" data-am-dropdown> \
									<a class="am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle> \
								   <img src="/eduPro/Public/images/set.png"> \
							       </a><ul class="am-dropdown-content"><li><a href="open_resource?resourceid=';
							  html+=data1.resourceid;
							  html+='" target="_blank">1. 打开</a></li>';
							  html+='<li><a href="resource_download?target=';
							  html+=data1.resourceid;
							  html+='" target="_blank">2.下载</a></li>';
							  html+=' <li><a href="#" onClick="javascript:showDiv1()">3. 审核建议</a></li>';
//							  html+='<li><a href="through_review?user[]=';
//							  html+=data1.userid;
//							  html+='&';
//							  html+='course[]=';
//							  html+=data1.courseid;
//							  html+='">4.审核通过</a></li>';
							  html+='		</ul> \
						             </div> \
					                 </div>   <!---video结束-->';
							  html+='</td>';
						  }
					  });
					  
					  $.each(data,function(index1,data1){
						  if(data1.type == "非媒体素材"){
							  html+='<td class="no_video"> \
									<div class="note3 clearfix"> \
								    <p class="fl"><a href="#">';
							  html+=data1.name;
							  html+='</a></p>';
							  html+='<div class="am-dropdown fr" data-am-dropdown> \
								<a class="am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle> \
									<img src="__PUBLIC__/images/set.png"> \
								</a><ul class="am-dropdown-content">';
							  html+='<li><a href="video?target=';
							  html+=data1.resourceid;
							  html+='" target="_blank">1. 打开</a></li>';
							  html+='<li><a href="resource_download?target=';
							  html+=data1.resourceid;
							  html+='" target="_blank">2.下载</a></li>';
							  html+=' <li><a href="#" onClick="javascript:showDiv1()">3. 审核建议</a></li>';
							  html+='</ul> \
								     </div> \
							         </div>';
							  html+='</td>';
						  }
					  });
					  html+='<td>无</td>\
					  <td>2016年2月29日</td>\
					  <td class="yccol">待审核</td>\
					  <td class="czcol">\
					  	<p><a href="#">审核通过</a></p>\
						<p><a href="#"  onClick="javascript:showDiv2()">打包并发布</a></p>\
						<p class="score"><b onClick="score(this)" id="click">打&nbsp;分：</b><span id="t">暂未打分</span></p>\
					  </td>\
				</tr>';
				});
				table.empty();
				table.append($(html));
			}else{
				
			}
			
		}
	});
}

function publicres(userid,courseid){
	console.log(userid);
	console.log(courseid);
	$.post("publicres",{userID:userid,courseID:courseid},function(data){
		if(data.state == 0){
			alert("您已经发布");
		}else if(data.state == 1){
			alert("发布成功");
		}else{
			alert("发布失败");
		}
	},"json");
}








