var flg = 1;

function showTeacherEvalution(page,sear){
	//var sear = arguments[1] ? arguments[1] : false;//设置参数b的默认值为false
	text = $('#evltext').val();
	if(sear && (text != "")){
		postData={
				Page:page,
				search:1,
				searchData:text,
				Flg:flg
		}
	}else{
		postData={
				Page:page,
				Flg:flg
		}
	}
	var tabletitle = '<tr> \
							  <th><input type="checkbox" /></th> \
							  <th>ID</th> \
							  <th>授课教师</th> \
							  <th>专业</th> \
							  <th>层次</th> \
							  <th  scope="col">课程名称</th> \
							  <th  scope="col">视频录制打分</th> \
							  <th scope="col">资源评分</th> \
							  <th scope="col">试卷制作打分</th> \
							  <th scope="col">总分</th> \
							  <th scope="col">平均分</th> \
							  <th  scope="col" width="15%">评价</th> \
						</tr>';
	$.ajax({
		type:"post",
		url:"show_evaluate_teacher",
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
			var table = $("#special_table");
			var ul =$("#evlul");
			if(Arraydata.data){
				//console.log(Arraydata);
				html = tabletitle;
				$.each(Arraydata.data,function(index,data){
					totalNum = parseFloat(data.papscore)+parseFloat(data.vidscore)+parseFloat(data.resscore);
				    html+='<tr>';
				    html+='<td><input type="checkbox" class="evalbox" value="';
				    html+=data.evalid;
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
					  html+='<td>';  //视频录制打分
					  html+=data.vidscore;
					  html+='</td>';
					  html+='<td>';  //资源审核打分
					  html+=data.resscore;
					  html+='</td>';
					  html+='<td>';  //试卷制作打分
					  html+=data.papscore;
					  html+='</td>';  
					  html+='<td>';  //总分
					  html+=totalNum;
					  html+='</td>';
					  html+='<td>';  //平均分
					  html+=parseFloat(data.averscore).toFixed(2);
					  html+='</td>';
					  html+='<td><p class="score"><b onClick="score(this,';
					  html+=data.evalid;
					  html+=')">评&nbsp;价：</b><span>';
					  if(!data.note){
						  html+='暂未评价';
					  }else{
						  html+=data.note;
					  }
					  html+='</span></p></td>';
					  html+='</tr>';
				});
				///////分页
				 html1='';
				 html1+='<li><a href="javascript:showTeacherEvalution(1,';
				 html1+=sear;
				 html1+=')">First</a></li>';
				 html1+=' <li><a href="javascript:showTeacherEvalution(';
				 html1+=Arraydata.page-1;
				 html1+=',';
				 html1+=sear;
				 html1+=')">&lt;</a></li>';
				 for(i=1;i<=Arraydata.totalPage;i++){
					 if(i==Arraydata.page){
						 html1+=' <li class="sellify"><a href="javascript:showTeacherEvalution(';
						 html1+=i;
						 html1+=',';
						 html1+=sear;
						 html1+=')">';
						 html1+=i;
						 html1+='</a></li>';
					 }else{
						 html1+=' <li><a href="javascript:showTeacherEvalution(';
						 html1+=i;
						 html1+=',';
						 html1+=sear;
						 html1+=')">';
						 html1+=i;
						 html1+='</a></li>';
					 }
				 }
				 html1+=' <li><a href="javascript:showTeacherEvalution(';
				 html1+=Arraydata.page+1;
				 html1+=',';
				 html1+=sear;
				 html1+=')">&gt;</a></li>';
				 html1+=' <li><a href="javascript:showTeacherEvalution(';
				 html1+=Arraydata.totalPage;
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


function del_evaluation(){
	var array = new Array();
	$(".evalbox").each(function(index,box){
		b = $(box);
		if(b.prop("checked"))
		{
			array.push(b.val());
		}
	});
	if(array.length != 0){
		$.post("del_evaluation",{ID:array},function(count){
			if(count>0){
				showTeacherEvalution(1,false);
			}
		},"json");
	}else{
		alert("至少选中一项进行删除操作");
	}
}

function evl_filtrate(a){
	change = $(a).val();
	flg = change;
	showTeacherEvalution(1,false);
}



function evl_print(){
	bdhtml=window.document.body.innerHTML;  
    sprnstr="<!--startprint-->";  
    eprnstr="<!--endprint-->";  
    prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17);  
    prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));  
    window.document.body.innerHTML=prnhtml;  
    window.print(); 
}