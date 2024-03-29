<?php

try {
    
    require_once __CORE_DIR__.'/Config/apikey.php';
    
    # ==================== 以下为网站基础设置 ====================
    $website_config = array(
        'website_url' => 'https://music.yunair.cn', # 请在这里填写网站链接
        'website_click' => 8, # 0:无任何特效 1:气泡点击特效 2:爱心点击特效 3:樱花点击特效 4:蜘网点击特效 5:仙女点击特效 6:笑脸点击特效 7:泡泡点击特效 8:烟花点击特效 9:文字点击特效
        'website_icons' => false, # 按钮内旋转图标显示开关
        'website_mdui2' => true, # 启用MDUI2样式（美化）
        'website_feedback' => true, # 网站音乐反馈按钮开关
        'website_online' => true, # 网站在线人数显示开关
        'website_recolor' => false, # 网站全局黑白模式开关
        'website_rejquery' => true # 网站前端移除Jquery框架
    );

    # ==================== 以下为网站小娘设置 ====================
    
    $website_live2d = array(
        'live2d_status' => true, # 看板娘Live2D显示开关
        'live2d_width' => 100, # 看板娘宽度，默认是：100
        'live2d_height' => 200, # 看板娘高度，默认是：200
        'live2d_default' => 0.7, # 默认透明度：0.1-1.0
        'live2d_onhover' => 0.2, # 显示透明度：0.1-1.0
        'live2d_position' => 'left', # 看板娘方向 左下：left 右下：right
        'live2d_modelurl' => 'https://unpkg.com/live2d-widget-model-koharu@1.0.5/assets/koharu.model.json' # 看板娘Live2D模板链接，详情请查看下方模板列表，当然你也可以用第三方链接
    );
    
    # ==================== 以下为网站加速设置 ====================
    
    $website_speed = array(
        'website_cdn' => 4, # 0：默认，本服务器加载资源 1：Jsdelivr全球加速源 2.Jsdelivr国内加速源 3：Jsdelivr的CF加速源 4：自定义CDN源
        'website_cdnurl' => 'https://yunairsite-1309511642.cos.ap-chengdu.myqcloud.com/163Music' #网站自定义CDN/COS源
    );
    
    # ==================== 以下为组件样式设置 ====================
    
    $website_model = array(
        'model_input' => 0, # 0：默认，MDUI样式输入框 1：Bootstrap式模态化输入框架2：LayUI式大众化输入框
    );
    
    # ==================== 以下为网站安全设置 ====================
    
    $website_webwaf = array(
        'feed_backcode' => true, # 是否开启网站反馈验证码
        'code_length' => 6, # 网站反馈验证码数字的长度
        'cc_project' => true, # 是否开启网站CC防护功能
        'api_project' => true, #是否开启接口CC防护功能
        'website_dissql' => true # 是否开启SQL防注入功能
    );
    
    # ==================== 以下为发信邮箱设置 ====================
    
    $website_mail = array(
        'mail_host' => 'smtp.163.com', # 邮件主机名，例如：smtp.163.com
        'mail_port' => 25, # 邮件发送端口，详情请自行百度
        'mail_secure' => 'TLS', # 邮件发送协议：TLS/SSL
        'mail_isHTML' => true, # 设置邮件发送为HTML模式
        'mail_adminmai' => '865252486@qq.com', # 管理员邮箱账号
        'mail_username' => 'yunairsite@163.com', # 邮箱账号/地址
        'mail_password' => 'XVLIMOIUHROBCVFB', # 邮箱密码/授权码
        'mail_fromuser' => 'yunairsite@163.com' # 邮箱地址/账号
    );
    
} catch (Exception $e) {
    throwError($e);
}

switch ($website_speed['website_cdn']) {
    case 0:
        $cdn_url = $website_config['website_url'];
        break;
    case 1:
        $cdn_url = 'https://cdn.jsdelivr.net/gh/yichen9247/Randmusic';
        break;
    case 2:
        $cdn_url = 'https://fastly.jsdelivr.net/gh/yichen9247/Randmusic';
        break;
    case 3:
        $cdn_url = 'https://cloudflare.jsdelivr.net/gh/yichen9247/Randmusic';
        break;
    case 4:
        $cdn_url = $website_speed['website_cdnurl'];
        break;
    default:
        $cdn_url = $website_config['website_url'];
         break;
}

function throwError($content) {
    die("<!DOCTYPE html><html><head><meta charset=\"utf-8\" name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\"><title>网站信息配置错误</title></head><style type=\"text/css\">html {background: #f1f1f1;} body {background: #fff;border: 1px solid #ccd0d4;color: #444;font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Oxygen-Sans, Ubuntu, Cantarell, \"Helvetica Neue\", sans-serif;margin: 2em auto;padding: 1em 2em;max-width: 700px;-webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .04);box-shadow: 0 1px 1px rgba(0, 0, 0, .04);} h1 {border-bottom: 1px solid #dadada;clear: both;color: #666;font-size: 24px;margin: 30px 0 0 0;padding: 0;padding-bottom: 7px;} #error-page{margin-top: 50px;} #error-page p, #error-page .die-message{font-size: 14px;line-height: 1.5;margin: 25px 0 20px;} #error-page code{font-family: Consolas, Monaco, monospace;}</style><body id=\"error-page\"><div class=\"die-message\"><h1>网站信息配置错误</h1><h3>请检查Config.php是否配置正确</h3><h4>" .$content. "</h4></div></body></html>");
    exit;
}


# ==================== 以下为三方模板链接 ====================

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