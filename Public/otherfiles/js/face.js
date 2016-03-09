function face_a(sourceid,id){
	//console.log($(id).text());
	strid=id.substring(6);
//	$(".name").text($(id).text()).val(strid);
	$.post("deal_recieve",{SourceID:sourceid,TargetID:strid},function(data){
		message = data.select;
		image = data.image;
//		console.log(message);
//		console.log(image);
		sourceimage = targetimage ='Public/images/tximg.jpg';
		$.each(image,function(i,info){
			if(info.userid == sourceid){
				if(info.imagepath != null){
					sourceimage = info.imagepath;
				}
//				console.log(sourceimage);
			}else if(info.userid == strid){
				if(info.imagepath != null){
					targetimage = info.imagepath;
				}
//				console.log(targetimage);
			}
		})
		$(".show2").empty();
		$('<p class="name" id="t_name" ></p>').appendTo($(".show2"));
		$(".name").text($(id).text()).val(strid);
		$.each(message,function(i,info){
			if(info.sourceid==sourceid){
				$('<div class="neirong"><img src="/eduresPro/'+sourceimage+'" alt="头像"  class="portrait"/><span>'+
						info.message+'</span></div>').appendTo($(".show2"));
			}else{
				$('<div class="neirong fr"><img src="/eduresPro/'+targetimage+'" alt="头像"  class="portrait"/><span>'+
						info.message+'</span></div>').appendTo($(".show2"));
			}
		});
	},"json");
	//console.log($(".name").val());
}


//发送


function deal_send(sourceid,imagepath){
	$(".submit").click(function(){
		info = $(".content").val();
		targetid = $(".name").val();
		if(targetid == ""){
			//$(".show2").empty();
			//$('<p class="name" id="t_name" ></p>').appendTo($(".show2"));
			$('<div class="neirong"> <span>请选择好友</span></div>').appendTo($(".show2"));
			return;
		}
		if(info == ""){
			return;
		}
		$.post("deal_send",{message:info,
			TargetID:$(".name").val(),
			SourceID:sourceid},function(data){
			if(data.status==0){
			console.log(data.msg);
			}else{
				//console.log("发送成功");
				console.log(data.msg);
				if(imagepath == null){
					imagepath = 'Public/images/tximg.jpg';
				}
				$('<div class="neirong"><img src="/eduresPro/'+imagepath+'" alt="头像"  class="portrait"/><span>'+
						data.msg +'</span></div>').appendTo($(".show2"));
				$(".content").val("");
			}
		},"json");
	});
}
var id = 0;
function updatemsg(sourceid,imgpath){
	targetid = $(".name").val();
	if(targetid == ""){
		//console.log('请选择');
		return false;
	}
	if(imgpath == null){
		imgpath = 'Public/images/tximg.jpg';
	}
	$.post('updatemsg',{SourceID:sourceid,TargetID:targetid},function(data){
		console.log(data);
		if(data.sourceid == $(".name").val()){
			//
			$('<div class="neirong fr"><img src="/eduresPro/'+ imgpath +'" alt="头像"  class="portrait"/><span>'+
					data.message +'</span></div>').appendTo($(".show2"));	
		}
	},"json");
	
}
function messageLoop(sourceid,imgpath){
	id = setInterval(updatemsg(sourceid,imgpath),6000);
}
function demo(){
	console.log('hello');
}