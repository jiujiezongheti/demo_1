<?php
//开启session
session_start();
//定义常量，授权调用includes文件
define('IN_TG',true);
require_once dirname(__FILE__).'/includes/common.inc.php';

//调用样式定义
define('SCRIPT','blog');
global $_pagenum,$_pagesize;
_page();
$_result = _query("select uname,head_img,sex from tg_user order by reg_time desc limit $_pagenum,$_pagesize");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>博友</title>
<?php my_incfile('title');?>
</head>
<body>
	<?php my_incfile('header');?>
	<div id="blog">
		<h2>博友列表</h2>
		<?php while (!!$_rows = _fetch_array_list($_result,MYSQL_ASSOC)){?>
		<dl>
			<dd class='user'><?php echo $_rows['uname'].'('.$_rows['sex'].')';?></dd>
			<dt><img src="<?php echo $_rows['head_img']?>" alt="<?php echo $_rows['uname']?>"></dt>
			<dd>发消息</dd>
			<dd>加好友</dd>
			<dd>写留言</dd>
			<dd>给ta送花</dd>
		</dl>
		<?php }
			_paging(1);
		?>
	</div>
	<?php my_incfile('footer');?>
</body>
</html>