<?php
/* 开始一个 SESSION 会话 */
session_start();

if(file_exists(__CORE_DIR__.'/install.lock')){
	echo "<script>alert('您已经安装过了，如需重新安装，请将Core目录下的install.lock文件删除！');</script>";
}

/* 通过GET参数获取安装步骤 */
$step = $_SESSION['install_step'];

if($step < 5 || $step > 0){
	/* 连接字符串并构成文件 */
	$file = __TEMPLATE_DIR__.'/Install/step_'.$step.'.html';
}else{
	$file = __TEMPLATE_DIR__.'/Install/start.html';
	$_SESSION['install_step'] = 1;
}

/* 若有该页面，直接包含页面 */
if(file_exists($file)){
	include $file;
}else{
	include __TEMPLATE_DIR__.'/Install/start.html';
	$_SESSION['install_step'] = 1;
}

?>