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
      if(session('userID') && session('userName')){
      	//$this->message_feedback();
      	$this->success("您已经登陆",U('Home/Index/message_feedback'));
      	return;
      }
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
    			$result=$modle->where($condition)->getField('userID');
    			//dump($result);
    			if($result){
    				session('userName',$name);
    				session('userID',$result);
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
    	//$data['userType']='auditor';
    	$data['userType'] = '老师';
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
//     	if(!session('userName')){
//     		$this->index();
//     	}
    	$this->display('demo:demo1');
    	 
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
//     		foreach ($info as $file){
//     			dump($file['name']);
//     		}
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
        $type = $_POST['resourceType'];
        dump($type);
        $name = $_POST['courseName'];
        dump($name);

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
    	$messageinfo = $user->field('userID,imagePath,userName')->select();
    	$this->assign('messageinfo',$messageinfo);
    	$this->assign('info',$info);
    	$this->assign('userinfo',$userinfo[0]);
    	$this->assign('imgpath',$imgpath);
    	$this->display('user:message_feedback');
    }
    
    //退出登录
    public function exit_login(){
    	if(session('userName')){
    		session('userName',null);
    		session('userID',null);
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
    			///////////////////////////////////////////////////
    			//跟新头像
    			$leamessage = M('leamessage');
    			$ansmessage = M('ansmessage');
    			unset($condition);
    			$condition['userID'] = session('userID');
    			$leamessage->where($condition)->setField('imagePath',$urlDir.'userImg/'.$saveName);
    			$ansmessage->where($condition)->setField('imagePath',$urlDir.'userImg/'.$saveName);
    		}
    		$result = array('status'=>1,'msg'=> $urlDir.'userImg/'.$saveName);
    		echo json_encode($result);
    		
    	}else{
    		$result = array('status'=>0,'msg'=> $upload->getError());
    		echo json_encode($result);
    	}
    }
    //点对点聊天
    public function deal_send(){
    	$message = M('messageinfo');
    	$info = $message->create();
    	if($info){
    		$info['Time'] = date('Y-m-d H:i:s');
    		$message->add($info);
    		$result = array('status'=>1,'msg'=>$info['message']);
    		echo json_encode($result);
    	}else{
    		$result = array('status'=>0,'msg'=>'没有接收到消息');
    		echo json_encode($result);
    	}
    }
    //更新聊天记录
    public function deal_recieve(){
    	$message = M('messageinfo');
    	$info = $message->create();
        $condition = '(`SourceID` = "'.$info['SourceID'].'" and `TargetID` = "'.$info['TargetID']
        .'") or (`SourceID` = "'.$info['TargetID'].'" and `TargetID` = "'.$info['SourceID'].'")';
        $select = $message->where($condition)->select();
        $conditionID = '`userID`='.$info['SourceID'].' or `userID` = '.$info['TargetID'];
        $imagepath=$message->table('t_userinfo')->where($conditionID)->field('userID,imagePath')->select();
        $result['select'] = $select;
        $result['image'] = $imagepath;
        //更新未读消息
        unset($condition);
        $data['mstatus'] = 1;
        $condition['SourceID'] = $info['TargetID'];
        $condition['TargetID'] = $info['SourceID'];
        $condition['_logic']='and';
        $message->where($condition)->save($data);
    	echo json_encode($result);
    }
    public function updatemsg(){
    	$message = M('messageinfo');
    	$info = $message->create();
    	unset($condition);
    	if(info){
    		$condition['SourceID'] = $info['TargetID'];
    		$condition['TargetID'] = $info['SourceID'];
    		$condition['mstatus'] = 0;
    		$condition['_logic'] = 'and';
    		$messageinfo = $message->where($condition)->field('SourceID,Time,message')->select();
    		$result = array('status'=>1,'msg'=>$messageinfo);
    		$data['mstatus'] = 1;
    		$message->where($condition)->save($data);
    		echo json_encode($result);
    	}else{
    		$result = array('status'=>0,'msg'=>'服务器未能接收正确数据');
    		echo json_encode($result);
    	}
    }
    //个人中心
    public function personal_center(){
    	if(!session('userName')){
    		$this->error('请登录',U('Home/Index/index'));
    	}
    	$user = M(userinfo);
    	$condition['userName'] = session('userName');
    	//数据库获取的都是小写字母。
    	$userinfo = $user->where($condition)->field('userName,Level,Major,Sex,Phone,Email')->select();
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
    	$messageinfo = $user->field('userID,imagePath,userName')->select();
    	$this->assign('messageinfo',$messageinfo);
    	$this->assign('info',$info);
    	$this->assign('userinfo',$userinfo[0]);
    	$this->assign('imgpath',$imgpath);
    	$this->display('user:personal_center');
    }
    //修改资料
    public function updateUserInfo(){
    	$data = $_POST;
    	$condition['userID'] = session('userID');
    	$user = M('userinfo');
    	$result = $user->where($condition)->save($data);
    	if($result == 1){
    		$this->success("修改成功",'personal_center');
    	}else{
    		$this->error("信息修改失败");
    	}
    }
    public function message_board(){
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
    	$messageinfo = $user->field('userID,imagePath,userName')->select();
    	$this->assign('messageinfo',$messageinfo);
    	$this->assign('info',$info);
    	$this->assign('userinfo',$userinfo[0]);
    	$this->assign('imgpath',$imgpath);
    	//////////////////////////////////////////////////////////
    	$message = M('leamessage');
    	$ansmessage = M('ansmessage');
    	$page = $_GET['page'];
    	$pagesize = 5;
    	if(!$page){
    		$page = 1;
    	}
    	$messageinfo = $message->select();
    	$totalinfo = count($messageinfo);
    	$totalPage = ceil($totalinfo/5);
    	if($page < 1)
    		$page = 1;
    	if($page > $totalPage)
    		$page = $totalPage;
    	//$arraymessage;
    	$count = 0;
    	--$page;
    	for($i=$page*5;$i<$totalinfo and $i<($page*5+5);$i++){
    		//unset($where);
    		$where['messageID'] = $messageinfo[$i]['messageid'];
    		$ansmessageInfo = $ansmessage->where($where)->select();
    		$arraymessage[$count] = array('leamessage'=>$messageinfo[$i],
    				'ansmessage'=>$ansmessageInfo);
    		$count++;
    	}
    	++$page;
    	$this->assign('arraymessage',$arraymessage);   //显示内容
    	$this->assign('totalPage',$totalPage);   //总页数
    	$this->assign('page',$page);   //当前页数
    	$this->assign('user',$user);
    	$this->display('user:message_board');
    	//dump($arraymessage);
    }
    public function submitMessageBoard()              //提交新留言
    {
    	if(!session('userName')){
    		$this->error('请登录',U('Home/Index/index'));
    	}
    	$message = M('leamessage');
    	$user = M('userinfo');
    	$data = $message->create();
    	$data['Time'] = date('Y-m-d H:i:s');
    	$data['userID'] = session('userID');
    	$conditon['userID'] = $data['userID'];
    	$data['imagePath'] = $user->where($condition)->getField('imagePath'); //用户头像路劲
    	//$data['userName'] = session('userName');
    	$message->add($data);
    	$this->success("留言成功",'message_board');	
    }
    public function ansMessageBoard(){                   //提交留言
    	if(!session('userID')){
    		$this->error('请登录',U('Home/Index/index'));
    		return;
    	}
    	$leamessageID=$_POST['ID'];
    	$userID=$_POST['userid'];
    	if(!$userID){
    		echo "hello wrold";
    		return;
    	}
    	$content=$_POST['content'];
    	$data['Time'] = date('Y-m-d H:i:s');
    	$data['messageID']=$leamessageID;
    	$data['userID'] = $userID;
    	$data['Content'] = $content;
    	$user = M('userinfo');
    	$conditon['userID'] = $data['userID'];
    	$data['imagePath'] = $user->where($conditon)->getField('imagePath');
    	$ansmessage = M('ansmessage');
    	try{
    		$ansmessage->add($data);
    		$result = array("status"=>1,"time"=>$data['Time'],
    				"userName"=>session("userName"),
    				"content"=>$content,
    				"imagePath"=>$data['imagePath']
    		);
    		echo json_encode($result);
    	}catch (\Exception $e){
    		$result = array("status"=>0,"msg"=>$e->__toString());
    		echo json_encode($result);
    	}
    }
    
    public function delMessage($mid){
    	if(!session('userID')){
    		$this->error('请登录',U('Home/Index/index'));
    		return;
    	}
    	$condition['messageID'] = $mid;
    	$leamessage = M('leamessage');
    	$ansmessage = M('ansmessage');
    	$ansmessage->where($condition)->delete();
    	$leamessage->where($condition)->delete();
    	$this->message_board();
    	
    }
    public function Teacher_Resource(){      //资源管理主页
    	if(!session('userName')){
    		$this->error('请登录',U('Home/Index/index'));
    	}
    	$user = M(userinfo);
    	$condition['userName'] = session('userName');
    	//数据库获取的都是小写字母。
    	$userinfo = $user->where($condition)->field('userName,Level,Major,userType')->select();
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
    	$messageinfo = $user->field('userID,imagePath,userName')->select();
    	$this->assign('messageinfo',$messageinfo);
    	$this->assign('info',$info);
    	$this->assign('userinfo',$userinfo[0]);
    	$this->assign('imgpath',$imgpath);
    	if($userinfo[0]['usertype'] == "assessor"){
    		$page = $_GET['page'];
    		if(!$page){
    			$page = 1;
    		}else{
    			if(is_int($page)){
    				if($page < 1){
    					$page = 1;
    				}
    			}else{
    				$page = 1;
    			}
    		}//获取当前页数
    		$resource = M('resource'); //教师提交资源表
//     		unset($where);
//     		$where['userID'] = session('userID');
    		//$count = $resource->where($where)->group('courseID')->count();   //总记录数
    		$data = $resource->order('Time desc')->select();
    		foreach($data as $value){
    			if(empty($arrayData[$value['userid'].$value['courseid']])){
    				$arrayData[$value['userid'].$value['courseid']] = array($value);
    			}else{
    				array_push($arrayData[$value['userid'].$value['courseid']], $value);
    			}
    		}//arrayData为查询数据
    		$line = 3;   //每一页显示的行数
    		$count = count($arrayData); //总记录数
    		$totalPage = ceil($count/$line);
    		if($page > $totalPage){
    			$page = $totalPage;
    		}
    		--$page;  //
    		////////////////////////////////////////////////前台应该显示的数据
    		$requestData = array_slice($arrayData,$page*$line,$line,true);
    		$this->assign('totalPage',$totalPage);  //总页数
    		$this->assign('page',$page+1);      //当前页数
    		//$this->assign('line',$line);        //每页显示行数
    		$this->assign('showData',$requestData);
    		$this->assign('course',M('course'));
    		$this->assign('user',$user);
    		//dump($requestData);
    		$this->display('assessor:assessor_Resource');
    	}else if($userinfo[0]['usertype'] == "maker"){
    		$this->display('assessor:resources_making');
    	}else{
    		$page = $_GET['page'];
    		if(!$page){
    			$page = 1;
    		}else{
    			if(is_int($page)){
    				if($page < 1){
    					$page = 1;
    				}
    			}else{
    				$page = 1;
    			}
    		}//获取当前页数
    		$resource = M('resource'); //教师提交资源表
    		unset($where);
    		$where['userID'] = session('userID');
    		//$count = $resource->where($where)->group('courseID')->count();   //总记录数
    		$data = $resource->where($where)->order('Time desc')->select();
    		foreach($data as $value){
    			if(empty($arrayData[$value['courseid']])){
    				$arrayData[$value['courseid']] = array($value);
    			}else{
    				array_push($arrayData[$value['courseid']], $value);
    			}
    		}//arrayData为查询数据
    		$line = 3;   //每一页显示的行数
    		$count = count($arrayData); //总记录数
    		$totalPage = ceil($count/$line);
    		if($page > $totalPage){
    			$page = $totalPage;
    		}
    		--$page;  //
    		////////////////////////////////////////////////前台应该显示的数据
    		$requestData = array_slice($arrayData,$page*$line,$line,true);
    		$this->assign('totalPage',$totalPage);  //总页数
    		$this->assign('page',$page+1);      //当前页数
    		//$this->assign('line',$line);        //每页显示行数
    		$this->assign('showData',$requestData);
    		$this->assign('course',M('course'));
    		//dump($requestData);
    		$this->display('user:Teacher_Resource');
    	}
    }
    
    
    public function addCourseResource(){  //新增课程资源
    	if(!session('userID')){
    		return;
    	}
    	$resourceType = $_POST['resourceType'];
    	$courseName = $_POST['courseName'];
//     	dump($resourceType);
//     	dump($courseName);
//     	return;
    	if(!file_exists(C('rootPath')."userResoruce")){
    		mkdir(C('rootPath')."userResource");
    	}
    	$upload = new Upload();
    	$upload->maxSize = 1024*1024*1024*4;  //4G
    	//$upload->exts = array();//文件后缀不限制
    	$upload->callback = true; //检测文件是否存在回调，如果存在返回文件信息数组
    	$upload->autoSub = false;
    	$savePath = "userResource/"."user".session('userID')."/";
    	//$savePath = iconv("GB2312","UTF-8",$savePath);
    	$upload->savePath = $savePath;  //用户资源文件
    	//命名规则保持文件原名
    	//$upload->saveName = session('userID')."-".date('Y-m-d H:i:s').rand(0, 1000);  //命名规则防止冲突
    	$info = $upload->upload();
//     	$course = M('course');
//     	$where['courseName'] = $courseName;
//     	$data['courseID'] = $course->distinct(true)->where($where)->getField('courseID');
        $data['courseID'] = $courseName; //这里前台上传的其实是courseid
    	$data['userID'] = session('userID');
    	//$data['Name'] = ''; //这个字段暂时没有用
    	$data['Type'] = $resourceType;
    	$data['Status'] = 2; //等待审核
    	if($info){
    		$data['Time'] = date('Y-m-d H:i:s');
    		$resource = M('resource');
    		foreach ($info as $file){
    			//$fileName = iconv("GB2312","UTF-8",$file['savename']); //中文文件名乱码问题
    			$data['Path'] = $file['savepath'].$file['savename'];
    			$data['md5'] = $file['md5'];
    			$data['Name'] = $file['name'];
    			$resource->add($data);   //增加记录
    		}
    	}
    }
    
    public function delCourseResource(){ //删除课程资源
    	if(!session('userID')){
    		$this->error("请登陆",index);
    	}
    	$courseid = $_GET['course_del'];
    	$userid = $_GET['user'];
    	if(!$courseid)
    	{
    		return;
    	}
    	$rootPath = "Uploads/";
    	$resource = M('resource');
    	try{
    		foreach($courseid as $key=>$id){
    			$where['courseID'] = $id;
    			$where['userID'] = $userid[$key];
    			//删除服务器保存的资源
    			$resourcePath = $resource->where($where)->getField('path',true);
    			foreach($resourcePath as $path){
    				if(file_exists($rootPath.$path) && is_file($rootPath.$path))
    				{
    					unlink($rootPath.$path);
    				}
    			}
    			$resource->where($where)->delete();
    		}
    		$this->success("操作成功",Teacher_resource);
    	}catch (\Exception $e){
    		$this->error("删除资源失败",Teacher_resource);
    	}	
    }
    public function getCourseName(){
    	if(!session('userID')){
    		return;
    	}
    	$course = M('course');
    	$result = $course->distinct(true)->field('courseID,courseName')->select();
    	echo json_encode($result);
    }
    public function video(){
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
    	$messageinfo = $user->field('userID,imagePath,userName')->select();
    	///////////////////////////////////////////////////////////////////////课程相关
    	$target = $_GET['target'];
    	$resource = M('resource');
    	unset($where);
    	$where['resourceID'] = $target;
    	$resourceInfo = $resource->where($where)->select();
    	unset($where);
    	$where['courseID'] = $resourceInfo[0]['courseid'];
    	$course = M('course');
    	$courseName = $course->where($where)->getField('courseName');
    	unset($where);
    	$where['userID'] = $resourceInfo[0]['userid'];
    	$teacher = $user->where($where)->field('userName,Level')->select();
    	$this->assign('messageinfo',$messageinfo);
    	$this->assign('info',$info);
    	$this->assign('userinfo',$userinfo[0]);
    	$this->assign('imgpath',$imgpath);
    	$this->assign('resourceInfo',$resourceInfo[0]);
    	$this->assign('courseName',$courseName);
    	$this->assign('teacher',$teacher);
    	$this->display('user:video');
    }
    
    public function resource_download(){
    	if(!session('userID')){
    		$this->success("请登录",index);
    		return;
    	}
    	$target = $_GET['target'];
    	$where['resourceID'] = $target;
    	$resource = M('resource');
    	$path = $resource->where($where)->getField('Path');
    	$name = $resource->where($where)->getField('Name');
    	$file_name = $path;
    	$file_dir = "./Uploads/";
    	if(!file_exists($file_dir.$file_name)){
    		echo "文件找不到";
    		exit();
    	}
    	else{
    		$file = fopen($file_dir.$file_name,'r');
    		header("content-type:application/octet-stream");
    		header("Accept-Ranges:bytes");
    		header("Accept-Length:".filesize($file_dir.$file_name));
    		header("Content-Disposition: attachment; filename=".$name);
    		echo fread($file,filesize($file_dir.$file_name));
    		exit;
    	}
    }
    
    public function del_single_resource(){
    	if(!session('userID')){
    		$this->success("请登录",index);
    		return;
    	}
    	$resourceid = $_GET['resourceid'];
    	$where['resourceID'] = $resourceid;
    	$resource = M('resource');
    	$resourceInfo = $resource->where($where)->select();
    	$fileRoot = "Uploads/";
    	$filepath = $fileRoot.$resourceInfo[0]['path'];
    	if(file_exists($filepath)){
    		unlink($filepath);
    	}
    	$resource->where($where)->delete();
    	$this->Teacher_Resource();
    }
    public function open_resource(){
    	if(!session('userID')){
    		$this->success("请登录",index);
    		return;
    	}
    	$resourceid = $_GET['resourceid'];
    	$where['resourceID'] = $resourceid;
    	$resource = M('resource');
    	$resourceInfo = $resource->where($where)->select();
    	$fileRoot = "Uploads/";
    	$filepath = $fileRoot.$resourceInfo[0]['path'];
    	if(file_exists($filepath)){
    		$extension = pathinfo($filepath,PATHINFO_EXTENSION);
    		$imagetype = 'gif|jpeg|png|jpg|bmp';
    		if($extension == "doc" or $extension == "docx"){
    			header("Content-Type:text/html;charset=GBK");
    			$word = new \COM("word.application") or die ("Could not initialise MS Word object.");
    			//echo "Loaded Word, version {$word->Version}\n";
    			$word->Visible = 1;
    			$word->Documents->Open(realpath($filepath));   //计算机安全性问题
    			// Extract content.
    			//$content = (string) $word->ActiveDocument->Content;
    			$content = $word->ActiveDocument->content->Text;
    			echo $content;
    			$word->ActiveDocument->Close(false);	
    			$word->Quit();
    			$word = null;
    			unset($word);
    		}else if($extension == "excel"){
    			echo "在线阅读excel文件不支持";
    		}else if($extension == "pdf"){
    			header("content-type:application/pdf");
    			$fp = fopen($filepath, "r+");
    			$content = fread($fp, filesize($filepath));
    			echo $content;
    			fclose($fp);
    		}else if(stripos($imagetype, $extension)){
    			header("content-type:image");
    			$fp = fopen($filepath, "r+");
    			$content = fread($fp, filesize($filepath));
    			echo $content;
    			fclose($fp);
    		}else{
    			header("Content-Type:text/html;charset=GBK");
    			$fp = fopen($filepath, "r+");
    			$content = fread($fp, filesize($filepath)); 
    			$content = str_replace("\r\n", "<br />", $content);
    			echo $content;
    			fclose($fp);
    		}
    	}else{
    		$this->error("打开失败",Teacher_Resource);
    	}
    }
    
    public function through_review(){
    	$userid = $_GET['user'];
    	$courseid = $_GET['course'];
    	$resource = M('resource');
    	foreach($userid as $key=>$id)
    	{
    		$where['userID'] = $id;
    		$where['courseID'] = $courseid[$key];
    		$resource->where($where)->setField('Status',1);
    	}
    	$this->Teacher_Resource();
    }
    
    public function Teacher_Resource_Statistics(){
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
    	$messageinfo = $user->field('userID,imagePath,userName')->select();
    	$this->assign('messageinfo',$messageinfo);
    	$this->assign('info',$info);
    	$this->assign('userinfo',$userinfo[0]);
    	$this->assign('imgpath',$imgpath);
    		$page = $_GET['page'];
    		if(!$page){
    			$page = 1;
    		}else{
    			if(is_int($page)){
    				if($page < 1){
    					$page = 1;
    				}
    			}else{
    				$page = 1;
    			}
    		}//获取当前页数
    		$resource = M('resource'); //教师提交资源表
    		//     		unset($where);
    		//     		$where['userID'] = session('userID');
    		//$count = $resource->where($where)->group('courseID')->count();   //总记录数
    		$data = $resource->order('Time desc')->select();
    		foreach($data as $value){
    			if(empty($arrayData[$value['userid'].$value['courseid']])){
    				$arrayData[$value['userid'].$value['courseid']] = array($value);
    			}else{
    				array_push($arrayData[$value['userid'].$value['courseid']], $value);
    			}
    		}//arrayData为查询数据
    		$line = 5;   //每一页显示的行数
    		$count = count($arrayData); //总记录数
    		$totalPage = ceil($count/$line);
    		if($page > $totalPage){
    			$page = $totalPage;
    		}
    		--$page;  //
    		////////////////////////////////////////////////前台应该显示的数据
    		$requestData = array_slice($arrayData,$page*$line,$line,true);
    		$this->assign('totalPage',$totalPage);  //总页数
    		$this->assign('page',$page+1);      //当前页数
    		//$this->assign('line',$line);        //每页显示行数
    		$this->assign('showData',$requestData);
    		$this->assign('course',M('course'));
    		$this->assign('user',$user);
    		$this->display('assessor:Teacher_Resource_Statistics');
    }
    public function Teacher_Course_Statistics(){
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
    	$messageinfo = $user->field('userID,imagePath,userName')->select();
    	$this->assign('messageinfo',$messageinfo);
    	$this->assign('info',$info);
    	$this->assign('userinfo',$userinfo[0]);
    	$this->assign('imgpath',$imgpath);
    	$this->display('assessor:Teacher_Course_Statistics');
    }
    
    public function add_need_resource(){
    	if(!session('userID')){
    		//$this->error('请登录',U('Home/Index/index'));
    		return ;
    	}
    	$data=$_POST;
    	$where['userID'] = $data['userID'];
    	$where['userName'] = $data['userName'];
    	$user = M('userinfo');
    	$userinfo = $user->where($where)->select();
    	$flg = 1;//操作成功
    	if($userinfo)
    	{
    		unset($where);
    		$where['courseName'] = $data['courseName'];
    		$course = M('course');
    		$courseInfo = $course->where($where)->select();
    		try{
    			if($courseInfo){
    				unset($data['userName']);
    				$data['courseID'] = $courseInfo[0]['courseid'];
    				$data['Time'] = date('Y-m-d H:i:s');
    				$needSubmit = M("needsubmit");
    				$maxID = $needSubmit->max('needID');   //needid是否为空
    				if($maxID){
    					$data['needID'] = $maxID+1;
    					$needSubmit->add($data);
    				}else{
    					$data['needID'] = 1;
    					$needSubmit->add($data);
    				}
    				$result = array("status"=>$flg);
    				echo json_encode($result);
    			}else{
    				$flg = 2; //课程不存在
    				$info = "添加失败，该课程不存在";
    				$result = array("status"=>$flg,"msg"=>$info);
    				echo json_encode($result);
    			}
    		}catch (\Exception $e){
    			$result = array("status"=>101,"msg"=>$e->__toString());
    			echo json_encode($result);
    		}
    	}else{
    		$flg = 0; //教师用户不存在
    		$info = "教师姓名和ID不匹配";
    		$result = array("status"=>$flg,"msg"=>$info);
    		echo json_encode($result);
    	}
    }
    
    
    public function show_need_resource(){
    	if(!session('userID')){
    		return ;
    	}
    	$page = $_POST['Page'];
    	if(!$page){
    		$page = 1;
    	}
    	if($page<1){
    		$page =1;
    	}
    	$line = 5;
    	$needsubmit = M('needsubmit');
    	$entry =  $needsubmit->count();
    	$totalPage = ceil($entry/$line);
    	if($page > $totalPage){
    		$page = $totalPage;
    	}
    	--$page;
    	$dataArray = $needsubmit->order('time desc')->limit($page*$line,$line)->select();
    	$user = M('userinfo');
    	$course = M('course');
    	$count = 1;
    	foreach($dataArray as $key=>$value){
    		$where1['userID'] = $value['userid'];
    		$userinfo = $user->where($where1)->select();
    		$dataArray[$key]['count'] = $count;
    		$dataArray[$key]['userName'] = $userinfo[0]['username'];
    		$dataArray[$key]['phone'] = $userinfo[0]['phone'];
    		$dataArray[$key]['major'] = $userinfo[0]['major'];
    		$dataArray[$key]['level'] = $userinfo[0]['level'];
    		$where2['courseID'] = $value['courseid'];
    		$dataArray[$key]['courseName'] = $course->where($where2)->getField('courseName');
    		$count++;
    	}
    	++$page;
    	//dump($dataArray);
    	$result = array('data'=>$dataArray,'totalPage'=>$totalPage,'page'=>$page);
    	echo json_encode($result);
    }
    
    public function del_need_resource(){     //删除应提交资源
    	if(!session('userID')){
    		return ;
    	}
    	$needID = $_POST['needID'];
    	$needsubmit = M('needsubmit');
    	$count = 0;
    	foreach($needID as $key=>$value){
    		$where['needID'] = $value;
    		$count+=$needsubmit->where($where)->delete();
    	}
    	echo json_encode($count);	
    }
    
    
    public function needResourceSearch(){
    	$data = $_POST['data'];
    }
    
    public function showCourseStatistics(){
    	if(!session('userID')){
    		return ;
    	}
    	$page = $_POST['Page'];
    	if(!$page){
    		$page = 1;
    	}
    	if($page<1){
    		$page =1;
    	}
    	$line = 5;
    	$search = $_POST['search'];
    	$courseSta = M('teacherandcourse');
    	$course = M('course');
    	$user = M('userinfo');
    	if($search){
    		try{
    			$searchData = $_POST['searchData'];
    			$user = M('userinfo');
    			$course = M('course');
    			$where['userName'] = array("like","%".$searchData."%");
    			$where['Level'] = array("like","%".$searchData."%");
    			$where['Major'] = array("like","%".$searchData."%");
    			$where['_logic'] = 'OR';
    			$userID = $user->distinct(true)->where($where)->field('userID')->select();
    			foreach($userID as $value){
    				if(empty($userArray)){
    					$userArray = array($value['userid']);
    				}else{
    					array_push($userArray, $value['userid']);
    				}
    			}
    			unset($where);
    			$where['courseName'] = array("like","%".$searchData."%");
    			$courseID = $course->distinct(true)->where($where)->field('courseID')->select();
    			foreach($courseID as $value){
    				if(empty($courseArray)){
    					$courseArray = array($value['courseid']);
    				}else{
    					array_push($courseArray, $value['courseid']);
    				}
    			}
    			if($userID && $courseID){
    				unset($where);
    				$where['courseID'] = array("IN",$courseArray);
    				$where['userID'] = array("IN",$userArray);
    				$where['_logic'] = 'OR';
    				$count = $courseSta->where($where)->count();
    				$totalPage = ceil($count/$line);
    				if($page > $totalPage){
    					$page = $totalPage;
    				}
    				--$page;
    				$dataArray = $courseSta->order('Time desc')->where($where)->limit($page*$line,$line)->select();
    			}else if($userID){
    				unset($where);
    				$where['userID'] = array("IN",$userArray);
    				$count = $courseSta->where($where)->count();
    				$totalPage = ceil($count/$line);
    				if($page > $totalPage){
    					$page = $totalPage;
    				}
    				--$page;
    				$dataArray = $courseSta->order('Time desc')->where($where)->limit($page*$line,$line)->select();
    			}else if($courseID){
    				unset($where);
    				$where['courseID'] = array("IN",$courseArray);
    				$count = $courseSta->where($where)->count();
    				$totalPage = ceil($count/$line);
    				if($page > $totalPage){
    					$page = $totalPage;
    				}
    				--$page;
    				$dataArray = $courseSta->order('Time desc')->where($where)->limit($page*$line,$line)->select();
    			}
    			$countNum = 1;
    			foreach($dataArray as $key=>$value){
    				$dataArray[$key]['countNum'] = $countNum;
    				$where1['userID'] =  $value['userid'];
    				$userinfo = $user->where($where1)->select();
    				$dataArray[$key]['userName'] = $userinfo[0]['username'];
    				$dataArray[$key]['phone'] = $userinfo[0]['phone'];
    				$dataArray[$key]['major'] = $userinfo[0]['major'];
    				$dataArray[$key]['level'] = $userinfo[0]['level'];
    				$where2['courseID'] = $value['courseid'];
    				$dataArray[$key]['courseName'] = $course->where($where2)->getField('courseName');
    				$countNum++;
    			}
    			++$page;
    			$result = array('data'=>$dataArray,'totalPage'=>$totalPage,'page'=>$page);
    			echo json_encode($result);
    		}catch (\Exception $e){
    			echo json_encode(array("msg"=>$e->__toString()));
    		}
    		
    	}else{
    		$count = $courseSta->count();
    		$totalPage = ceil($count/$line);
    		if($page > $totalPage){
    			$page = $totalPage;
    		}
    		--$page;
    		$dataArray = $courseSta->order('Time desc')->limit($page*$line,$line)->select();
    		$countNum = 1;
    		foreach($dataArray as $key=>$value){
    			$dataArray[$key]['countNum'] = $countNum;
    			$where1['userID'] =  $value['userid'];
    			$userinfo = $user->where($where1)->select();
    			$dataArray[$key]['userName'] = $userinfo[0]['username'];
    			$dataArray[$key]['phone'] = $userinfo[0]['phone'];
    			$dataArray[$key]['major'] = $userinfo[0]['major'];
    			$dataArray[$key]['level'] = $userinfo[0]['level'];
    			$where2['courseID'] = $value['courseid'];
    			$dataArray[$key]['courseName'] = $course->where($where2)->getField('courseName');
    			$countNum++;
    		}
    		++$page;
    		$result = array('data'=>$dataArray,'totalPage'=>$totalPage,'page'=>$page);
    		echo json_encode($result);
    	}
    }
    public function del_courseUser(){
    	if(!session('userID')){
    		return ;
    	}
    	$data = $_POST['data'];
    	$needsubmit = M('teacherandcourse');
    	$count = 0;
    	foreach($data as $key=>$value){
    		$strArray = explode('|', $value);
    		$where['userID'] = $strArray[0];
    		$where['courseID'] = $strArray[1];
    		$count+=$needsubmit->where($where)->delete();
    	}
    	echo json_encode($count);
    }
    
    public function add_planAndProtocol(){
    	$courseName = $_POST['courseName1'];
    	$teacherName = $_POST['teacherName'];
    	$teacherID = $_POST['teacherID'];
    	$flg = $_POST['flg'];
    	$user = M('userinfo');
    	$where['userID'] = $teacherID;
    	$where['userName'] = $teacherName;
    	if($user->where($where)->select()){
    		if($flg == 1){
    			if(!file_exists(C('rootPath')."plan")){
    				mkdir(C('rootPath')."plan");
    			}
    		}else{
    			if(!file_exists(C('rootPath')."protocol")){
    				mkdir(C('rootPath')."protocol");
    		     }
    		}
    		$upload = new Upload();
    		$upload->maxSize = 1024*1024*100;  //100M
    		//$upload->exts = array();//文件后缀不限制
    		$upload->callback = true; //检测文件是否存在回调，如果存在返回文件信息数组
    		$upload->autoSub = false;
    		if($flg==1){
    			$savePath = "plan/"."user".$teacherID."/";
    			$plan = M('plan');
    		}else{
    			$savePath = "protocol/"."user".$teacherID."/";
    			$plan = M('protocol');
    			$maxID = $plan->max('protocolID');   //needid是否为空
    			if($maxID){
    				$data['protocolID'] = $maxID+1;
    			}else{
    				$data['protocolID'] = 1;
    			}
    		}
    		
    		//$savePath = iconv("GB2312","UTF-8",$savePath);
    		$upload->savePath = $savePath;  //用户资源文件
    		//命名规则保持文件原名
    		//$upload->saveName = session('userID')."-".date('Y-m-d H:i:s').rand(0, 1000);  //命名规则防止冲突
    		$info = $upload->upload();
    		if($info){
    			$data['Time'] = date('Y-m-d H:i:s');
    			$data['userID'] = $teacherID;
    			$data['courseID'] = $courseName;
    			foreach ($info as $file){
    				//$fileName = iconv("GB2312","UTF-8",$file['savename']); //中文文件名乱码问题
    				$data['Path'] = $file['savepath'].$file['savename'];
    				//$data['md5'] = $file['md5'];
    				$data['Name'] = $file['name'];
    				$plan->add($data);   //增加记录
    			}
    		echo xml_encode(0);
    	}else{
    		echo xml_encode(1);
    	}
    }
    
   }
   
   public function showPlanAndProtocol(){
   	if(!session('userID')){
   		return ;
   	}
   	$page = $_POST['Page'];
   	$type = $_POST['Type'];
   	$search = $_POST['search'];
   	if(!$page){
   		$page = 1;
   	}
   	if($page<1){
   		$page =1;
   	}
   	$line = 5;
   	if($type == 1){
   		$planp = M('plan');
   	}else if($type == 2){
   		$planp = M('protocol');
   	}
   	$course = M('course');
   	$user = M('userinfo');
   	if($search){
   		try{
   			$searchData = $_POST['searchData'];
   			$where['userName'] = array("like","%".$searchData."%");
   			$where['Level'] = array("like","%".$searchData."%");
   			$where['Major'] = array("like","%".$searchData."%");
   			$where['_logic'] = 'OR';
   			$userID = $user->distinct(true)->where($where)->field('userID')->select();
   			foreach($userID as $value){
   				if(empty($userArray)){
   					$userArray = array($value['userid']);
   				}else{
   					array_push($userArray, $value['userid']);
   				}
   			}
   			unset($where);
   			$where['courseName'] = array("like","%".$searchData."%");
   			$courseID = $course->distinct(true)->where($where)->field('courseID')->select();
   			foreach($courseID as $value){
   				if(empty($courseArray)){
   					$courseArray = array($value['courseid']);
   				}else{
   					array_push($courseArray, $value['courseid']);
   				}
   			}
   			if($userID && $courseID){
   				unset($where);
   				$where['courseID'] = array("IN",$courseArray);
   				$where['userID'] = array("IN",$userArray);
   				$where['_logic'] = 'OR';
   				$count = $planp->where($where)->count();
   				$totalPage = ceil($count/$line);
   				if($page > $totalPage){
   					$page = $totalPage;
   				}
   				--$page;
   				$dataArray = $planp->order('Time desc')->where($where)->limit($page*$line,$line)->select();
   			}else if($userID){
   				unset($where);
   				$where['userID'] = array("IN",$userArray);
   				$count = $planp->where($where)->count();
   				$totalPage = ceil($count/$line);
   				if($page > $totalPage){
   					$page = $totalPage;
   				}
   				--$page;
   				$dataArray = $planp->order('Time desc')->where($where)->limit($page*$line,$line)->select();
   			}else if($courseID){
   				unset($where);
   				$where['courseID'] = array("IN",$courseArray);
   				$count = $planp->where($where)->count();
   				$totalPage = ceil($count/$line);
   				if($page > $totalPage){
   					$page = $totalPage;
   				}
   				--$page;
   				$dataArray = $planp->order('Time desc')->where($where)->limit($page*$line,$line)->select();
   			}
   			$countNum = 1;
   			foreach($dataArray as $key=>$value){
   				$dataArray[$key]['countNum'] = $countNum;
   				$where1['userID'] =  $value['userid'];
   				$userinfo = $user->where($where1)->select();
   				$dataArray[$key]['userName'] = $userinfo[0]['username'];
   				$dataArray[$key]['phone'] = $userinfo[0]['phone'];
   				$dataArray[$key]['major'] = $userinfo[0]['major'];
   				$dataArray[$key]['level'] = $userinfo[0]['level'];
   				$where2['courseID'] = $value['courseid'];
   				$dataArray[$key]['courseName'] = $course->where($where2)->getField('courseName');
   				$countNum++;
   			}
   			++$page;
   			$result = array('data'=>$dataArray,'totalPage'=>$totalPage,'page'=>$page);
   			echo json_encode($result);
   		}catch (\Exception $e){
   			echo json_encode(array("msg"=>$e->__toString()));
   		}
   	}else{
   		$count = $planp->count();
   		$totalPage = ceil($count/$line);
   		if($page > $totalPage){
   			$page = $totalPage;
   		}
   		--$page;
   		$dataArray = $planp->order('Time desc')->limit($page*$line,$line)->select();
   		$countNum = 1;
   		foreach($dataArray as $key=>$value){
   			$dataArray[$key]['countNum'] = $countNum;
   			$where1['userID'] =  $value['userid'];
   			$userinfo = $user->where($where1)->select();
   			$dataArray[$key]['userName'] = $userinfo[0]['username'];
   			$dataArray[$key]['phone'] = $userinfo[0]['phone'];
   			$dataArray[$key]['major'] = $userinfo[0]['major'];
   			$dataArray[$key]['level'] = $userinfo[0]['level'];
   			$where2['courseID'] = $value['courseid'];
   			$dataArray[$key]['courseName'] = $course->where($where2)->getField('courseName');
   			$countNum++;
   		}
   		++$page;
   		$result = array('data'=>$dataArray,'totalPage'=>$totalPage,'page'=>$page);
   		echo json_encode($result);
   	}
   	
   }
   
   public function planAndProtocol(){
   	if(!session('userID')){
   		$this->success("请登录",index);
   		return;
   	}
   	$type = $_GET['Type'];
   	$id = $_GET['ID'];
   	if($type == 1){
   		$resource = M('plan');
   		$where['planID'] = $id;
   	}else{
   		$resource = M('protocol');
   		$where['protocolID'] = $id;
   		
   	}
   	$path = $resource->where($where)->getField('Path');
   	$name = $resource->where($where)->getField('Name');
   	$file_name = $path;
   	$file_dir = "./Uploads/";
   	if(!file_exists($file_dir.$file_name)){
   		echo "文件找不到";
   		exit();
   	}
   	else{
   		$file = fopen($file_dir.$file_name,'r');
   		header("content-type:application/octet-stream");
   		header("Accept-Ranges:bytes");
   		header("Accept-Length:".filesize($file_dir.$file_name));
   		header("Content-Disposition: attachment; filename=".$name);
   		echo fread($file,filesize($file_dir.$file_name));
   		exit;
   	}
   }
   
   public function del_protocolAndPlan(){
   	if(!session('userID')){
   		return ;
   	}
   	$type = $_POST['Type'];
   	$data = $_POST['ID'];
   	if($type == 1){
   		$proplan = M('plan');
   	}else{
   		$proplan = M('protocol');
   	}
   	$count = 0;
   	foreach($data as $key=>$value){
   		if($type == 1){
   			//unset($where);
   			$where['planID'] = $value;
   		}else{
   			//unset($where);
   			$where['protocolID'] = $value;
   		}
   		$count+=$proplan->where($where)->delete();
   	}
   	echo json_encode($count);
   }
   
   public function evaluate_teacher(){
   	if(!session('userID')){
   		$this->error('请登录',U('Home/Index/index'));
   	}
   	$user = M(userinfo);
   	$condition['userName'] = session('userName');
   	//数据库获取的都是小写字母。
   	$userinfo = $user->where($condition)->field('userName,Level,Major,userType')->select();
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
   	$messageinfo = $user->field('userID,imagePath,userName')->select();
   	$this->assign('messageinfo',$messageinfo);
   	$this->assign('info',$info);
   	$this->assign('userinfo',$userinfo[0]);
   	$this->assign('imgpath',$imgpath);
   	$this->display('assessor:evaluate_teacher');
   }
   
   
