<?php
namespace Admin\Model;
use      Think\Model;
class CategoryModel extends Model{
   protected $pk='cateid';
   protected $fileds=array('id','name','pid','remark','sort');
}




?>