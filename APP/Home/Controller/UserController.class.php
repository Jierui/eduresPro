<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
//use Think\Model;
use Home\Model\UserModel;
class UserController extends Controller {
    public function index(){
    	echo 'User Index';
        $image = new \Think\Image();
        $image->open('./Public/images/1.jpg');
        $image->thumb(150,150)->save('./Public/images/2.jpg');
    	//$this->display();
    	//session('user','loujie');
    }
    public function dbConnection(){
    	//$user = new UserModel('demo_user');
    	$user = D('User');
    	dump($user->select());
    }
    public function test(){
    	//echo session('user');
        show();
    }
    public function verify(){
        $verify = new Verify();
        $verify->entry();
    }
    public function test1(){
        $code = I('get.code');
        echo $code;
        "<br/>";
        dump(check_verify($code));
    }
}