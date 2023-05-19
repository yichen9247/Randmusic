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

if ($_COOKIE['usertoken'] != md5($mid)) {
    die(json_encode(array(
		'code' => 502,
		'msg' => 'ERROR非法请求'
	),320 | JSON_PRETTY_PRINT));
} else
if ($_GET['type'] == "" || $_GET['mid'] == "") {
    die(json_encode(array(
		'code' => 500,
		'msg' => 'ERROR非法请求'
	),320 | JSON_PRETTY_PRINT));
} else
if ($_GET['type'] == 1) {
    $song = $_GET['song'];
    $mail->Subject = '【随机网易云】反馈通知 IP：'.$GetUserIP;
    $mail->Body = '<style>.mail{width:550px;margin:0 auto;border-radius:8px;overflow:hidden;font-family:"Helvetica Neue",Helvetica,"PingFang SC","Hiragino Sans GB","Microsoft YaHei",Arial,sans-serif;box-shadow:0 2px 12px 0 rgba(0,0,0,0.1);word-break:break-all}.mail_title{color:#fff;background:linear-gradient(-45deg,rgba(9,69,138,0.2),rgba(68,155,255,0.7),rgba(117,113,251,0.7),rgba(68,155,255,0.7),rgba(9,69,138,0.2));background-size:400% 400%;background-position:50% 100%;padding:15px;font-size:15px;line-height:1.5}</style><br/><br/><div class="mail"><div class="mail_title">【随机网易云】反馈通知 IP：'.$GetUserIP.'</div><div style="background: #fff;padding: 20px;font-size: 13px;color: #666;"><div style="margin-bottom: 20px;line-height: 1.5;">某热心网友在您的站点上反馈了音乐，该音乐可能存在有失效问题：</div><div style="padding: 15px;margin-bottom: 20px;line-height: 1.5;background: repeating-linear-gradient(145deg, #f2f6fc, #f2f6fc 15px, #fff 0, #fff 25px);">ID：['.$song.']'.$mid.'&nbsp;&nbsp;<span style="color: #12addb;">0：全部音乐 1：纯音类型 2：英文歌曲</span></div><div style="line-height: 2">PS：请将此邮箱加入到邮箱白名单，以免被当作成广告邮件！<br>温馨提示：请仔细核实该ID，若该ID确实已经失效，还请站长删除该ID以提升体验！</div></div></div>';
} else 
if ($_GET['type'] == 2) {
    $mail->Subject = '【随机网易云】反馈通知 IP：'.$GetUserIP;
    $mail->Body = '<style>.mail{width:550px;margin:0 auto;border-radius:8px;overflow:hidden;font-family:"Helvetica Neue",Helvetica,"PingFang SC","Hiragino Sans GB","Microsoft YaHei",Arial,sans-serif;box-shadow:0 2px 12px 0 rgba(0,0,0,0.1);word-break:break-all}.mail_title{color:#fff;background:linear-gradient(-45deg,rgba(9,69,138,0.2),rgba(68,155,255,0.7),rgba(117,113,251,0.7),rgba(68,155,255,0.7),rgba(9,69,138,0.2));background-size:400% 400%;background-position:50% 100%;padding:15px;font-size:15px;line-height:1.5}</style><br/><br/><div class="mail"><div class="mail_title">【随机网易云】反馈通知 IP：'.$GetUserIP.'</div><div style="background: #fff;padding: 20px;font-size: 13px;color: #666;"><div style="margin-bottom: 20px;line-height: 1.5;">某热心网友在您的站点上反馈了歌单，该歌单可能存在有失效问题：</div><div style="padding: 15px;margin-bottom: 20px;line-height: 1.5;background: repeating-linear-gradient(145deg, #f2f6fc, #f2f6fc 15px, #fff 0, #fff 25px);">ID：'.$mid.'&nbsp;&nbsp;<span style="color: #12addb;">0：全部歌单 1：纯音歌单 2：英文歌单</span></div><div style="line-height: 2">PS：请将此邮箱加入到邮箱白名单，以免被当作成广告邮件！<br>温馨提示：请仔细核实该ID，若该ID确实已经失效，还请站长删除该ID以提升体验！</div></div></div>';
} else {
    die(json_encode(array(
		'code' => 501,
		'msg' => 'ERROR非法请求'
	),320 | JSON_PRETTY_PRINT));
}

$status = $mail->send();
?>