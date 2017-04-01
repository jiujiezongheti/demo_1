<?php
	if(!defined('IN_TG')){
		exit('Access Defined!');
	}

	function _check_username($_string,$_min_num,$_max_num){
		//去掉两边的空格
		$_string = trim($_string);

		//判断长度
		if(mb_strlen($_string,'utf-8')<$_min_num||mb_strlen($_string,'utf-8')>$_max_num){

		}
	}
?>