<?php
	//防止恶意调用
	if(!defined('IN_TG')){
		exit('Access Defined!');
	}
	//检查函数是否存在
	if(!function_exists('_alert_back')){
		exit('_alert_back is not exists!');
	}

	if(!function_exists('_mysql_string')){
		exit('_mysql_string is not exists!');
	}

	/**
	 * [_check_username 用户名验证函数]
	 * @param  string  $_string  用户输入的用户名
	 * @param  int $_min_num 用户名最小长度
	 * @param  int $_max_num 用户名最大长度
	 * @return string            过滤成功的用户名
	 */
	function _check_username($_string,$_min_num=2,$_max_num=20){
		
		//去掉两边的空格
		$_string = trim($_string);

		//判断长度
		if(mb_strlen($_string,'utf-8')<$_min_num||mb_strlen($_string,'utf-8')>$_max_num){
			_alert_back('用户名长度不得小于'.$_min_num.'位或者大于'.$_max_num.'位');	
		}

		//限制敏感字符
		$_char_pattern = '/[<\'\"\ \	>]/';
		if(preg_match($_char_pattern, $_string)){
			_alert_back('用户名不得包含敏感字符');
		}

		//限制敏感用户名
		$_mg[0] = 'xiaofan';
		$_mg[1] = 'xiaofan1';
		$_mg[2] = 'xiaofan2';
		if(in_array($_string, $_mg)){
			_alert_back('敏感用户名');
		}

		//防止sql注入
		return _mysql_string($_string);
	}

/**
 * [_check_pwd 密码验证函数]
 * @param  string  $_string  第一次输入密码
 * @param  string  $_strings 第二次输入的密码
 * @param  int $_min_num 密码最短长度
 * @return string            sha1加密后的密码
 */
	function _check_pwd($_string,$_strings,$_min_num=6){
		//验证密码长度
		if(strlen($_string)<$_min_num){
			_alert_back('密码长度不得小于'.$_min_num.'位');	
		}

		//验证2次输入密码一致性
		if($_string!=$_strings){
			_alert_back('2次输入密码不一致');	
		}

		//输出密码
		return _mysql_string(sha1($_string));
	}


/**
 * [_check_pwdt 验证密码提示]
 * @param  string  $_string  密码提示
 * @param  int $_min_num 允许最小长度
 * @param  int $_max_num 允许最大长度
 * @return string            经过处理后的密码提示
 */
	function _check_pwdt($_string,$_min_num=4,$_max_num=20){
		//去掉两边的空格
		$_string = trim($_string);

		//判断长度
		if(mb_strlen($_string,'utf-8')<$_min_num||mb_strlen($_string,'utf-8')>$_max_num){
			_alert_back('密码提示长度不得小于'.$_min_num.'位或者大于'.$_max_num.'位');	
		}

		//返回密码提示，防数据库注入
		return _mysql_string($_string);
	}


/**
 * [_check_pwdh 验证密码提示问题回答]
 * @param  string  $pwdh     提示问题回答
 * @param  string  $pwdt     提示问题
 * @param  int $_min_num 回答最小长度
 * @param  int $_max_num 回答最大长度
 * @return string            提示问题回答，经过sha1加密处理
 */
	function _check_pwdh($pwdh,$pwdt,$_min_num=2,$_max_num=20){
		//去掉两边的空格
		$pwdh = trim($pwdh);

		//判断长度
		if(mb_strlen($pwdh,'utf-8')<$_min_num||mb_strlen($pwdh,'utf-8')>$_max_num){
			_alert_back('密码提示长度不得小于'.$_min_num.'位或者大于'.$_max_num.'位');	
		}

		//密码提示和回答一致性
		if($pwdh==$pwdt){
			_alert_back('密码提示和回答不能相同');
		}
		return _mysql_string(sha1($pwdh));
	}


	//email
	/**
	 * [_check_email 检测邮箱格式]
	 * @param  string $string 用户输入的邮箱
	 * @return string         验证后的邮箱
	 */
	function _check_email($string){
		$string = trim($string);
		
		if(!preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/', $string)){
			_alert_back('邮件格式不正确');
		}

		return _mysql_string($string);
	}

	/**
	 * [_check_qq 检查qq函数]
	 * @param  string $string 传入用户输入的qq
	 * @return string         检测后的qq
	 */
	function _check_qq($string){
		if(empty($string)){
			return null;
		}else{
			if(!preg_match('/^[1-9]{1}[0-9]{4,9}$/', $string)){
				_alert_back('qq格式不正确');
			}
		}
		return _mysql_string($string); 
	}

	/**
	 * [_check_url 检查填写的url]
	 * @param  string $string 用户输入的url地址
	 * @return string         检查后的url地址
	 */
	function _check_url($string){
		if(empty($string)||($string=='http://')){
			return null;
		}else{
			if(!preg_match('/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/', $string)){
				_alert_back('url格式不正确');
			}
		}
		return _mysql_string($string);
	}

/**
 * [_check_uniqid 检验网站是否合法访问]
 * @param  string $first_uniqid [description]
 * @param  string $end_uniqid   [description]
 * @return string               [description]
 */
	function _check_uniqid($first_uniqid,$end_uniqid){
		if((strlen($first_uniqid)!=40)||$first_uniqid!=$end_uniqid){
			_alert_back('网站访问不合法');
		}
		return _mysql_string($first_uniqid);
	}

/**
 * [_check_head_img 转义头像]
 * @param  string $string 头像路径
 * @return string         转义头像路径
 */
	function _check_head_img($string){
		return _mysql_string(trim($string));
	}
?>