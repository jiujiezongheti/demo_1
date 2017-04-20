<?php
session_start();
//定义常量，授权调用includes文件
define('IN_TG',true);
require_once dirname(__FILE__).'/includes/common.inc.php';
//调用样式定义
define('SCRIPT','login');

//接收登录数据
$post_data = array();
//判断是否提交了数据
$post_data["submit"] = isset($_POST['submit'])?$_POST['submit']:'';

//对前端传值进行赋值
if($post_data["submit"]){//正常表单提交
	//调用表单验证函数库
	include_once ROOT_PATH.'includes/login.func.php';
	
	$post_data["code"] = isset($_POST['yzm'])?$_POST['yzm']:'';
	$post_data["code"] = _check_code($post_data["code"],$_SESSION['code']);
	
	//用户名
	$post_data["uname"] = isset($_POST['uname'])?$_POST['uname']:'';
	$post_data["uname"] = _check_username($post_data["uname"]);
	//密码
	$post_data["pwd"] = isset($_POST['pwd'])?$_POST['pwd']:'';
	$post_data["pwd"] = _check_pwd($post_data["pwd"]);
	
	//保留时间
	$post_data["time"] = isset($_POST['time'])?$_POST['time']:'';
	$post_data["time"] = _check_time($post_data["time"]);
	//var_dump($post_data);


	//数据库验证
	if(!!$_rows = _fetch_array("select uname,uniqid from tg_user where uname = '".$post_data["uname"]."' and pwd='".$post_data["pwd"]."' and active = '' limit 1")){
		mysql_close();
		_session_destroy();
		//生成cookie
		
		_location(null,'index.php');
	}else{
		mysql_close();
		_session_destroy();
		_location("用户名或密码错误或者账户未激活",'login.php');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>登录</title>
<?php my_incfile('title');?>
<script type="text/javascript" src='js/code.js'></script>
<script type="text/javascript" src='js/login.js'></script>
</head>
<body>
	<?php my_incfile('header');?>
	<div id="login">
		<h2>登录</h2>
		<form method='post' action='login.php'>
			<dl>
				<dt></dt>
				<dd>用户名:
					<input type='text' class='text' name='uname'>
				</dd>
				<dd>密    码:
					<input type='password' class='text' name='pwd'>
				</dd>
				<dd>保    留:
					<input type="radio" name='time' value='0' checked='checked'>不保留
					<input type="radio" name='time' value='1'>保留一天
					<input type="radio" name='time' value='2'>保留一周
					<input type="radio" name='time' value='3'>保留一月
				</dd>
				<dd>验证码:
					<input type='text' class='text yzm' name='yzm'>
					<img src="code.php" id='code'>
				</dd>
				<dd>
					<input type="submit" value="登录" class='submit' name='submit'>
					<a href="register.php"><input type='button' value="注册" class='submit' id='register'></a>
				</dd>
			</dl>
		</form>
	</div>
	<?php my_incfile('footer');?>
</body>
</html>