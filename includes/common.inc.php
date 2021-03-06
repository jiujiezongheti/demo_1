<?php
	header("Content-type: text/html; charset=utf-8");//防止php输出乱码
	if(!defined('IN_TG')){
		exit('you can not use it!');
	}
	//定义跟目录路径
	define('ROOT_PATH',substr(dirname(__FILE__),0,-8));
	
	//创建自动转义状态的常量
	define('GPC',get_magic_quotes_gpc());
	//拒绝低版本php
	if(PHP_VERSION<5.5){
		exit('phpversion<5.5');
	}

	//引入核心函数库
	require_once ROOT_PATH.'includes/global.func.php';
	require_once ROOT_PATH.'includes/mysql.func.php';

	//执行耗时
	define('START_TIME',_runtime());


	//数据库配置文件
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PWD', '');
	define('DB_NAME','demo1');

	//初始化数据库
	_connect();
	_select_db();
	_set_names();

	//短信提醒
	$_message = _fetch_array("SELECT COUNT(id) AS count FROM message WHERE state=0 AND touser='{$_COOKIE['uname']}'");
	if(empty($_message['count'])){
		$_message_html = '<strong>(0)</strong>';
	}else{
		$_message_html = '<strong>('.$_message['count'].')</strong>';
	}
?>