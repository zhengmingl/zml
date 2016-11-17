<?php
//设置响应头
header('content-type:text/html;charset=utf-8');
//设置项目目录，末尾一定要加斜杠
define('APP_PATH','./Application/');
//开启Debug调试
define('APP_DEBUG',true);
//载入ThinkPHP.php初始化文件
include './ThinkPHP/ThinkPHP.php';