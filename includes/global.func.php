<?php
   /**
	* _runtime()用来获取执行耗时的
	* @access public 表示对外公开
	* @return float 表示返回为浮点型数字
	*/
	function _runtime(){
		$_mtime = explode(' ',microtime());
		return $_mtime[0]+$_mtime[1];
	}

	/**
	 * [_alert_back 表示js弹窗提示信息]
	 * @param  string $_info 提示信息
	 * @return void        弹窗
	 */
	function _alert_back($_info){
		echo "<script type='text/javascript'>alert('".$_info."');history.back();</script>";
		exit();
	}

/**
 * [_mysql_string 判断是否转义字符]
 * @param  string $_string 是否需要转义的字符
 * @return string          处理后的
 */
	function _mysql_string($_string){
		if(!GPC){
			$_string = addslashes($_string);
		}
		return $_string;
	}


	/**
	 * my_incfile()用来获取includes文件中的inc文件
	 * @ $file char 不加‘.inc.php’的inc文件名
	 * @return char includes文件硬路径
	 */
	function my_incfile($file){
		return require_once ROOT_PATH.'includes/'.$file.'.inc.php';
	}

	/**
	 * _code()创建验证码函数
	 * int $num_code 默认4，验证码个数
 	 * int $_width 默认75，验证码宽度
 	 * int $_height 默认25，验证码高度
 	 * int $font 默认5，验证码字体大小
 	 * int $_num_line 默认6，验证码干扰线条数量
 	 * @return 空
	 */
	function _code($num_code = 4,$_width = 75,$_height = 25,$font = 5,$_num_line = 6){
		//创建随机码
		$_nmsg='';
		for ($i=0; $i < $num_code; $i++) { 
			$_nmsg .= dechex(mt_rand(0,15));
		}
		//保存在session中
		$_SESSION['code'] = $_nmsg;

		//创建一张真彩图
		$_img = imagecreatetruecolor($_width, $_height);

		//白色
		$_white = imagecolorallocate($_img, 255, 255, 255);

		//填充
		imagefill($_img, 0, 0, $_white);

		//随机画线条
		for($i = 0;$i<$_num_line;$i++){
			$_rnd_color = imagecolorallocate($_img, mt_rand(100,220), mt_rand(100,220), mt_rand(100,220));
			imageline($_img, mt_rand(0,$_width), mt_rand(0,$_height), mt_rand(0,$_width), mt_rand(0,$_height),$_rnd_color);
		}
		//随机雪花
		for ($i=0; $i <200 ; $i++) { 
			$_rnd_color = imagecolorallocate($_img, mt_rand(200,255), mt_rand(200,255), mt_rand(200,255));
			imagestring($_img, 1, mt_rand(1,$_width), mt_rand(1,$_height), ".", $_rnd_color);
		}

		//输出验证码
		for ($i=0; $i < strlen($_SESSION['code']); $i++) { 
			$_rnd_color = imagecolorallocate($_img, mt_rand(0,100), mt_rand(0,150), mt_rand(0,200));
			imagestring($_img, $font, $i*$_width/$num_code+mt_rand(1,10), mt_rand(1,$_height/2), $_SESSION['code'][$i], $_rnd_color);
		}


		//输出图像
		header('Content-Type:image/png');
		imagepng($_img);

		//销毁图片
		imagedestroy($_img);
	}


	/**
 * [_check_yzm 检查验证码]
 * @param  string $first_code 用户输入的验证码
 * @param  string $end_code 系统生成验证码
 * @return string          验证码
 */
	function _check_code($first_code,$end_code){
		if($first_code == $end_code){
			return $first_code;
		}else{
			_alert_back('验证码不正确');
		}
	}

/**
 * [_sha1_uniqid 生成唯一标识符]
 * @return string 生成转义后的唯一标识符
 */
function _sha1_uniqid(){
	return _mysql_string(sha1(uniqid(rand(),true)));
}


function _location($_info,$_url){
	echo "<script type='text/javascript'>alert('".$_info."');location.href='".$_url."';</script>";
	exit();
}
?>