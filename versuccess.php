<?php

// 载入目录配置文件
require_once __DIR__.'/config.inc.php';

// 载入网站配置文件
require __CORE_DIR__.'/Config/config.php';

// 载入公共函数文件
require_once __INCLUDE_DIR__.'/PHPMailer/PHPMailer.php';
require_once __INCLUDE_DIR__.'/PHPMailer/class.smtp.php';

// 载入接口防护文件
include __INCLUDE_DIR__.'/Firewall/APIProtect.php';

$vercode = md5($_GET['vertoken']);

if ($_COOKIE['vertoken'] != $vercode) {
    die(json_encode(array(
		'code' => 502,
		'msg' => 'ERROR非法请求'
	),320 | JSON_PRETTY_PRINT));
} else
if ($_GET['vertoken'] == "") {
    die(json_encode(array(
		'code' => 500,
		'msg' => 'ERROR非法请求'
	),320 | JSON_PRETTY_PRINT));
} else
if ($_GET['type'] == 1)  {
    unset($_SESSION['cc_times']);
    unset($_SESSION['cc_locktime']);
    unset($_SESSION['cc_lasttime']);
} else {
    die(json_encode(array(
		'code' => 501,
		'msg' => 'ERROR非法请求'
	),320 | JSON_PRETTY_PRINT));
}

?>