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
	</div>
	<?php my_incfile('footer');?>
</body>
</html>