<?php
namespace Admin\Controller;
use  Think\Controller;
 class ArticleController extends MyController{
    public function index(){
    	$art=D('Article');
    	$data=$art->table('bk_article')->alias('a')->field('a.id,a.title,a.small,a.hits,a.time,c.name')
    	          ->join('bk_category as c on c.id=a.cateid','left')->select();
    	$this->assign('data',$data);
    	$this->display();
    }
    public function add(){
    	$cate=D('Category');
      $list=$cate->select();
      load('@/tree');
	    $data = tree($list);
      $this->assign('data',$data);
 		$this->display();
    }
    public function addok(){
    		if(IS_POST){
    		$art=D('Article');
    		$data=$art->create();
    		$data['time']=time();
    		$data['hits']=100;
    		//文件上传
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
		       $data['thumb'] = $info['file']['savepath'].$info['file']['savename'];	//100KB  20160705/abcd.jpg
				//获取原图像
				$file = './Uploads/images/'.$info['file']['savepath'].$info['file']['savename'];
				//第一步：实例化图像处理类
				$img = new \Think\Image();
				//第二步：使用open方法打开图像
				$img->open($file);
				//第三步：使用thumb方法生成缩略图
				$img->thumb(144,90,2);	//使用缩略图补白
				//第四步：使用thumb方法保存图像
				$small = $info['file']['savepath'].'small_'.$info['file']['savename'];
				$img->save('./Uploads/images/'.$small);
				$data['small'] = $small;
			}
		}
    	   if($art->add($data)){
    	   	$this->success('添加成功','index',1);
    	   }else{
    	   	$this->error('添加失败');
    	   }	
    	}
    	$this->display();
    }
  

  public function edit($id){
     $art=D('Article');
     $row= $art->select();
     $this->assign('row',$row[0]);
     $cate=D('Category');
     $list=$cate->select();
     load('@/tree');
     $data = tree($list);
     $this->assign('data',$data);
     $this->display();
    }
  
   public function editok(){
     if(IS_POST){
     	$art=D('Article');
     	$data= $art->create();
        if( $art>save($data)){
          $this->success('更行成功','index',1);
        }else{
          $this->error('更行失败');
        }
     	}
    }

   public function del($id){
   	 if(IS_GET){
   	 	$art=D('Article');
   	 	if( $art->delete($id)){
   	 		$this->success('删除成功',U('Admin/Category/index'),1);
   	 	}else{
   	 		$this->error('删除失败');
   	 	}
   	 }

   }
   
  public function delall(){
  	if(IS_POST){
  		$ids=I('post.id');         //数组
  		$art=D('Article');
  		$where=array('id'=>array('in',$ids));
  		$row= $art->where($where)->delete();
  	    if($row){
  	    	$this->success('删除成功',U('Admin/Category/index'),1);
   	 	 }else{
   	 		$this->error('删除失败');
  	    }
  	}
  }
   





 }
?>