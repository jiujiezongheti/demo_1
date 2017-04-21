<?php
	if(!defined('IN_TG')){
		exit('you can not use it!');
	}

?>
<div id='header'>
	<ul>
		<li><a href="index.php">首页</a></li>
		
		<?php
			if(isset($_COOKIE['uname'])){
				echo '<li><a href="member.php">'.$_COOKIE['uname'].'~个人中心</a></li>';
			}else{
				?>
					<li><a href="register.php">注册</a></li>
					<li><a href="login.php">登录</a></li>
				<?php
			}
		?>
		
		<li><a href="blog.php">博友</a></li>
		<li>风格</li>
		<li>管理</li>
		<?php
			if(isset($_COOKIE['uname'])){
				echo '<li><a href="logout.php">退出</a></li>';
			}		
		?>
		
	</ul>
</div>