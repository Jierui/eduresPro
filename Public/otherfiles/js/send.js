function deal_send(sourceid){
	$(".submit").click(function(){
		$.post("deal_send",{content:$(".content").val(),
			targetID:$(".name").val(),
			sourceID:sourceid},function(data){
			if(data.status==0){
				console.log(data.msg);
			}else{
				console.log("发送成功");
				console.log(data.msg);
				$(".content").val("");
			}
		},"json");
	});
}