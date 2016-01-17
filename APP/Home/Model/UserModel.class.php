<?php
namespace Home\Model;
use Think\Model;
/**
* 
*/
class UserModel extends Model
{
	public function __construct(){
		parent::__construct();
		echo "hello user";
	}
	
}