public function show_evaluate_teacher(){
   	if(!session('userID')){
   		return;
   	}
   	$page = $_POST['Page'];
   	$search = $_POST['search'];
   	$flg = $_POST['Flg'];
   	if(!$page){
   		$page = 1;
   	}
   	if($page<1){
   		$page =1;
   	}
   	$line = 5;
   	$evaluate = M("evaluation");
   	$course = M('course');
   	$user = M('userinfo');
   	if($search){
   		try{
   			$searchData = $_POST['searchData'];
   			$where['userName'] = array("like","%".$searchData."%");
   			$where['Level'] = array("like","%".$searchData."%");
   			$where['Major'] = array("like","%".$searchData."%");
   			$where['_logic'] = 'OR';
   			$userID = $user->distinct(true)->where($where)->field('userID')->select();
   			foreach($userID as $value){
   				if(empty($userArray)){
   					$userArray = array($value['userid']);
   				}else{
   					array_push($userArray, $value['userid']);
   				}
   			}
   			unset($where);
   			$where['courseName'] = array("like","%".$searchData."%");
   			$courseID = $course->distinct(true)->where($where)->field('courseID')->select();
   			foreach($courseID as $value){
   				if(empty($courseArray)){
   					$courseArray = array($value['courseid']);
   				}else{
   					array_push($courseArray, $value['courseid']);
   				}
   			}
   			if($userID && $courseID){
   				unset($where);
   				$where['courseID'] = array("IN",$courseArray);
   				$where['userID'] = array("IN",$userArray);
   				$where['_logic'] = 'OR';
   				$count = $evaluate->where($where)->count();
   				$totalPage = ceil($count/$line);
   				if($page > $totalPage){
   					$page = $totalPage;
   				}
   				--$page;
   				if($flg == 1){
   					$dataArray = $evaluate->order('averScore asc')->where($where)->limit($page*$line,$line)->select();
   				}else if($flg == 2){
   					$dataArray = $evaluate->order('averScore desc')->where($where)->limit($page*$line,$line)->select();
   				}else{
   					$dataArray = $evaluate->order('Time desc')->where($where)->limit($page*$line,$line)->select();
   				}
   			}else if($userID){
   				unset($where);
   				$where['userID'] = array("IN",$userArray);
   				$count = $evaluate->where($where)->count();
   				$totalPage = ceil($count/$line);
   				if($page > $totalPage){
   					$page = $totalPage;
   				}
   				--$page;
   			if($flg == 1){
   					$dataArray = $evaluate->order('averScore asc')->where($where)->limit($page*$line,$line)->select();
   				}else if($flg == 2){
   					$dataArray = $evaluate->order('averScore desc')->where($where)->limit($page*$line,$line)->select();
   				}else{
   					$dataArray = $evaluate->order('Time desc')->where($where)->limit($page*$line,$line)->select();
   				}
   			}else if($courseID){
   				unset($where);
   				$where['courseID'] = array("IN",$courseArray);
   				$count = $evaluate->where($where)->count();
   				$totalPage = ceil($count/$line);
   				if($page > $totalPage){
   					$page = $totalPage;
   				}
   				--$page;
   			if($flg == 1){
   					$dataArray = $evaluate->order('averScore asc')->where($where)->limit($page*$line,$line)->select();
   				}else if($flg == 2){
   					$dataArray = $evaluate->order('averScore desc')->where($where)->limit($page*$line,$line)->select();
   				}else{
   					$dataArray = $evaluate->order('Time desc')->where($where)->limit($page*$line,$line)->select();
   				}
   			}
   			$countNum = 1;
   			foreach($dataArray as $key=>$value){
   				$dataArray[$key]['countNum'] = $countNum;
   				$where1['userID'] =  $value['userid'];
   				$userinfo = $user->where($where1)->select();
   				$dataArray[$key]['userName'] = $userinfo[0]['username'];
   				$dataArray[$key]['phone'] = $userinfo[0]['phone'];
   				$dataArray[$key]['major'] = $userinfo[0]['major'];
   				$dataArray[$key]['level'] = $userinfo[0]['level'];
   				$where2['courseID'] = $value['courseid'];
   				$dataArray[$key]['courseName'] = $course->where($where2)->getField('courseName');
   				$countNum++;
   			}
   			++$page;
   			$result = array('data'=>$dataArray,'totalPage'=>$totalPage,'page'=>$page);
   			echo json_encode($result);
   		}catch (\Exception $e){
   			echo json_encode(array("msg"=>$e->__toString()));
   		}
   	}else{
   		$count = $evaluate->count();
   		$totalPage = ceil($count/$line);
   		if($page > $totalPage){
   			$page = $totalPage;
   		}
   		--$page;
   	           if($flg == 1){
   					$dataArray = $evaluate->order('averScore asc')->where($where)->limit($page*$line,$line)->select();
   				}else if($flg == 2){
   					$dataArray = $evaluate->order('averScore desc')->where($where)->limit($page*$line,$line)->select();
   				}else{
   					$dataArray = $evaluate->order('Time desc')->where($where)->limit($page*$line,$line)->select();
   				}
   		$countNum = 1;
   		foreach($dataArray as $key=>$value){
   			$dataArray[$key]['countNum'] = $countNum;
   			$where1['userID'] =  $value['userid'];
   			$userinfo = $user->where($where1)->select();
   			$dataArray[$key]['userName'] = $userinfo[0]['username'];
   			$dataArray[$key]['phone'] = $userinfo[0]['phone'];
   			$dataArray[$key]['major'] = $userinfo[0]['major'];
   			$dataArray[$key]['level'] = $userinfo[0]['level'];
   			$where2['courseID'] = $value['courseid'];
   			$dataArray[$key]['courseName'] = $course->where($where2)->getField('courseName');
   			$countNum++;
   		}
   		++$page;
   		$result = array('data'=>$dataArray,'totalPage'=>$totalPage,'page'=>$page);
   		echo json_encode($result);
   	}
   }
   
   public function del_evaluation(){
   	if(!session('userID')){
   		return ;
   	}
   	$data = $_POST['ID'];
   	$evaluation = M('evaluation');
   	$count = 0;
   	foreach($data as $key=>$value){
   		$where['evalID'] = $value;
   		$count+=$evaluation->where($where)->delete();
   	}
   	echo json_encode($count);
   }
   
   
   ////评价
   public function evaluation(){
   	if(!session('userID')){
   		return ;
   	}
   	$data = $_POST['data'];
   	$id = $_POST['ID'];
   	$evaluation = M('evaluation');
   	$where['evalID'] = $id;
   	$evaluation->where($where)->setField('Note',$data);
   	json_encode(1);
   }
   
   public function show_resource(){
   	if(!session('userID')){
   		return ;
   	}
   	////////////////////////////////////////////获得操作数据
   	$search = $_POST['search'];
   	$page = $_POST['Page'];
   	$flg = $_POST['Flg'];
   	////////////////////////////////////////////
   	if(!$page){
   		$page = 1;
   	}
   	if($page<1){
   		$page =1;
   	}
   	$line = 4;
   	//$flg = 1;   //实验代码
   	$resource = M('resource'); //教师提交资源表
   	$data = $resource->order('Time desc')->select();
   	$totalPage = 0;
   	foreach($data as $value){
   		if(empty($arrayData[$value['userid'].$value['courseid']])){
   			$arrayData[$value['userid'].$value['courseid']] = array($value);
   		}else{
   			array_push($arrayData[$value['userid'].$value['courseid']], $value);
   		}
   	}//arrayData为查询数据
   	if($search){   //查询
   		
   	}else{
   		if($flg == 0){
   			$request = &$arrayData;
   		}else if($flg == 1){
   			foreach ($arrayData as $v){
   				$status = 1;
   				foreach($v as $v1){
   					$vv = $v1;
   					if($v1['status'] != 1){
   						$status = 0;
   						break;
   					}
   				}
   				if($status){
   					if(empty($request)){
   						$request = array($v);
   					}else{
   						array_push($request, $v);
   					}
   				}
   			}
   		}else if($flg == 2){
   			foreach ($arrayData as $v){
   				$status = 1;
   				$vv = null;
   				foreach($v as $v1){
   					$vv = $v1;
   					if($v1['status'] != 1){
   						$status = 0;
   						break;
   					}
   				}
   				if(!$status){
   					if(empty($request)){
   						$request = array($v);
   					}else{
   						array_push($request, $v);
   					}
   				}
   			}
   		}
   		$st = 0;
   		if($request){
   			$st = 1;
   			$count = count($request);
   			$totalPage = ceil($count/$line);
   			if($page > $totalPage){
   				$page = $totalPage;
   			}
   			--$page;
   			$requestData = array_slice($request,$page*$line,$line,true);
   			++$page;
   		}
   	}
   	dump($requestData);
   	$result = array("status"=>$st,"data"=>$requestData,"page"=>$page,"totalPage"=>$totalPage);
   	echo json_encode($result);
   	
   }
    //实验代码
    public function demo(){
//     	$needSubmit = M("needsubmit");
//     	$maxID = $needSubmit->max('needID');
//     	dump($maxID);
//         $user = M('userinfo');
//         $searchData = "物联网";
//     	$where['userName'] = array("like","%".$searchData."%");
//     	$where['Level'] = array("like","%".$searchData."%");
//     	$where['Major'] = array("like","%".$searchData."%");
//     	$where['_logic'] = 'OR';
//     	$userID = $user->distinct(true)->where($where)->select();
//     	dump($userID);
        $str = "hello|hell|jlajf";
        $strs = explode('|', $str);
        dump($strs);
    }
    
    
}