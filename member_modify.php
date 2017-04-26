<?php
session_start();
//定义常量，授权调用includes文件
define('IN_TG',true);
require_once dirname(__FILE__).'/includes/common.inc.php';
//调用样式定义
define('SCRIPT','member_modify');
//修改资料
$action = isset($_GET['action'])?$_GET['action']:'';
$post_data = array();
$post_data["submit"] = isset($_POST['submit'])?$_POST['submit']:'';
if($action == 'modify'){
	if($post_data["submit"]){
		//验证码
		$post_data["code"] = isset($_POST['yzm'])?$_POST['yzm']:'';
		$post_data["code"] = _check_code($post_data["code"],$_SESSION['code']);
		if(!!$_rows = _fetch_array("select uniqid from tg_user where uname='{$_COOKIE['uname']}' limit 1")){
			//防止cookie伪造
			_uniqid($_rows['uniqid'],$_COOKIE['uniqid']);
			include_once ROOT_PATH.'includes/check.func.php';
			$post_data["sex"] = isset($_POST['sex'])?$_POST['sex']:'';
			//head_img
			$post_data["head_img"] = isset($_POST['head_img'])?$_POST['head_img']:'';
			$post_data["head_img"] = _check_head_img($post_data["head_img"]);
			//email
			$post_data["email"] = isset($_POST['email'])?$_POST['email']:'';
			$post_data["email"] = _check_email($post_data["email"]);
			//qq
			$post_data["qq"] = isset($_POST['qq'])?$_POST['qq']:'';
			$post_data["qq"] = _check_qq($post_data["qq"]);
			//url
			$post_data["url"] = isset($_POST['url'])?$_POST['url']:'';
			$post_data["url"] = _check_url($post_data["url"]);
			//修改资料
			_query("update tg_user set sex='{$post_data['sex']}',head_img='{$post_data['head_img']}',email='{$post_data['email']}',qq='{$post_data['qq']}',url='{$post_data['url']}' where uname='{$_COOKIE['uname']}'");
			//判断是否修改成功
			if(_affected_rows()==1){
				mysql_close();
				_location('恭喜你修改成功','member.php');
			}else{
				mysql_close();
				_location('没有任何数据被修改','member_modify.php');
			}
		}
	}
}
//是否正常登陆
if(isset($_COOKIE['uname'])){
	//获取数据
	$_rows = _fetch_array("select * from tg_user where uname='".$_COOKIE['uname']."'");
	if($_rows){
		$_rows = _html($_rows);
		if($_rows['sex']=='男'){
			$_rows['sex_html'] = '<input type="radio" name="sex" value="男" checked="checked"> 男 <input type="radio" name="sex" value="女"> 女';
		}elseif($_rows['sex']=='女'){
			$_rows['sex_html'] = '<input type="radio" name="sex" value="男"> 男 <input type="radio" name="sex" value="女" checked="checked"> 女';
		}

		//头像选择
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
<script src='js/code.js'></script>
<script src='js/member_modify.js'></script>
</head>
<body>
	<?php my_incfile('header');?>
	<div id="member">
		<?php my_incfile('member');?>
		<div id="member_main">
			<h2>会员管理中心</h2>
			<form name='modify' method='post' action="member_modify.php?action=modify">
			<dl>
				<dd>用户名:<?php echo $_rows['uname']?></dd>
				<dd>性别:<?php echo $_rows['sex_html']?></dd>
				<dd class='face' >头像:
					<img src="<?php echo $_rows['head_img']?>" title='头像选择' id='face_img'>
					<input type='hidden' name='head_img' id='head_img' value="<?php echo $_rows['head_img']?>">
				</dd>
				<dd>电子邮件:<input class='text' type="text" value="<?php echo $_rows['email']?>" name='email'></dd>
				<dd>主页:<input class='text' type="text" value="<?php echo $_rows['url']?>" name='url'></dd>
				<dd>QQ:<input class='text' type="text" value="<?php echo $_rows['qq']?>" name='qq'></dd>
				<dd>验 证 码:
					<input type='text' class='text yzm' name='yzm'>
					<img src="code.php" id='code'>
				</dd>
				<dd><input type='submit' class='submit' name='submit' value='修改资料'></dd>
			</dl>
			</form>
		</div>
	</div>
	<?php my_incfile('footer');?>
</body>
</html>