<?php

    // 定义ThinkPHP框架路径
    //定义项目名称和路径
	if(file_exists("install.php")){
		Header("Location: /install.php");
	}
    define('APP_NAME', 'App');
    define('APP_PATH', './App/');
    define('APP_DEBUG',true);

    // 加载框架入口文件
    require( "./ThinkPHP/ThinkPHP.php");
    //实例化一个网站应用实例
?>