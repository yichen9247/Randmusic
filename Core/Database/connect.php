<?php
/*数据库信息配置*/
$host = "localhost";
$username = ""; //数据库账号
$password = ""; //数据库密码
$dbname = ""; //数据库名称
// 创建数据库连接
@$db = new mysqli($host, $username, $password, $dbname);
// 检测数据库连接
if ($db->connect_error) {
	die("数据库连接失败: ".$db->connect_error);
}else{
	$db->query("set names utf8"); 
}
?>
