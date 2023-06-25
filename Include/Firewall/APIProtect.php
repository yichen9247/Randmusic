<?php

// 开始SESSION会话
session_start();
// 获取当前的时间戳
$timestamps = time();

// debug
// $_SESSION['api_locktime'] = 0;

$api_nowtime = $timestamps;
if (isset($_SESSION['api_lasttime'])) {
	$api_lasttime = $_SESSION['api_lasttime'];
	$api_times = $_SESSION['api_times'] + 1;
	$_SESSION['api_times'] = $api_times;
} else {
	$api_lasttime = $api_nowtime;
	$api_times = 1;
	$_SESSION['api_times'] = $api_times;
	$_SESSION['api_lasttime'] = $api_lasttime;
}

// 判断是否处于封禁时间
if ($_SESSION['api_locktime'] >= $timestamps) {
	header('HTTP/1.0 444');
	exit;
}

// 判断时间间隔
if (($api_nowtime - $api_lasttime) < 30) {
	// 判断访问次数
	if ($api_times >= 5) {
		// 达到访问限制，进行封锁，‘+‘后面为封禁时间，单位是秒
		$_SESSION['api_locktime'] = $timestamps + 60;
		header('HTTP/1.0 444');
		exit;
	}
} else {
	$api_times = 0;
	$_SESSION['api_lasttime'] = $api_nowtime;
	$_SESSION['api_times'] = $api_times;
}

?>