<?php
//定义常量，授权调用includes文件
define('IN_TG',true);
require_once dirname(__FILE__).'/includes/common.inc.php';
//调用样式定义
define('SCRIPT','login');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>登录</title>
<?php my_incfile('title');?>
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
					<input type="submit" value="注册" class='submit' id='register'>
				</dd>
			</dl>
		</form>
	</div>
	<?php my_incfile('footer');?>
</body>
</html>