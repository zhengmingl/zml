<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller{
    public function login(){

        $this->display();
    }
    //验证登陆
public function yzlogin(){
    if(IS_POST){
        $username=I('post.username');
        $password=I('post.password');
        $code=I('post.passcode');

        if(empty($code)){
            $this->error('验证码不能为空','login',1);
        }
       $verify=new \Think\Verify();
        if(!$verify->check($code)){
            $this->error('验证码错误','login',1);
        }
       if(empty($username)||empty($password)){
           $this->error('用户名或者密码不能为空',login,1);
       }
      $password=md5($password);
        $where="username='$username' and password='$password'";
        $per=D('Person');
        $row=$per->where($where)->find();
        if($row['id']){
        $row['num']=$row['num']+1;
        $row['time']=time();
        $id=$row['id'];
        $per->where("id=$id")->save($row);    //更新登录次数和时间
        
            session('user',$row);
            $this->success('登陆成功',U('Admin/Index/index'),1);
        }else{
            $this->error('用户名或密码错误',login,1);
        }
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
  $this->success('退出成功',U('Admin/public/login'),1);
  }






}




?>