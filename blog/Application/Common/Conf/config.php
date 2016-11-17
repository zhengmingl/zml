<?php
return array(
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'blog',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'hxqc123456',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'bk_',    // 数据库表前缀
    //session设置
    //'SESSION_TYPE'          =>  'Memcache',
    //'MEMCACHE_HOST'         =>'192.168.24.99',  //添加Mecache主机
    //'MEMCACHE_HOST'         =>'127.0.0.1',  //添加Mecache主机
    // 'MEMCACHE_PORT'          =>11211,        //添加Memcache端口

    //数据缓存设置
    //'DATA_CACHE_TYPE'        =>'Memcache',

    'URL_CASE_INSENSITIVE'  =>  true,   // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'             =>  1,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
    'MODULE_ALLOW_LIST'=>array('Home','Admin'),
    'DEFAULT_MODULE'=>'Home',
    'DEFAULT_CONTROLLER'=>'Index',
    'DEFAULT_ACTION'=>'index',
    'TMPL_PARSE_STRING'=>array(
        '__ADMIN__'=>'/Public/Admin'
    ),

    /*使用SHOW_PAGE_TRACE实现代码追踪*/
    'SHOW_PAGE_TRACE'=>true,
);