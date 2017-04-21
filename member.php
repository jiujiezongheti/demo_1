<?php
//定义常量，授权调用includes文件
define('IN_TG',true);
require_once dirname(__FILE__).'/includes/common.inc.php';
//调用样式定义
define('SCRIPT','member');
//是否正常登陆
if(isset($_COOKIE['uname'])){
	//获取数据
	$_rows = _fetch_array("select * from tg_user where uname='".$_COOKIE['uname']."'");
	if($_rows){
		$_rows = _html($_rows);
	}else{
		_alert_back('此用户不存在');
	}
}else{
	_alert_back('请先登陆');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>个人中心</title>
<?php my_incfile('title');?>
</head>
<body>
	<?php my_incfile('header');?>
	<div id="member">
		<?php my_incfile('member');?>
		<div id="member_main">
			<h2>会员管理中心</h2>
			<dl>
				<dd>用户名:<?php echo $_rows['uname']?></dd>
				<dd>性别:<?php echo $_rows['sex']?></dd>
				<dd>头像:<?php echo $_rows['head_img']?></dd>
				<dd>电子邮件:<?php echo $_rows['email']?></dd>
				<dd>主页:<?php echo $_rows['url']?></dd>
				<dd>QQ:<?php echo $_rows['qq']?></dd>
				<dd>注册时间:<?php echo date('Y-m-d H:i:s',$_rows['reg_time'])?></dd>
				<dd>身份:</dd>
			</dl>
		</div>
	</div>
	<?php my_incfile('footer');?>
</body>
</html>