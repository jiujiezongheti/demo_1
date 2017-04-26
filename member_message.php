<?php
//定义常量，授权调用includes文件
define('IN_TG',true);
require_once dirname(__FILE__).'/includes/common.inc.php';
//调用样式定义
define('SCRIPT','member_message');

?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>短信查阅</title>
<?php my_incfile('title');?>
</head>
<body>
	<?php my_incfile('header');?>
	<div id="member">
		<?php my_incfile('member');?>
		<div id="member_main">
			<h2>短信查阅</h2>
		</div>
	</div>
	<?php my_incfile('footer');?>
</body>
</html>