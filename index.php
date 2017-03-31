<?php
	//定义常量，授权调用includes文件
	define('IN_TG',true);
	require_once dirname(__FILE__).'/includes/common.inc.php';
	//调用样式定义
	define('SCRIPT','index');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>title</title>
<?php my_incfile('title');?>
</head>
<body>
	<?php my_incfile('header');?>
	<div id='list'>
		<h2>帖子列表</h2>
	</div>
	<div id='user'>
		<h2>新进会员</h2>
	</div>
	<div id='pics'>
		<h2>最新图片</h2>
	</div>
	<?php my_incfile('footer');?>
</body>
</html>