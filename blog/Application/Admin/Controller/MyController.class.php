<?php
namespace Admin\Controller;
use Think\Controller;
class MyController extends Controller{
    public function _initialize(){
        $user=$_SESSION['user'];
         $user_id=$user['id'];
        if(empty($user_id)){
            $this->error('必须先登陆',U('Public/login'));
        }
    }
}