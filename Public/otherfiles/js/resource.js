function through_review(){     //多项操作审核
	flg = 0;
	var s = "?";
	$(".checkbox").each(function(index,box){
		b = $(box);
		if(b.attr("checked"))
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
		if(b.attr("checked"))
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

function needResoureceSearch(data){     //搜索应提交资源
	
}