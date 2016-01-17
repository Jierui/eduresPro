function select_img_file(){
	$("#img_upload").click();
	//$(function () {
    $('#img_upload').fileupload({
        dataType: 'json',
        url: 'img_upload',
        //loadImageMaxFileSize: 5,
        done: function (e, data) {
           if(data.result.status==0){
           	alert("头像更改失败"+data.result.msg);
           }else{
        	$('.peptx').attr('src','/eduresPro/'+data.result.msg);
           	alert("图片更改成功");
           }
        }
    });
// });
}