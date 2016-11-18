<?php
namespace  Admin\Controller;
use Think\Controller;
  class  IndexController extends MyController{
     public function index(){
     	$row=session('user');
     	$row['oldtime']=date('Y-m-d H:i:s',$row['oldtime']);
         $this->assign('row',$row);
         $this->display();
    }

}