<?php
	if(!defined('IN_TG')){
		exit('you can not use it!');
	}
	//定义跟目录路径
	define('ROOT_PATH',substr(dirname(__FILE__),0,-8));
	
	//拒绝低版本php
	if(PHP_VERSION<5.5){
		exit('phpversion<5.6');
	}

	//引入核心函数库
	require_once ROOT_PATH.'includes/global.func.php';

	//执行耗时
	define('START_TIME',_runtime());
?>