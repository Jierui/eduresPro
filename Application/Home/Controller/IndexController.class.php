<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Think\Verify;
use Think\Upload;
use Home\Model\UploadHandler;
use Think\Image;
class IndexController extends Controller {	
    public function index(){
      // $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
      
      $this->display('login');
    }
    public function login(){
    	$modle = M('userinfo');
    	if(!($name = $_POST['userName'])){
    		$error = '请输入账号';
    		//echo $error;
//     		$this->assign('error',$error);
//     		$this->display('Index:login');
            $this->error($error);
    		exit;
    	}
    	else if(!($pwd = $_POST['Passard'])){
    		$error = '请输入密码';
    		//echo $error;
//     		$this->assign('error',$error);
//     		$this->display('Index:login');
            $this->error($error);
    		exit;
    	}
    	else{
    		//$modle->where('userName = loujie AND passard = jiege')->select();
    		//$modle->select();
    		$verify = new Verify();
    		$code=$_POST['verify'];
    		if($verify->check($code)){
    			$condition['userName'] = $name;
    			$condition['Password'] = md5($pwd);
    			$condition['_logic']= 'and';
    			$result=$modle->where($condition)->select();
    			//dump($result);
    			if($result){
    				session('userName',$name);
    				//$this->jump('登陆成功','welcome');
    				$this->success('登陆成功',U('Home/Index/message_feedback'));
    			}else{
    				$this->assign('info','登陆失败');
    				$this->error('登陆失败,用户或密码不正确');
    			}
    		}else{
    			if(empty($code)){
    				$error = '请输入验证码';
    			}else{
    				$error = '验证码输入错误';
    			}
    			$this->error($error);
    		}
    	}
    	
    }
    public function beforregister(){
    	$this->display('Index:register');
    }
    public function register(){
    	$model = M('userinfo');
    	$data = $model->create();
    	
    	//dump($data);
    	$condition['userName']= $data['username'];
    	if($model->where($condition)->select()){
    		$error = '注册失败，该用户名已经被注册';
    		$this->error($error);
    		exit;
    	}
    	unset($condition);//重置变量
    	if($data['Password'] !== $_POST['enpassword']){
    		$error = '密码不一致，请重新输入确定密码和密码';
    		$this->error($error);
    		exit;
    	}
    	$data['userType']='auditor';
    	$data['Password']=md5($data['Password']);
    	unset($data['enpassword']);
    	//dump($data);
    	$result=$model->data($data)->add();
    	if($result){
    		$this->success('注册成功',U('Index/index'));
    	}else{
    		$error = '注册失败,请重新再试';
    		$this->error($error);
    	}
    	
    }
    public function verify(){
    	$verify = new Verify();
    	//$verify->imageW
    	$verify->length=4;
    	$verify->fonSize=6;
    	$verify->entry();
    }
//     private function jump($info,$url="",$time=3){
//     	$this->assign('info',$info);
//     	$this->assign('url',$url);
//     	$this->assign('time',$time);
//     	$this->display('Index:jump');
//     }
//     public function welcome(){
//     	$userName = session('userName');
//     	if(empty($userName)){
//     		$this->index();
//     		exit;
//     	}
//     	$this->assign('userName',$userName);
//     	$this->display('result:welcome');
//     }        
    public function upload(){
    	if(!session('userName')){
    		$this->index();
    	}
    	$this->display('user:upload');
    	 
    }
    public function uploading(){
    	$upload = new Upload();
    	$upload->maxSize = 3145728*1024;
    	//$upload->exts = array('jpg','gif','png','jpeg');
    	$upload->savePath = './images/';
    	$upload->autoSub=false;
    	$info = $upload->upload();
    	if($info){
    		$result = array('status'=>1,'msg'=>'上传成功');
    		echo json_encode($result);
    	}else{
    		$result = array('status'=>0,'msg'=>'上传失败');
    	}
//         if(!$_FILES){
//         	$result = array('status' => 0,'msg'=>'上传失败');
//         	echo json_encode($result);
//         }else{
//         	$result = array('status'=>1,'msg'=>'服务器接收到客户端文件');
//         	echo json_encode($result);
//         }

    }
    //登陆后  主界面
    public function message_feedback(){
    	if(!session('userName')){
    		$this->error('请登录',U('Home/Index/index'));
    	}
    	$user = M(userinfo);
    	$condition['userName'] = session('userName');
    	//数据库获取的都是小写字母。
    	$userinfo = $user->where($condition)->field('userName,Level,Major')->select();
    	$imgpath=$user->where($condition)->getField('imagePath');
    	if($imgpath&&!is_file($imgpath)){  //数据库中有目录但是该文件不存在
    		$user->where($condition)->setField('imagePath',null);
    		unset($imgpath);
    	}
    	if(date('a',time()) === 'ap'){
    		$info['alert'] = '上午好';
    	}else{
    		$info['alert'] = '下午好';
    	}
    	$this->assign('info',$info);
    	$this->assign('userinfo',$userinfo[0]);
    	$this->assign('imgpath',$imgpath);
    	$this->display('user:message_feedback');
    }
    
    //退出登录
    public function exit_login(){
    	if(session('userName')){
    		session('userName',null);
    		$this->success('退出成功',U('Home/Index/index'));
    	}else{
    		$this->error('尚未登陆',U('Home/Index/index'));
    	}
    }
    //头像上传
    public function img_upload(){
//     	if(!session('userNmae')){
//     		$this->error('登陆时间超时，请重新登陆',U('Home/Index/index'));
//     		exit;
//     	}
        $user = M('userinfo');
        $condition['userName'] = session('userName');
        $userID = $user->where($condition)->getField('userID');
        $imgpath = $user->where($condition)->getField('imagePath');
    	$upload = new Upload();
    	$upload->maxSize = 5*1024*1024; //上传头像不超过5M
    	$upload->exts = array('jpg','gif','png','jpeg');
    	$upload->savePath = './images/';
    	$upload->autoSub=false;
    	$upload->saveName = 'img'.'_'.$userID.time();//命名方式，img+userid+当前时间戳
    	$info = $upload->upload();
    	if($info){
    		$urlDir = 'Uploads/images/';
    		if($imgpath){//如果存在已经有的头像，先删除
    			if(file_exists($imgpath)&&is_file($imgpath)){
    			   $fileName = basename($imgpath);
    			   unlink($imgpath);//删除用户头像
    			}
    			if(file_exists($urlDir.$fileName)&&is_file($urlDir.$fileName)){
    				unlink($urlDir.$fileName);
    			}
    			
    		}
    		foreach ($info as $file){
    			$saveName=$file['savename'];
    			break;
    		}
    		if(!file_exists($urlDir.'userImg')){
    			mkdir($urlDir.'userImg');
    		}
    		if(file_exists($urlDir.$saveName)){
    			$image = new Image();
    			$image->open($urlDir.$saveName);
    			$image->thumb(99, 95,Image::IMAGE_THUMB_CENTER)->save($urlDir.'userImg/'.$saveName);
    			$user->where($condition)->setField('imagePath',$urlDir.'userImg/'.$saveName);
    		}
    		$result = array('status'=>1,'msg'=> $urlDir.'userImg/'.$saveName);
    		echo json_encode($result);
    		
    	}else{
    		$result = array('status'=>0,'msg'=> $upload->getError());
    		echo json_encode($result);
    	}
    }
    //实验代码
    public function demo(){
        echo basename('Uploads/images/1.jpg');
    }
    
    
}