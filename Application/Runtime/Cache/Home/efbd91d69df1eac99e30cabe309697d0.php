<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/eduresPro/Public/Jquery/js/vendor/jquery.ui.widget.js"></script>
<script src="/eduresPro/Public/Jquery/js/jquery.iframe-transport.js"></script>
<script src="/eduresPro/Public/Jquery/js/jquery.fileupload.js"></script>
<style type="text/css">
.bar {
    /*display: inline-block;*/
    display:none;
    height: 18px;
    width:150px;
    border:1px solid blue;
    background: green;
}
</style>
	<title>file upload</title>
</head>
<body>
<input id="fileupload" type="file" name="files[]"  multiple>
<div id="progress">
    <!--<div class="bar" style="width: 0%;"></div>-->
    <span class="bar"></span>
    <span id="num"></span>
</div>
<script>
$(function () {
    $('#fileupload').fileupload({
        url: 'img_upload',
        dataType: 'json',
        //add: function (e, data) {
            //data.context = $('<p/>').text('Uploading...').appendTo(document.body);
            //data.submit();
        //},
        add: function (e, data) {
            data.context = $('<button/>').text('Upload')
                .appendTo(document.body)
                .click(function () {
                	p=$('<p/>');
                    data.context = p.text('Uploading...').replaceAll($(this));
                    data.submit();
                });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .bar').css('display','inline-block');
            $('#progress .bar').css(
                'width',
                progress*2
            );
            $('#progress #num').text(progress + '%');
        },
        done: function (e, data) {
            //$.each(data.result.files, function (index, file) {
                //$('<p/>').text(data.result.msg).appendTo($('#progress #num'));
                p.text('uploaded');
                 //console.log(data);
            //});
        }
    });
});
</script>
</body>
</html>