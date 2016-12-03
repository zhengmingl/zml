<?php
namespace  Admin\Controller;
use Think\Controller;
  class  IndexController extends MyController{
     public function index(){
     	$sionrow=session('user');
     	$row['oldtime']=date('Y-m-d H:i:s',$row['oldtime']);
        $this->assign('sionrow',$sionrow);
        $this->display();
    }

}