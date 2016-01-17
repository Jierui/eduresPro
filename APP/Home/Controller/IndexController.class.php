<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
class IndexController extends Controller {
    public function index(){
    	echo 'Index';
        $name = 'loujie';
//         $this->assign('name',$name);
        $this->assign('name',$name);
    	$this->display();
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
    public function upload(){
    	$upload = new Upload();
    	$upload->maxSize = 3145728*1024;
    	//$upload->exts = array('jpg','gif','png','jpeg');
    	$upload->savePath = './';
    	$info = $upload->upload();
    	if (!$info) {
    		$this->error($upload->getError());
    	}else{
    		// $this->success('成功上传！');
            echo '上传成功<br>';
            foreach ($info as $file) {
                echo 'name:'.$file['name'];
                echo '<br>';
                echo 'size:';
                echo  $file['size']/1024;
                echo 'KB';
                echo '<br>';
                echo 'md5:'.$file['md5'];
                echo '<br>';
                echo 'type:'.$file['type'];
                echo '<br><a href="http://localhost/edures">返回</a>';
            }
    	}
    }
    public function ftpUpload(){
        set_time_limit(0);
        $config = array(
            'maxSize' => 1024*1024*1024*3,
            'rootPath' => './',
            //'savePath' => './'
            );
        $ftpConfig = array(
            'host' => '192.168.1.103',
            'port' => 21,
            'username' =>'JieLou',
            'password' => '123456ll',
            'timeout' => 60,
            );
        $upload = new Upload($config,'ftp',$ftpConfig);
        $info = $upload->upload();
        if(!$info){
            $this->error($upload->getError());
        }else{
            $this->success('上传成功！');
        }

    }

    public function yunUpload(){
         $config = array(
            'maxSize' => 1024*1024*1024,
            'rootPath' => './',
            //'savePath' => './'
            );
         $yunConfig = array(
            'host' => ' edures.b0.aicdn.com',
            'bucket' => '',
            'username' => 'jierui',
            'password' => '123456ll',
            );
        $upload = new Upload($config,'Upyun',$yunConfig);
        $info = $upload->upload();
        if(!$info){
            $this->error($upload->getError());
        }else{
            $this->success('上传成功！');
        }
    }
}