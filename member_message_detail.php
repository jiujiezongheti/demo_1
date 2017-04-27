<?php
//定义常量，授权调用includes文件
define('IN_TG',true);
require_once dirname(__FILE__).'/includes/common.inc.php';
//调用样式定义
define('SCRIPT','member_message_detail');
//判断是否登录
if(!isset($_COOKIE['uname'])){
	_alert_close('请先登录');
}
//删除短信
$action = isset($_GET['action'])?$_GET['action']:'';
$id = isset($_GET['id'])?$_GET['id']:'';
if($action=='delete'){
	if(!!$_rows = _fetch_array("select uniqid from tg_user where uname='{$_COOKIE['uname']}' limit 1")){
			//防止cookie伪造
		_uniqid($_rows['uniqid'],$_COOKIE['uniqid']);
		//删除单条短信
		_query("delete from message where id='{$id}' limit 1");
		if(_affected_rows()==1){
			mysql_close();
			_location('删除成功','member_message.php');
		}else{
			mysql_close();
			_location('删除失败','register.php');
		}
	}
}
if(isset($_GET['id'])){
	$_result = _fetch_array("select id,fromuser,content,send_time from message where id='{$_GET['id']}' limit 1");
	if($_result){
		$_rows = _html($_result);
	}else{
		_alert_back('此短信不存在');
	}
}else{
	_alert_back('非法登录');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>短信查阅</title>
<?php my_incfile('title');?>
<script src='js/member_message_detail.js'></script>
</head>
<body>
	<?php my_incfile('header');?>
	<div id="member">
		<?php my_incfile('member');?>
		<div id="member_main">
			<h2>短信详情</h2>
			<dl>
				<dd>发信人:<?php echo $_rows['fromuser']?></dd>
				<dd>内容:
					<strong>
						<?php echo $_rows['content']?>
					</strong>
				</dd>
				<dd>发信时间:<?php echo date('Y-m-d H:i:s',$_rows['send_time'])?></dd>
				<dd class="button">
					<input type="button" value="返回列表" id="return">
					<input type="button" value="删除短信" id="delete" name="<?php echo $_rows['id']?>">
				</dd>
			</dl>
		</div>
	</div>
	<?php my_incfile('footer');?>
</body>
</html>