<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>拼图后台管理-后台管理</title>
    <link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
    <link rel="stylesheet" href="/Public/Admin/css/admin.css">
    <script src="/Public/Admin/js/jquery.js"></script>
    <script src="/Public/Admin/js/pintuer.js"></script>
    <script src="/Public/Admin/js/respond.js"></script>
    <script src="/Public/Admin/js/admin.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
    <script>
    $.fn.extend({
      fanxuan:function(){
      var leng=this.length;
      for(var i=0;i<leng;i++){
      this[i].checked=!this[i].checked;
      }
    }
      });
       
        //定义页面载入事件
        $(function(){
              //全选按钮
            $('#quanxuan').click(function(){
               $(".table :checkbox").attr("checked", true); 
            });

            //全不选按钮
            $('#quxiao').click(function(){
               $(".table :checkbox").attr("checked",false);
            });

            //反选按钮
            //  $('#fanxuan').click(function(){
            //       $(".table :checkbox").each(function () {
            //         $(this).attr("checked",!$(this).attr("checked")); //!$(this).attr("checked")判断复选框的状态：如果选中则取反
            //         });
            // });
            $("#fanxuan").bind("click",function(){
            $(".table :checkbox").fanxuan()
            });


             //获取btnAdd按钮 增加分类
            $('#btnAdd').bind('click',function(){
                window.location.href = "<?php echo U('Admin/Category/add');?>";
            });
        
           
            //批量删除
            $('#alldel').click(function(){
                    if($(".table :checked").size()==0){
                       alert('你没有选中任何元素！！！');
                      return false;
                    }else{
                       if(confirm('你确定要删除么!!!')){
                         return true;
                       }else{
                        return false;
                       }
                    }
            })

        }); 
    </script>
</head>
<body>
<?php $type="10";$types="0";?>
<div class="lefter">
    <div class="logo"><a href="#" target="_blank"><img src="/Public/Admin/images/logo.png" alt="后台管理系统" /></a></div>
