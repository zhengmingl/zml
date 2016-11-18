<?php
namespace  Admin\Controller;
use Think\Controller;
  class  IndexController extends MyController{
     public function index(){
     	$row=session('user');
         $this->assign('row',$row);
         $this->display();
    }

}