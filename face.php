<?php
	//定义常量，授权调用includes文件
	define('IN_TG',true);
	require_once dirname(__FILE__).'/includes/common.inc.php';
	//调用样式定义
	define('SCRIPT','face');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>头像选择</title>
<?php my_incfile('title');?>
<script type="text/javascript" src='js/opener.js'></script>
</head>
<body>
	<div id='face'>
		<h3>头像选择</h3>
		<dl>
			<?php 
				for($i = 0;$i<5;$i++){
					?>
					<dd>
						<img src="face/<?php echo $i?>.png" alt='头像<?php echo $i?>'>
					</dd>
					<?php
				}
			?>
			
		</dl>
	</div>
</body>
</html>