<?php

session_start();
$timestamp = time();

$cc_nowtime = $timestamp;
if (isset($_SESSION['cc_lasttime'])) {
	$cc_lasttime = $_SESSION['cc_lasttime'];
	$cc_times = $_SESSION['cc_times'] + 1;
	$_SESSION['cc_times'] = $cc_times;
} else {
	$cc_lasttime = $cc_nowtime;
	$cc_times = 1;
	$_SESSION['cc_times'] = $cc_times;
	$_SESSION['cc_lasttime'] = $cc_lasttime;
}

// 判断是否处于封禁时间
if ($_SESSION['cc_locktime'] >= $timestamp) {
	header('HTTP/1.0 444');
	exit;
}

// 判断用户封禁时间间隔
if (($cc_nowtime - $cc_lasttime) < 30) {
	if ($cc_times >= 15) {
		$_SESSION['cc_locktime'] = $timestamp + 60;
		/*header('HTTP/1.0 444');*/
		include 'SafeVerify.php';
		exit;
	}
} else {
	$cc_times = 0;
	$_SESSION['cc_lasttime'] = $cc_nowtime;
	$_SESSION['cc_times'] = $cc_times;
}

?>