<?php
namespace Admin\Model;
use      Think\Model;
class CategoryModel extends Model{
   protected $pk='id';
   protected $fileds=array('id','name','pid','remark','sort');
}




?>