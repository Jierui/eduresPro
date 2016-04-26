//全局变量
var leamessageID=0;  //留言ID
var div = null;
//留言板表单验证
function board_chek_form(){    //表单验证 暂时没有用到此函数
	return true;
	//var caption = submitmessageform.Caption.value;
	//var content = submitmessageform.Content.value;
	//console.log(caption);
	//console.log(content);
	console.log("hello world");
	alert("hello world");
	if(caption == ""){
		//document.getElementById("captionnote").noteValue="标题不能为空";
		return false;
	}else{
		caption.length >= 50;
		//document.getElementById("captionnote").noteValue="长度不能超过50";
		return false;
	}
	if(content == ""){
		//document.getElementById("contentnote").noteValue="内容不能为空";
		return false;
	}
	return true;
}
function getLeamessageID(obj,ID){
	div = $(obj).parent().siblings(".repeat_box");
	$(".repeat_box").hide();
	div.show();
	leamessageID=ID
	//console.log(leamessageID);
}
function ansmessage(obj,userID){ //回复留言
	con=div.children(".ansmessagetext");
	leaContent = con.val();
	if(leaContent == null || leaContent == ""){
		alert("回复内容不能为空");
		return false;
	}
	
//	$(obj).parent().siblings(".repeat_con").last().after($('<img src="__ROOT__/data.imagePath" alt="头像" /> \
//			<label class="names">data.userName</label> \
//			<span>data.content</span> \
//			<br /> \
//			<span class="detail_time">data.time</span>'));
	$.post("ansMessageBoard",{ID:leamessageID,userid:userID,content:leaContent},function(data){
		if(data.status == 1){
			$(obj).parent().siblings(".repeat_con").last().after($('<div class="repeat_con"><img src="/eduresPro/'+data.imagePath+'" alt="头像" /> \
							<label class="names">'+data.userName+'</label> \
							<span>'+data.content+'</span> \
							<br /> \
							<span class="detail_time">'+data.time+'</span></div>'));
		}else if(data.status == 0){
			alert("您已经对留言进行评价，不能重复评价");
		}
	},"json");
	div.hide();
}

function delMessage(mid){
	Window.location="delMessage?mid="+mid;
}
