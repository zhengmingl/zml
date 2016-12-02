<?php
namespace Admin\Controller;
use      Think\Controller;
 class CategoryController extends MyController{
 	public function index(){
 		$cate=D('Category');
 		$data=$cate->select();
 			load('@/tree');
		$tree=tree($data);
		 foreach ($tree as  $value) {
          $res['id']=$value['id'];
          $res['name']=$value['name'];
          $res['remark']=$value['remark'];
          $res['level']=$value['level'];
          if($value['pid']==0){
        	$res['pid']="主类别";
          }else{ 
          	$id=$value['pid'];
        	$lei=$cate->field('name as na')->where("id=$id")->select();
           $res['pid']=$lei['0']['na'];
              }
        $list[]=$res;
		   }  
 		$this->assign('list',$list);
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
    		$cate=D('Category');
    		$data=$cate->create();
    	   if($cate->add()){
    	   	$this->success('添加成功','index',3);
    	   }else{
    	   	$this->error('添加失败');
    	   }	

    	}
    }
      
    public function edit($id){
       $cate=D('Category');
       $data=$cate->field('name,id,pid')->select();
 	   load('@/tree');
	   $tree=tree($data);
       $row=$cate->find($id);
       $this->assign('tree',$tree);
       $this->assign('row',$row);
       $this->display();
    }
  
   public function editok(){
     if(IS_POST){
     	$cate=D('Category');
     	$data=$cate->create();
        if($cate->save($data)){
          $this->success('更行成功','index',1);
        }else{
          $this->error('更行失败');
        }
     	}
    }

   public function del($id){
   	 if(IS_GET){
   	 	$cate=D('Category');
   	 	if($cate->delete($id)){
   	 		$this->success('删除成功',U('Admin/Category/index'),1);
   	 	}else{
   	 		$this->error('删除失败');
   	 	}
   	 }

   }
   
  public function delall(){
  	if(IS_POST){
  		$ids=I('post.id');         //数组
  		$cate=D('Category');
  		$where=array('id'=>array('in',$ids));
  		$row=$cate->where($where)->delete();
  	    if($row){
  	    	$this->success('删除成功',U('Admin/Category/index'),1);
   	 	 }else{
   	 		$this->error('删除失败');
  	    }
  	}
  }
   


 }



?>