<?php
	//开启session
	session_start();
	//定义常量，授权调用includes文件
	define('IN_TG',true);
	require_once dirname(__FILE__).'/includes/common.inc.php';
	//调用样式定义
	define('SCRIPT','active');

	$active = _mysql_string(isset($_GET['active'])?$_GET['active']:'');
	if($active==''){
		exit('非法操作');
	}
	$status = isset($_GET['status'])?$_GET['status']:'';
	//激活处理
	if($status=='ok'&&$active){
		if(_fetch_array("select active from tg_user where `active` = '{$active}' limit 1")){
			//去掉激活验证
			_query("update tg_user set active=NULL where active = '{$active}' limit 1");
			if(_affected_rows()==1){
				mysql_close();
				_location('账户激活成功','login.php');
			}else{
				mysql_close();
				_location('账户激活失败','register.php');
			}
		}else{
			_alert_back("非法操作");
		}
	}
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
	<div id="active">
		<h2>激活账户</h2>
		<p>本页面为模拟用户邮箱激活账户功能</p>
		<p>
			<a href="active.php?status=ok&active=<?php echo $active?>">
				<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']?>?status=ok&active=<?php echo $active?>
			</a>
		</p>
	</div>
	<?php my_incfile('footer');?>
</body>
</html>