</div>
<div class="righter nav-navicon" id="admin-nav">
    <div class="mainer">
        <div class="admin-navbar">
            <span class="float-right">
            	<a class="button button-little bg-main" href="#" target="_blank">前台首页</a>
                <a class="button button-little bg-yellow" href="<?php echo U('Admin/Public/logout');?>">注销登录</a>
            </span>

             <ul class="nav nav-inline admin-nav" id="menu_list">
                <li <?php if(($type) == "0"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Admin/Index/index');?>" class="icon-home"> 开始</a>
                     <ul><li><a href="<?php echo U('Admin/Category/index');?>">分类管理</a></li><li><a href="<?php echo U('Admin/Article/index');?>">文章管理</a></li><li><a href="<?php echo U('Admin/Article/index');?>">文章管理</a></li><li><li><a href="<?php echo U('Admin/Zhanzhang/index');?>">站长管理</a></li><a href="index.php?c=Artonce&a=index">页面管理</a></li><li><a href="index.php?c=Zhanzhang&a=index">站长管理</a></li><li><a href="index.php?c=Link&a=index">友情链接</a></li></ul>  
                 </li>
                <li <?php if(($type) == "10"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Admin/Category/index');?>" class="icon-file-text"> 分类管理</a>
                   <ul><li <?php if(($types) == "0"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Admin/Category/index');?>">分类管理</a></li><li <?php if(($types) == "10"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Admin/Category/add');?>">分类添加</a></li></ul>  
                </li>
                 <li <?php if(($type) == "20"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Admin/Article/index');?>" class="icon-file"> 文章管理</a>
                     <ul><li <?php if(($types) == "0"): ?>class="active"<?php endif; ?>><a  href="<?php echo U('Admin/Article/index');?>">文章管理</a></li><li <?php if(($types) == "10"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Admin/Article/add');?>">文章添加</a></li></ul>  
                 </li>
                 <li <?php if(($type) == "30"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Admin/Zhanzhang/index');?>" class="icon-user"> 站长管理</a></li>
                <li <?php if(($type) == "40"): ?>class="active"<?php endif; ?>><a href="#" class="icon-th-list"> 栏目</a></li>
                <li <?php if(($type) == "50"): ?>class="active"<?php endif; ?>><a href="#" class="icon-shopping-cart"> 订单</a></li>
               
            </ul>
        </div>
        <div class="admin-bread">
            <span>您好，<?php echo ($sionrow["username"]); ?>欢迎您的光临。</span>
            <ul class="bread">
                <li><a href="index.html" class="icon-home"> 开始</a></li>
                <li>后台首页</li>
            </ul>
        </div>
    </div>
</div>

<div class="lefter">
    <div class="logo"><a href="#" target="_blank"><img src="/Public/Admin/images/logo.png" alt="后台管理系统" /></a></div>
</div>
<div  id="admin-nav">
    <div class="mainer">
        <div class="admin-navbar">
            <span class="float-right">
                <a class="button button-little bg-main" href="#" target="_blank">前台首页</a>
                <a class="button button-little bg-yellow" href="<?php echo U('Admin/Public/logout');?>">注销登录</a>
            </span>
            <ul class="nav nav-inline admin-nav">
                <li ><a href="<?php echo U('Admin/Index/index');?>" class="icon-home"> 开始</a>
                    <ul><li class="active"><a  href="<?php echo U('Admin/Category/index');?>">分类管理</a></li><li><a href="#">添加分类</a></li><li><a href="#">修改分类</a></li></ul>
                </li>
            
                <li><a href="<?php echo U('Admin/Category/index');?>" class="icon-file-text" target="_blank"> 文章分类</a>
                </li>
                <li><a href="#" class="icon-shopping-cart"> 订单</a></li>
                <li><a href="#" class="icon-user"> 会员</a></li>
                <li><a href="#" class="icon-file"> 文件</a></li>
                <li><a href="#" class="icon-th-list"> 栏目</a></li>
            </ul>
        </div>
        <div class="admin-bread">
            <span >您好，<?php echo ($row["username"]); ?>欢迎您的光临。</span>
            <ul class="bread">
                <li><a href="index.html" class="icon-home"> 开始</a></li>
                <li>后台首页</li>
            </ul>
        </div>
    </div>
</div>

<div class="admin">
	<form method="post" action="/index.php/Admin/Category/delall">
    <div class="panel admin-panel">
    	<div class="panel-head"  id="iii"><strong>分类列表</strong></div>
        <div class="padding border-bottom">
        <input type="button" class="button button-small border-blue" name="checkall" checkfor="id[]" id='quanxuan' value="全选1" />
        <input type="button" class="button button-small border-blue" id="quxiao" value="全不选" />
        <input type="button" class="button button-small border-blue" id="fanxuan" value="反选" />
        <input type="button" id="btnAdd" class="button button-small border-green" value="添加分类" />
        <input type="submit" class="button button-small border-yellow" value="批量删除" id="alldel"/>
        </div>
        <table class="table table-hover">
        	<tr>
                <th width="45">选择</th>
                <th width="120">所属类别</th>
                <th width="240">分类名称</th>
                <th width="*">分类描述</th>
                <th width="100">操作</th>
            </tr>
              <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><input type="checkbox" name="id[]" value="<?php echo ($vo['id']); ?>" /></td>
                <td><?php echo ($vo['name']); ?></td>
                <td> <?php echo (str_repeat('&nbsp;',$vo["level"]*5)); echo ($vo['pid']); ?> </td>
                <td><?php echo ($vo['remark']); ?> </td>
                <td>
                    <a class="button border-blue button-little"   href="<?php echo U('Admin/Category/edit',array('id'=>$vo['id']));?>">修改</a> 
                    <a class="button border-yellow button-little" href="<?php echo U('Admin/Category/del',array('id'=>$vo['id']));?>" onclick="return confirm('确定删除么?')">删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
    </div>
    </form>
    <br />
    <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">拼图前端框架</a>构建</p>
</div>

</body>
</html>