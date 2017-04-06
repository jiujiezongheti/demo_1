<?php
//防止恶意调用
if(!defined('IN_TG')){
	exit('Access Defined!');
}

/**
 * [_connect 连接数据库]
 * @return void 
 */
function _connect(){
	//全局变量，将此变量在函数外部访问
	global $_conn;
	if(!$_conn = @mysql_connect(DB_HOST,DB_USER,DB_PWD)){
		exit('数据库连接失败');
	};
}

/**
 * [_select_db 选择数据库]
 * @return void [description]
 */
function _select_db(){
	if(!mysql_select_db(DB_NAME)){
		exit('找不到指定数据库');
	}
}

/**
 * [_set_names 数据库字符集选择]
 */
function _set_names(){
	if(!mysql_query('set names utf8')){
		exit('字符集出错');
	}
}


function _query($_sql){
	if(!$result = mysql_query($_sql)){
		exit('SQL执行失败'.mysql_error());
	};
	return $result;
}


function _fetch_array($_sql){
	return mysql_fetch_array(_query($_sql),MYSQL_ASSOC);
}


function _is_repeat($sql,$_info){
	if(_fetch_array($sql)){
		_alert_back($_info);
	}
}
?>