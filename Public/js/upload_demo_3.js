/*
本代码由素材家园收集并编辑整理;
尊重他人劳动成果;
转载请保留素材家园链接 - www.sucaijiayuan.com
*/

$(function(){
	// 初始化插件
	$("#demo3").zyUpload({
		//width            :   "650px",                 // 宽度
		//height           :   "300px",                 // 高度
		itemWidth        :   "120px",                 // 文件项的宽度
		itemHeight       :   "100px",                 // 文件项的高度
		url              :   "add_planAndProtocol",  // 上传文件的路径
		multiple         :   false,                    // 是否可以多个文件上传
		dragDrop         :   true,                    // 是否可以拖动上传文件
		del              :   true,                    // 是否可以删除文件
		finishDel        :   true,  				  // 是否在上传文件完成后删除预览
		/* 外部获得的回调接口 */
		onSelect: function(files, allFiles){                    // 选择文件的回调方法
		
		},
		onDelete: function(file, surplusFiles){                     // 删除一个文件的回调方法

		},
		onSuccess: function(file){                    // 文件上传成功的回调方法
	
		},
		onFailure: function(file){                    // 文件上传失败的回调方法
			console.log('上传失败');
		},
		onComplete: function(responseInfo){           // 上传完成的回调方法
			console.log(responseInfo);
			if(responseInfo ==0){
				$("#uploadInf").append("<p>操作成功</p>");
			}else if(responseInfo==1){
				$("#uploadInf").append("<p>操作失败，用户名和密码不匹配</p>");
			}else if(responseInfo == 2){
				$("#uploadInf").append("<p>操作失败，课程名称不匹配</p>");
			}
		}
	});
});

