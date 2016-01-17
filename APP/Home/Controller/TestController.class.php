<?php 
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller{
	public function index(){
		// echo 'hello world';
		$name = 'ThinkPHP';
		$this->assign('name',$name);
		$data['name'] = 'loujienihao';
		$data['time']=date();
		$this->data = $data;
		$user['name']='loujie';
		$this->assign('user',$user);
		$this->display();
	}
}