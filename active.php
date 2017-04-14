<?php
	//开启session
	session_start();
	//定义常量，授权调用includes文件
	define('IN_TG',true);
	require_once dirname(__FILE__).'/includes/common.inc.php';
	//调用样式定义
	define('SCRIPT','active');

	$active = isset($_GET['active'])?$_GET['active']:'';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>激活</title>
<?php my_incfile('title');?>
</head>
<body>
	<?php my_incfile('header');?>
	
	<?php my_incfile('footer');?>
</body>
</html>