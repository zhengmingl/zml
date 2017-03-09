<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller{
    public function login(){

        $this->display();
    }
    //验证登陆
public function yzlogin(){
  $param = I('post.');
  $verify=new \Think\Verify();
  if(!$verify->check($param['passcode'])){
          $code=array('code'=>0,'mes'=>'验证码错误');
           _ajaxFailure($code);
        }
     $password=md5($param['password']);
     $username=$param['username'];
     $where="username='$username' and password='$password'";
        $per=D('Person');
        $row=$per->where($where)->find();
        $row['oldtime']=$row['time'];
        if($row['id']){
        $row['num']=$row['num']+1;
        $row['time']=time();
        $row['login_ip']=$_SERVER['REMOTE_ADDR'];      //获取IP地址
        $id=$row['id'];
        $per->where("id=$id")->field('num,time,login_ip')->save($row);    //更新登录次数和时间
        session('user',$row);
        $code=array('code'=>200);
        _ajaxFailure($code);
     }else{
          $code=array('code'=>1,'mes'=>'用户名或者密码错误');
           _ajaxFailure($code);
     }
}
     
  //定义方法生成验证码
    public function Verify(){
         $config = array(
             'codeSet'=>'23456789',
             'fontSize' => 18,
             'length'  =>4,
             'useCurve'=>false,
             'useNoise'=>false,
         );
    $Verify=new \Think\Verify($config);
        //清除ob缓存
        ob_clean();
        $Verify->entry();

}

//定义退出方法
  public function logout(){
      session('user',null);
      session(null);
      $userid=cookie('userid');
      if($userid){
         cookie('userid',null);
      }

     _redirect(U('Admin/public/login'));
 // $this->success('退出成功',U('Admin/public/login'),1);
  }






}




?>