<?php
	if(!defined('IN_TG')){
		exit('you can not use it!');
	}
	mysql_close();
?>
	<div id='footer'>
		<p>版权所有 翻版必究</p>
		<p>本程序练习测试所用</p>
		<p>程序执行耗时：<?php echo round(_runtime() - START_TIME,4);?></p>
	</div>