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
<link rel="stylesheet" href="/Public/Admin/css/dropify.css">
<script src="/Public/Admin/js/jquery.js"></script>
<script src="/Public/Admin/js/pintuer.js"></script>
<script src="/Public/Admin/js/respond.js"></script>
<script src="/Public/Admin/js/admin.js"></script>
<script src="/Public/Admin/js/dropify.js"></script>
 <script src="./Public/ckeditor/ckeditor.js"></script>
<script>
            //上传图片
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();
                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();
                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });
                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });
                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>
<link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
<link href="/favicon.ico" rel="bookmark icon" />
</head>
<body>
<?php $type=30;?>
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
                <li <?php if(($type) == "40"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Admin/Lanmu/index');?>" class="icon-th-list"> 栏目</a></li>
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

<div class="admin">
  <div class="tab">
    <div class="tab-head"> <strong>站长管理</strong>
      <ul class="tab-nav">
        <li class="active"><a href="#tab-set">站长信息</a></li>
      </ul>
    </div>
    <div class="tab-body"> <br />
      <div class="tab-panel active" id="tab-set">
        <form method="post" class="form-x" action="/index.php/Admin/Zhanzhang/editok" enctype='multipart/form-data'>
          <div class="form-group">
            <div class="label">
              <label for="sitename">网名</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="nickname" name="nickname" size="50" placeholder="站长网名" data-validate="required:请填写站长网名" value="<?php echo ($row['nickname']); ?>" />
            </div>
          </div>
        <div class="form-group">
            <div class="label">
              <label for="logo">缩略图</label>
            </div>      
            <div class="field"> <a style=text-decoration:underline >上传文件
         <input size="100" type="file" id="input-file-events" class="dropify-event" name="file" data-validate="required:请选择上传文件,regexp#.+.(jpg|jpeg|png|gif)$:只能上传jpg|gif|png格式文件" data-default-file="/Uploads/images/<?php echo ($row["thumb"]); ?>"/> 
              </a> </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="siteurl">职业</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="job" name="job" size="50" placeholder="请填写您的职业" data-validate="required:请填写您的职业" value="<?php echo ($row['job']); ?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="siteurl">籍贯</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="address" name="address" size="50" placeholder="请填写您的籍贯" data-validate="required:请填写您的籍贯" value="<?php echo ($row['address']); ?>"/>
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="siteurl">电话</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="tel" name="tel" size="50" placeholder="请填写您的电话" data-validate="required:请填写您的电话" value="<?php echo ($row['tel']); ?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="siteurl">邮箱</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="email" name="email" size="50" placeholder="请填写您的邮箱" data-validate="required:请填写您的邮箱" value="<?php echo ($row['email']); ?>" />
            </div>
          </div>
          <div class="form-button">
            <button name="submit" class="button bg-main" type="submit">提交</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div style='height:40px; border-bottom:1px #DDD solid'></div>
  <p class="text-left text-gray" style="float:left">版权<a class="text-gray" target="_blank" href="#">归http://www.ticast.cn</a>所有</p>
  <p class="text-right text-gray" style="float:right">基于<a class="text-gray" target="_blank" href="#">拼图前端框架</a>构建</p>
</div>
</body>
</html>