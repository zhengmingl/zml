<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>拼图后台管理-管理员登录</title>
    <link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
    <link rel="stylesheet" href="/Public/Admin/css/admin.css">
    <script src="/Public/Admin/js/jquery.js"></script>
    <script src="/Public/Admin/js/pintuer.js"></script>
    <script src="/Public/Admin/js/respond.js"></script>
    <script src="/Public/Admin/js/admin.js"></script>
   <script src="/Public/Admin/js/dropify.js"></script>
  <script  src="/Public/Admin/js/canvas-particle.js"></script>
    <script src="/Public/Admin/js/layer/layer.js"></script>
    <script>

   function showalert(mes,close){  
    var close = close || 0; 
    layer.open({
    //area: ['630px', '360px'],
    content: mes,
    btn: ['确定'],//,'取消']
    end:function(){       //end - 层销毁后触发的回调
            if(close){
                window.location.reload();
            }
        }
  });

}

     $(function(){
 
            $('#code').bind('click',function(){
                $(this).attr('src',"/index.php/Admin/Public/Verify/_/"+Math.random());
            })
             $("button[name=btn]").click(function(){
             var username=$("input[name=username]").val();
             var password=$("input[name=password]").val();
             var passcode=$("input[name=passcode]").val();
             if(passcode==''){
                layer.alert('验证码不能为空', {icon: 2});
                //showalert("验证码不能为空");
                return false;
             }
             if(username==''){
                showalert('用户名不能为空');
                return false;
             }
             if(password==''){
                showalert("密码不能为空");
                return false;
             }
            $.ajax({
                type:"post",
                data:{username:username,password:password,passcode:passcode},
                url:"yzlogin",
                dataType:"json",
                success:function(data){
                    if(data.code==0){
                        showalert(data.mes);
                        return false;
                    }else if(data.code==1){
                        showalert(data.mes);
                        return false;
                    }else if(data.code==200){
                         window.location.href ="<?php echo U('Admin/Index/index');?>";
                    }else{
                        showalert('网络错误');
                        return false;
                    }
                }
            })
        })
        })
        
    </script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
</head>

<body>
<div class="container">
    <div class="line">
        <div class="xs6 xm4 xs3-move xm4-move">
            <br /><br />
            <div class="media media-y">
                <a href="#" target="_blank"><img src="/Public/Admin/images/logo.png" class="radius" alt="后台管理系统" /></a>
            </div>
            <br /><br />
            <!-- <form action="/index.php/Admin/Public/yzlogin" method="post"> -->
            <div class="panel">
                <div class="panel-head"><strong >登录拼图后台管理系统</strong></div>
                <div class="panel-body" style="padding:30px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input" name="username" placeholder="登录账号" data-validate="required:请填写账号,length#>=5:账号长度不符合要求" />
                            <span class="icon icon-user"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input" name="password" placeholder="登录密码" data-validate="required:请填写密码,length#>=8:密码长度不符合要求" />
                            <span class="icon icon-key"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field">
                            <input type="text" class="input" name="passcode" placeholder="填写右侧的验证码" data-validate="required:请填写右侧的验证码" />
                            <img id="code" src="/index.php/Admin/Public\Verify" width="80" height="32" class="passcode" />
                        </div>
                    </div>
                </div>
                <div class="panel-foot text-center"><button name="btn" class="button button-block bg-main text-big">立即登录后台</button></div>
            </div>
            <div class="text-right text-small text-gray padding-top">基于<a class="text-gray" target="_blank" href="#" >拼图前端框架</a>构建</div>
        </div>
    </div>
</div>

</body>
</html>