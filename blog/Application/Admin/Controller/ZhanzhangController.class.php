<?php
namespace Admin\Controller;
use      Think\Controller;
 class ZhanzhangController extends MyController{
    public function index(){
       $zhan=D('Zhanzhang');
       $row=$zhan->select();
       $this->assign('row',$row[0]);
       $this->display();
    }


 public function editok(){
 	if(IS_POST){
     	$zhan=D('Zhanzhang');
     	$data= $zhan->create();
        $row=$zhan->select();
        $data['id']=$row[0]['id'];
      //上传图片改了的话
      if($_FILES['file']['size'] > 0) {
      //第一步：实例化Upload上传类
      $upload = new \Think\Upload();
      //第二步：设置相关参数
      $upload->maxSize = 2097152; //上传文件的最大值为2M
      $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); //上传文件格式
      $upload->rootPath = './Uploads/images/'; //上传文件目录
      $upload->subName = array('date', 'Ymd'); //子目录命名规则:20160705
      //第三步：调用upload方法实现文件上传
      if(!$info = $upload->upload()) {
              //第四步：输出错误信息
          $this->error($upload->getError());
      } else {
           $data['thumb'] = $info['file']['savepath'].$info['file']['savename'];  //100KB  20160705/abcd.jpg
        //获取原图像
        $file = './Uploads/images/'.$info['file']['savepath'].$info['file']['savename'];
        //第一步：实例化图像处理类
        $img = new \Think\Image();
        //第二步：使用open方法打开图像
        $img->open($file);
        //第三步：使用thumb方法生成缩略图
        $img->thumb(144,90,2);  //使用缩略图补白
        //第四步：使用thumb方法保存图像
        $small = $info['file']['savepath'].'small_'.$info['file']['savename'];
        $img->save('./Uploads/images/'.$small);
        $data['small'] = $small;
      }
    }else{
      $data['thumb']=$row[0]['thumb'];
      $data['small']=$row[0]['small'];
    }
        if( $zhan->save($data)){
          $this->success('更新成功','index',1);
        }else{
          $this->error('更新失败');
        }
     	}
    }














 }


?>