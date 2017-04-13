<?php
//开启session
session_start();
define('IN_TG',true);
require_once dirname(__FILE__).'/includes/common.inc.php';
//调用验证码函数ds
/**_code()参数说明
 * int $num_code 默认4，验证码个数
 * int $_width 默认75，验证码宽度
 * int $_height 默认25，验证码高度
 * int $font 默认5，验证码字体大小
 * int $_num_line 默认6，验证码干扰线条数量
 */

_code();
?>