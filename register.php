<?php
	//开启session
	session_start();
	//定义常量，授权调用includes文件
	define('IN_TG',true);
	require_once dirname(__FILE__).'/includes/common.inc.php';
	//调用样式定义
	define('SCRIPT','register');

	$post_data = array();
	//判断是否提交了数据
	$post_data["submit"] = isset($_POST['submit'])?$_POST['submit']:'';
	//对前端传值进行赋值
	if($post_data["submit"]){//正常表单提交
		//调用表单验证函数库
		include_once ROOT_PATH.'includes/register.func.php';
		//用户名
		$post_data["uname"] = isset($_POST['uname'])?$_POST['uname']:'';
		$post_data["uname"] = _check_username($post_data["uname"]);
		//密码
		$post_data["pwd"] = isset($_POST['pwd'])?$_POST['pwd']:'';
		$post_data["pwds"] = isset($_POST['pwds'])?$_POST['pwds']:'';
		$post_data["pwd"] = _check_pwd($post_data["pwd"],$post_data["pwds"]);

		//密码提示
		$post_data["pwdt"] = isset($_POST['pwdt'])?$_POST['pwdt']:''; //密码提示
		$post_data["pwdt"] = _check_pwdt($post_data["pwdt"]);

		//提示回答
		$post_data["pwdh"] = isset($_POST['pwdh'])?$_POST['pwdh']:'';
		$post_data["pwdh"] = _check_pwdh($post_data["pwdh"]);


		$post_data["sex"] = isset($_POST['sex'])?$_POST['sex']:'';
		$post_data["head_img"] = isset($_POST['head_img'])?$_POST['head_img']:'';
		//email
		$post_data["email"] = isset($_POST['email'])?$_POST['email']:'';
		$post_data["email"] = _check_email($post_data["email"]);

		$post_data["qq"] = isset($_POST['qq'])?$_POST['qq']:'';
		$post_data["url"] = isset($_POST['url'])?$_POST['url']:'';
		$post_data["yzm"] = isset($_POST['yzm'])?$_POST['yzm']:'';
	}
	var_dump($post_data);
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
		<form method='post' action='register.php'>
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
					<img src="/face/2.png" title='头像选择' id='face_img'>
					<input type='hidden' name='head_img' id='head_img' value='/face/2.png'>
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