<?php
session_start();
//定义常量，授权调用includes文件
define('IN_TG',true);
require_once dirname(__FILE__).'/includes/common.inc.php';
//调用样式定义
define('SCRIPT','friend');
//判断是否登录
if(!isset($_COOKIE['uname'])){
	_alert_close('请先登录');
}
$action = isset($_GET['action'])?$_GET['action']:'';
//添加好友
if($action=='add'){
	$_code = isset($_POST['yzm'])?$_POST['yzm']:'';
	_check_code($_code,$_SESSION['code']);
	if(!!$_rows = _fetch_array("select uniqid from tg_user where uname='{$_COOKIE['uname']}' limit 1")){
		//防止cookie伪造
		_uniqid($_rows['uniqid'],$_COOKIE['uniqid']);
	}
	include_once ROOT_PATH.'includes/check.func.php';
	$_clean = array();
	$_clean['touser'] = isset($_POST['touser'])?$_POST['touser']:'';
	$_clean['fromuser'] = $_COOKIE['uname'];
	$_clean['content'] = _check_content(isset($_POST['content'])?$_POST['content']:'');
	$_clean = _mysql_string($_clean);
	$_time = time();
	if($_clean['touser']==$_clean['fromuser']){
		_alert_close("不能添加自己为好友");
	}
	//数据库好友是否已经添加
	if(!!$_rows=_fetch_array("SELECT id FROM friend WHERE (touser='{$_clean['touser']}' AND fromuser='{$_clean['fromuser']}') OR (touser='{$_clean['fromuser']}' AND fromuser='{$_clean['touser']}') LIMIT 1")){
		_alert_close('你们已经是好友');
	}else{
	//添加好友信息
		
		_query("INSERT INTO friend (touser,fromuser,content,time) VALUES ('{$_clean['touser']}','{$_clean['fromuser']}','{$_clean['content']}','{$_time}')");
		if(_affected_rows()==1){
			mysql_close();
			_session_destroy();
			_alert_close('好友添加成功，等待验证');
		}else{
			mysql_close();
			_session_destroy();
			_alert_close('好友添加失败');
		}
	}
	
}
//获取数据
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
<title>添加好友</title>
<?php my_incfile('title');?>
<script src='js/code.js'></script>
<script src='js/message.js'></script>
</head>
<body>
	<div id="message">
		<h3>添加好友</h3>
		<form action="?action=add" method='post'>
			<input type="hidden" value="<?php echo $_rows['uname']?>" name='touser'>
			<dl>
				<dd><input readonly="readonly" type="text" class='text' value="To:<?php echo $_rows['uname']?>"></dd>
				<dd>
					<textarea name="content" cols="30" rows="10">我想和你交朋友！</textarea>
				</dd>
				<dd>验 证 码:
					<input type='text' class='text yzm' name='yzm'>
					<img src="code.php" id='code'>
					<input type='submit' class='submit' name='submit' value='添加好友'>
				</dd>
				
			</dl>
		</form>
	</div>
</body>
</html>