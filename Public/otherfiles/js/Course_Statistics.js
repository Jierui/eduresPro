var flg = false;
function show_courseStatistics(page){
	//var b = arguments[1] ? arguments[1] : false;//设置参数b的默认值为false
	var postData;
	text = $("#inputtext").val();
	if(flg && (text != "")){
		postData={
				Page:page,
				search:1,
				searchData:text
		}
	}else{
		postData={
				Page:page
		}
	}
	$.ajax({
		type:"post",
		url:"showCourseStatistics",
		dataType:"json",
		async:true,
		data:postData,
		error:function(){
			alert('网络错误');
		},
		success:function(Arraydata){
			if(Arraydata.msg){
				console.log(Arraydata.msg);
			}
			if(Arraydata.data){
				var html='<tr> \
					  <th><input type="checkbox" /></th> \
					  <th>ID</th> \
					  <th>授课教师</th> \
					  <th>专业</th> \
					  <th>层次</th> \
					  <th  scope="col"><div>课程名称</div></th> \
					  <th scope="col"><div>创建时间</div></th> \
				  </tr>';
		$.each(Arraydata.data,function(index,data){
		  html+='<tr  class="b_white">';
		  html+='<td><input type="checkbox" class="courseresourcebox" value="';
		  html+=data.userid;    //id
		  html+='|';
		  html+=data.courseid;
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
		  html+='<td>';  //创建时间
		  html+=data.time; //创建时间
		  html+='</td>';
		  html+='</tr>';
		});
		 html1='';
		 html1+='<li><a href="javascript:show_courseStatistics(1)">First</a></li>';
		 html1+=' <li><a href="javascript:show_courseStatistics(';
		 html1+=Arraydata.page-1;
		 html1+=')">&lt;</a></li>';
		 for(i=1;i<=Arraydata.totalPage;i++){
			 if(i==Arraydata.page){
				 html1+=' <li class="sellify"><a href="javascript:show_courseStatistics(';
				 html1+=i;
				 html1+=')">';
				 html1+=i;
				 html1+='</a></li>';
			 }else{
				 html1+=' <li><a href="javascript:show_courseStatistics(';
				 html1+=i;
				 html1+=')">';
				 html1+=i;
				 html1+='</a></li>';
			 }
		 }
		 html1+=' <li><a href="javascript:show_courseStatistics(';
		 html1+=Arraydata.page+1;
		 html1+=')">&gt;</a></li>';
		 html1+=' <li><a href="javascript:show_courseStatistics(';
		 html1+=Arraydata.totalPage;
		 html1+=')">Last</a></li>';
		 table = $("#tablecoursesta");
		 table.empty();
		 table.append($(html));
		 ul = $("#yem1");
		 ul.empty();
		 ul.append($(html1));
			}else{
				var html='<tr> \
					  <th><input type="checkbox" /></th> \
					  <th>ID</th> \
					  <th>授课教师</th> \
					  <th>专业</th> \
					  <th>层次</th> \
					  <th  scope="col"><div>课程名称</div></th> \
					  <th scope="col"><div>创建时间</div></th> \
				  </tr>';
				html+="<tr><h3>没有数据</h3></tr>";
				table = $("#tablecoursesta");
				 table.empty();
				 table.append($(html));
				 ul = $("#yem1");
				 ul.empty();
			}
		}
	});
}

function show_search_result(){
	text = $("#inputtext").val();
	if(text == ""){
		flg = false;
	}else{
		flg = true;
	}
	show_courseStatistics(1);
	flg = false;
}

function course_print(){
	bdhtml=window.document.body.innerHTML;  
    sprnstr="<!--startprint-->";  
    eprnstr="<!--endprint-->";  
    prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17);  
    prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));  
    window.document.body.innerHTML=prnhtml;  
    window.print(); 
}

function del_courseUser(){
	var courseArray = new Array();
	$(".courseresourcebox").each(function(index,box){
		b = $(box);
		if(b.prop("checked"))
		{
			courseArray.push(b.val());
		}
	});
	if(courseArray.length > 0){
		$.post("del_courseUser",{data:courseArray},function(count){
			if(count>0){
				show_courseStatistics(1);
			}
		},"json");
	}else{
		alert("至少选中一项进行删除操作");
	}
}