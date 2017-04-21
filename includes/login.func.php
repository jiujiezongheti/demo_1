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

		//防止sql注入
		return _mysql_string($_string);
	}



/**
 * [_check_pwd 密码验证函数]
 * @param  string  $_string  用户输入密码
 * @param  int $_min_num 密码最短长度
 * @return string            sha1加密后的密码
 */
	function _check_pwd($_string,$_min_num=6){
		//验证密码长度
		if(strlen($_string)<$_min_num){
			_alert_back('密码长度不得小于'.$_min_num.'位');	
		}

		//输出密码
		return _mysql_string(sha1($_string));
	}

	/**
	 * [_check_time 检查用户登录有效时间]
	 * @param  string $_string 用户选择的时间0,1,2,3
	 * @return string          保留时间
	 */
	function _check_time($_string){
		$_time = array('0','1','2','3');
		if(!in_array($_string, $_time)){
			_alert_back('保留方式出错!');
		}
		return _mysql_string($_string);
	}

	/**
	 * [_setcookies 设置cookie]
	 * @param  string $uname  用户名
	 * @param  string $uniqid 唯一标识
	 * @param  string $time 保存时间
	 * @return [type]         
	 */
	function _set_cookies($uname,$uniqid,$time){
		switch($time){
			case '0'://浏览器进程
				setcookie('uname',$uname);
				setcookie('uniqid',$uniqid);
				break;
			case '1'://一天
				setcookie('uname',$uname,time()+86400);
				setcookie('uniqid',$uniqid,time()+86400);
				break;
			case '2'://一周
				setcookie('uname',$uname,time()+604800);
				setcookie('uniqid',$uniqid,time()+604800);
			break;
				case '3'://一月
				setcookie('uname',$uname,time()+2592000);
				setcookie('uniqid',$uniqid,time()+2592000);
				break;
		}
	}
?>