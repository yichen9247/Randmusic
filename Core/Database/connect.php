<?php
/*数据库配置*/
$host = "localhost";
$username = "";
$password = "";
$dbname = "";
// 创建数据库连接
@$db = new mysqli($host, $username, $password, $dbname);
// 检测数据库连接
if ($db->connect_error) {
	die("<!DOCTYPE html><html><head><meta charset=\"utf-8\" name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\"><title>建立数据库连接时出错</title></head><style type=\"text/css\">html {background: #f1f1f1;} body {background: #fff;border: 1px solid #ccd0d4;color: #444;font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Oxygen-Sans, Ubuntu, Cantarell, \"Helvetica Neue\", sans-serif;margin: 2em auto;padding: 1em 2em;max-width: 700px;-webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .04);box-shadow: 0 1px 1px rgba(0, 0, 0, .04);} h1 {border-bottom: 1px solid #dadada;clear: both;color: #666;font-size: 24px;margin: 30px 0 0 0;padding: 0;padding-bottom: 7px;} #error-page{margin-top: 50px;} #error-page p, #error-page .die-message{font-size: 14px;line-height: 1.5;margin: 25px 0 20px;} #error-page code{font-family: Consolas, Monaco, monospace;}</style><body id=\"error-page\"><div class=\"die-message\"><h1>建立数据库连接时出错</h1></div></body></html>");
}else{
	$db->query("set names utf8"); 
}
?>