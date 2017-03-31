<?php
	//开启session
	session_start();
	//定义常量，授权调用includes文件
	define('IN_TG',true);
	require_once dirname(__FILE__).'/includes/common.inc.php';
	//调用样式定义
	define('SCRIPT','register');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>注册</title>
<?php my_incfile('title');?>
<script type="text/javascript" src='js/face.js'></script>
</head>
<body>
	<?php my_incfile('header');?>
	<div id='register'>
		<h2>会员注册</h2>
		<form method='post' action='post.php'>
			<dl>
				<dt>请认真填写内容</dt>
				<dd>用 户 名:
					<input type='text' class='text' name='uname'>
					(*必填，至少2位)
				</dd>
				<dd>密    码:
					<input type='password' class='text' name='pwd'>
					(*必填，至少6位)
				</dd>
				<dd>确认密码:
					<input type='password' class='text' name='pwds'>
					(*必填，至少6位)
				</dd>
				<dd>密码提示:
					<input type='text' class='text' name='pwdt'>
					(*必填，至少2位)
				</dd>
				<dd>密码回答:
					<input type='text' class='text' name='pwdh'>
					(*必填，至少2位)
				</dd>
				<dd>性    别:
					<input type='radio' name='sex' value='男' checked='checked'>男
					<input type='radio' name='sex' value='女'>女
				</dd>
				<dd class='face' >
					<img src="/face/1.png" alt='头像选择' id='face_img'>
					<input type='hidden' name='head_img' id='head_img'>
				</dd>
				<dd>电子邮件:
					<input type='text' class='text' name='email'>
				</dd>
				<dd>Q  Q  :
					<input type='text' class='text' name='qq'>
				</dd>
				<dd>主页地址:
					<input type='text' class='text' name='url' value='http://'>
				</dd>
				<dd>验 证 码:
					<input type='text' class='text yzm' name='yzm'>
					<img src="code.php" id='code'>
				</dd>
				<dd><input type='submit' class='submit' name='submit' value='注册'></dd>
			</dl>
		</form>
	</div>
	<?php my_incfile('footer');?>
</body>
</html>