<?php
header('Content-type:text/html;charset=utf-8');
// 载入目录配置文件
require_once __DIR__.'/config.inc.php';

// 载入网站配置文件
require __CORE_DIR__.'/Config/config.php';

// 载入公共函数文件
require_once __INCLUDE_DIR__.'/Functions.php';

if(file_exists(__CORE_DIR__.'/install.lock')){
	if(file_exists(__CORE_DIR__.'/Database/connect.php')){
		// 连接数据库
		require_once __CORE_DIR__.'/Database/connect.php';
		
	}
}
?>