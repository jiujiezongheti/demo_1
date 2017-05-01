<?php
//定义常量，授权调用includes文件
define('IN_TG',true);
require_once dirname(__FILE__).'/includes/common.inc.php';
//调用样式定义
define('SCRIPT','member_message');
//判断是否登录
if(!isset($_COOKIE['uname'])){
	_alert_close('请先登录');
}
//批量删除短信
$action = isset($_GET['action'])?$_GET['action']:'';
if($action=='delete'&&isset($_POST['ids'])){
	$_clean = array();
	$_clean['ids'] = _mysql_string(implode(',', $_POST['ids']));

	if(!!$_rows = _fetch_array("select uniqid from tg_user where uname='{$_COOKIE['uname']}' limit 1")){
			//防止cookie伪造
		_uniqid($_rows['uniqid'],$_COOKIE['uniqid']);
		//删除单条短信
		_query("delete from message where id in({$_clean['ids']})");
		if(_affected_rows()){
			mysql_close();
			_location('删除成功','member_message.php');
		}else{
			mysql_close();
			_location('删除失败','register.php');
		}
		
	}else{
		_alert_back('非法登录');
	}
}


//分页
global $_pagenum,$_pagesize;
_page(15,"select id from message");
$_result = _query("select id,fromuser,content,send_time from message order by send_time desc limit $_pagenum,$_pagesize");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>短信查阅</title>
<?php my_incfile('title');?>
<script src='js/member_message.js'></script>
</head>
<body>
	<?php my_incfile('header');?>
	<div id="member">
		<?php my_incfile('member');?>
		<div id="member_main">
			<h2>短信查阅</h2>
			<form action="?action=delete" method='post'>
				<table cellspacing='1'>
					<tr><th>发信人</th><th>短信内容</th><th>时间</th><th>操作</th></tr>
					<?php while (!!$_rows = _fetch_array_list($_result,MYSQL_ASSOC)){
						$_rows=_html($_rows);
						?>
						<tr>
							<td><?php echo $_rows['fromuser'];?></td>
							<td><a href="member_message_detail.php?id=<?php echo $_rows['id']?>" title="<?php echo $_rows['content'];?>"><?php echo _substr($_rows['content']);?></a></td>
							<td><?php echo date('Y-m-d H:i:s',$_rows['send_time']);?></td>
							<td>
								<input type="checkbox" name='ids[]' value="<?php echo $_rows['id']?>">
							</td>
						</tr>
					<?php }
						_free_result($_result);
					?>
					<tr>
						<td colspan="4">
							<span for='all'>
								选择全部
								<input type="checkbox" name='chkall' id='all'>
							</span>
							<input type="submit" value='批删除'>
						</td>
					</tr>
				</table>
			</form>
			<?php 
				_paging(1);
			?>
		</div>
	</div>
	<?php my_incfile('footer');?>
</body>
</html>