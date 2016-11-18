<?php
namespace Admin\Model;
use Think\Model;
class PersonModel extends Model{
   protected $pk='id';
   protected $fileds=array('id','username','password','login_ip','time','num');
}