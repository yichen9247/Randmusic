<?php
namespace PHPMailer;

// 载入目录配置文件
require_once __DIR__.'/config.inc.php';

// 载入网站配置文件
require __CORE_DIR__.'/Config/config.php';

// 载入公共函数文件
require_once __INCLUDE_DIR__.'/PHPMailer/PHPMailer.php';
require_once __INCLUDE_DIR__.'/PHPMailer/class.smtp.php';

// 载入接口防护文件
include __INCLUDE_DIR__.'/Firewall/APIProtect.php';

$mid = $_GET['mid'];
$GetUserIP = $_SERVER["REMOTE_ADDR"];

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 1;
$mail->CharSet = 'UTF-8';
$mail->SMTPAuth = true;
$mail->Host = $website_mail['mail_host'];
$mail->Port = $website_mail['mail_port'];
$mail->isHTML($website_mail['mail_isHTML']);
$mail->From = $website_mail['mail_fromuser'];
$mail->FromName = '随机网易云';
$mail->addAddress($website_mail['mail_adminmai']);
$mail->SMTPSecure = $website_mail['mail_secure'];
$mail->Username = $website_mail['mail_username'];
$mail->Password = $website_mail['mail_password'];

if ($_GET['type'] == "" || $_GET['song'] == ""|| $_GET['mid'] == "") {
    echo 'ERROR非法请求！';
} else
if ($_GET['type'] == 1) {
    $song = $_GET['song'];
    $mail->Subject = '【随机网易云】反馈通知 IP：'.$GetUserIP;
    $mail->Body = '某热心网友反馈了音乐，该音乐可能有问题<br/><center><hr/>失效的ID ：['.$song.']'.$mid.'<hr/></center><br/>PS：请仔细核实该ID，若该ID确实已经失效，还请站长删除该ID以提升体验！<br/><br/>温馨提示：请将此邮箱加入到邮箱白名单，以免被当作成广告邮件！';
} else 
if ($_GET['type'] == 2) {
    $mail->Subject = '【随机网易云】反馈通知 IP：'.$GetUserIP;
    $mail->Body = '某热心网友反馈了歌单，该歌单可能有问题<br/><center><hr/>失效的ID ：'.$mid.'<hr/></center><br/>PS：请仔细核实该ID，若该ID确实已经失效，还请站长删除该ID以提升体验！<br/><br/>温馨提示：请将此邮箱加入到邮箱白名单，以免被当作成广告邮件！';
} else {
    echo 'ERROR非法请求！';
}

$status = $mail->send();

?>