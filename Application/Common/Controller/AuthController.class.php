<?php
namespace Common\Controller;
use Think\Controller;
use Think\Auth;
class AuthController extends Controller{
	protected function _initialize(){
		$auth = new Auth();
		if(!session('userName')){
			$this->error('您尚未登陆',U('/Home/Index/index'));
		}
		if(!$auth->check()){
			$this->error('您没有此操作权限');
		}
	}
}