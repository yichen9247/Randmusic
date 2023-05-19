<?php
function checkConfig() {
    $url_rule = '/^(http|https):\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\’:+!]*([^<>\”])*$/';
    if(preg_match($url_rule,$website_config['website_url'])) {
    } else {
        throw new Exception ("网站URL地址配置错误");
    }
}

function cdnurlChoice() {
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
}
?>