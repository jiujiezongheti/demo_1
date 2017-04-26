<?php
session_start();
//定义常量，授权调用includes文件
define('IN_TG',true);
require_once dirname(__FILE__).'/includes/common.inc.php';
//调用样式定义
define('SCRIPT','message');
//判断是否登录
if(!isset($_COOKIE['uname'])){
	_alert_close('请先登录');
}
$action = isset($_GET['action'])?$_GET['action']:'';
//写短信
if($action == 'write'){
	//验证码
	$_code = isset($_POST['yzm'])?$_POST['yzm']:'';
	_check_code($_code,$_SESSION['code']);
	if(!!$_rows = _fetch_array("select uniqid from tg_user where uname='{$_COOKIE['uname']}' limit 1")){
		//防止cookie伪造
		_uniqid($_rows['uniqid'],$_COOKIE['uniqid']);
		include_once ROOT_PATH.'includes/check.func.php';
		$_clean = array();
		$_clean['touser'] = isset($_POST['touser'])?$_POST['touser']:'';
		$_clean['fromuser'] = $_COOKIE['uname'];
		$_clean['content'] = _check_content(isset($_POST['content'])?$_POST['content']:'');
		$_clean = _mysql_string($_clean);
		$_time = time();

		//写入数据库
		_query("insert into message (touser,fromuser,content,send_time) values ('{$_clean['touser']}','{$_clean['fromuser']}','{$_clean['content']}','{$_time}')");
		//新增成功
		if(_affected_rows()==1){
			mysql_close();
			_session_destroy();
			_alert_close("短信发送成功");
		}else{
			mysql_close();
			_session_destroy();
			_alert_back("短信发送失败");
		}
	}else{
		_alert_close('非法操作');
	}
	exit();
}
if(isset($_GET['id'])){
	$_rows = _fetch_array("select uname from tg_user where id='{$_GET['id']}' limit 1");
	if($_rows){
		$_rows = _html($_rows);
	}else{
		_alert_close('不存在此用户');
	}
}else{
	_alert_close('非法操作');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>写短信</title>
<?php my_incfile('title');?>
<script src='js/code.js'></script>
<script src='js/message.js'></script>
</head>
<body>
	<div id="message">
		<h3>写短信</h3>
		<form action="?action=write" method='post'>
			<input type="hidden" value="<?php echo $_rows['uname']?>" name='touser'>
			<dl>
				<dd><input type="text" class='text' value="To:<?php echo $_rows['uname']?>"></dd>
				<dd>
					<textarea name="content" cols="30" rows="10"></textarea>
				</dd>
				<dd>验 证 码:
					<input type='text' class='text yzm' name='yzm'>
					<img src="code.php" id='code'>
					<input type='submit' class='submit' name='submit' value='发送短信'>
				</dd>
				
			</dl>
		</form>
	</div>
</body>
</html>