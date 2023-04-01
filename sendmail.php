<?php
namespace PHPMailer;

require_once("./config.php");
require_once("PHPMailer/PHPMailer.php");
require_once("PHPMailer/class.smtp.php");

$content = $_GET['content'];
$GetUserIP = $_SERVER["REMOTE_ADDR"];

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 1;
$mail->Body = $content;
$mail->CharSet = 'UTF-8';
$mail->SMTPAuth = true;
$mail->Host = $mail_host;
$mail->Port = $mail_port;
$mail->isHTML($mail_isHTML);
$mail->From = $mail_fromuser;
$mail->FromName = '随机网易云';
$mail->addAddress($mail_adminmai);
$mail->SMTPSecure = $mail_secure;
$mail->Username = $mail_username;
$mail->Password = $mail_password;

if ($_GET['type'] == "" || $_GET['content'] == "") {
    echo 'ERROR非法请求！';
} else
if ($_GET['type'] == 1) {
    $mail->Subject = '【随机网易云】反馈通知 IP：'.$GetUserIP;
} else 
if ($_GET['type'] == 2) {
    $mail->Subject = '【随机网易云】资源未获取通知';
} else {
    echo 'ERROR非法请求！';
}

$status = $mail->send();

?>