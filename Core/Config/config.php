<?php
$website_url = "http://"; # 请在这里填写网站链接
$texiao_dianji = 0;  # 1:气泡点击特效 2:爱心点击特效 3:樱花点击特效 4:蜘网点击特效 5:仙女点击特效 6:笑脸点击特效 7:泡泡点击特效 8:烟花点击特效 9:文字点击特效
$website_icons = false; # 按钮内旋转图标显示开关
$website_mdui2 = false; # 启用MDUI2样式（美化）
$website_feedback = false; # 网站音乐反馈按钮开关
$website_online = false; # 网站在线人数显示开关
$live2d_status = false; # 看板娘Live2D显示开关
$website_recolor = false; # 网站全局黑白模式开关
$live2d_width = 100; # 看板娘宽度，默认是：100
$live2d_height = 200; # 看板娘高度，默认是：200
$live2d_default = 0.7; # 默认透明度：0.1-1.0
$live2d_onhover = 0.2; # 显示透明度：0.1-1.0
$live2d_position = "left"; # 看板娘方向 左下：left 右下：right
$live2d_modelurl = "https://unpkg.com/live2d-widget-model-koharu@1.0.5/assets/koharu.model.json"; # 看板娘Live2D模板链接，详情请查看下方模板列表，当然你也可以用第三方链接

# ==================== 以下为发信邮箱设置 ====================

$mail_host = "smtp.163.com"; # 邮件主机名，例如：smtp.163.com
$mail_port = 25; # 邮件发送端口，详情自行百度
$mail_secure = "TLS"; # 邮件发送协议：TLS/SSL
$mail_isHTML = true; # 设置邮件发送为HTML模式
$mail_adminmai = ""; # 管理员邮箱账号
$mail_username = ""; # 邮箱账号/地址
$mail_password = ""; # 邮箱密码/授权码
$mail_fromuser = ""; # 邮箱地址/账号
# 黑猫：https://unpkg.com/live2d-widget-model-hijiki@1.0.5/assets/hijiki.model.json
# 萌娘：https://unpkg.com/live2d-widget-model-shizuku@1.0.5/assets/shizuku.model.json
# 白猫：https://unpkg.com/live2d-widget-model-tororo@1.0.5/assets/tororo.model.json
# 狗狗：https://unpkg.com/live2d-widget-model-wanko@1.0.5/assets/wanko.model.json
# 初音：https://unpkg.com/live2d-widget-model-miku@1.0.5/assets/miku.model.json
# 帅哥：https://unpkg.com/live2d-widget-model-chitose@1.0.5/assets/chitose.model.json
# 美女：https://unpkg.com/live2d-widget-model-epsilon2_1@1.0.5/assets/Epsilon2.1.model.json
# 学生：https://unpkg.com/live2d-widget-model-tsumiki@1.0.5/assets/tsumiki.model.json
# 茶杯犬：https://cdn.jsdelivr.net/npm/live2d-widget-model-wanko@1.0.5/assets/wanko.model.json
# 圣职者：https://unpkg.com/live2d-widget-model-z16@1.0.5/assets/z16.model.json
# 绿毛妹：https://unpkg.com/live2d-widget-model-tsumiki@1.0.5/assets/tsumiki.model.json
# 小可爱：https://unpkg.com/live2d-widget-model-z16@1.0.5/assets/z16.model.json
# 小阿狸：https://unpkg.com/live2d-widget-model-nico@1.0.5/assets/nico.model.json
# 金龟妹：https://unpkg.com/live2d-widget-model-unitychan@1.0.5/assets/unitychan.model.json
# 科技男：https://unpkg.com/live2d-widget-model-ni-j@1.0.5/assets/ni-j.model.json
# 小初音①：https://unpkg.com/live2d-widget-model-nipsilon@1.0.5/assets/nipsilon.model.json
# 小初音②：https://unpkg.com/live2d-widget-model-nito@1.0.5/assets/nito.model.json
# 小可爱（男）：https://unpkg.com/live2d-widget-model-haruto@1.0.5/assets/haruto.model.json
# 小可爱（女）：https://unpkg.com/live2d-widget-model-koharu@1.0.5/assets/koharu.model.json
# Live2D备用链接：https://eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js
?>