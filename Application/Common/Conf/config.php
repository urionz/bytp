<?php
return array(
	//'配置项'=>'配置值'
    'TMPL_FILE_DEPR'=>'_',
    'DB_TYPE'=>'mysql',
    'DB_HOST'=>'localhost',
    'DB_NAME'   => 'alumni', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => 'al_', // 数据库表前缀 
    'DB_CHARSET'=> 'utf8', // 字符集
    'MODULE_ALLOW_LIST'     =>  array('Home'),    // 允许访问的模块列表
    'DEFAULT_MODULE'        =>  'Home',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Login', // 默认控制器名称
    'SHOW_PAGE_TRACE'=>true
);