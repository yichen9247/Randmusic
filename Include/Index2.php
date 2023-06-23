<!DOCTYPE html>
<html lang="zh-CN">
  <?php
    ob_start();
    $m = $_GET["m"];
    if ($m == "") {
        $m = 0;
    }
    $dark = $_GET["dark"];
    if ($dark == "") {
        $dark = 0;
    }
    $type = $_GET["type"];
    if ($type == "") {
        $type = 0;
    }
    $auto = $_GET["auto"];
    if ($auto == "") {
        $auto = 0;
    }
  ?>
  <head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="随机网易云" />
    <meta name="description" content="随机网易云是一款随机获取网易云歌曲和歌单的播放器，适合个人博客站长嵌入网页。" />
    <!-- Open Graph on SEO -->
   <meta property="og:type" content="website" />
    <meta property="og:title" content="随机网易云" />
    <meta property="og:site_name" content="随机网易云"/>
    <meta property="og:url" content="<?php echo $website_config['website_url']; ?>" />
    <meta property="og:image" content="https://p3.music.126.net/tBTNafgjNnTL1KlZMt7lVA==/18885211718935735.jpg" />
	<title>随机网易云</title>
    <link rel="shortcut icon" href="<?php echo $cdn_url; ?>/favicon.ico">
    <?php
        echo '<link rel="stylesheet" href="'.$cdn_url.'/Assets/css/style2.css">';
        echo "\n    ";
        if ($m == 1) {
            echo "\n";
        } else 
        if ($m == 0) {
            if ($website_config['website_mdui2'] == true) {
                echo '<link rel="stylesheet" href="'.$cdn_url.'/Assets/mdui-v1.0.2/mdui2.main.css">';
                echo "\n    ";
            }
            echo '<link rel="stylesheet" href="'.$cdn_url.'/Assets/layui-v2.7.6/css/layui.css">';
            echo "\n";
            echo '    <link rel="stylesheet" href="'.$cdn_url.'/Assets/mdui-v1.0.2/css/mdui.min.css">';
            echo "\n";
            echo '    <link rel="stylesheet" href="'.$cdn_url.'/Assets/bootstrap-v4.6.2/css/bootstrap.min.css">';
            echo "\n";
            if ($website_config['website_icons'] == true) {
                echo '    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/font-awesome/6.1.2/css/all.min.css">';
                echo "\n";
            }
        }
    ?>
  </head>
  <?php
    if ($type == 1 || $dark != 0 || $website_config['website_recolor'] == true) {
        echo '<style type="text/css">';
        echo "\n    ";
        if ($type == 1) {
            echo ':root { --default_height: 32px; --default_fontsize: 1.5rem;}';
            echo "\n";
        }
        if ($dark != 0) {
            echo ':root { --default_color: transparent; --default_border: transparent;}';
            echo "\n";
        }
        if ($website_config['website_recolor'] == true) {
            echo '<style type="text/css">';
            echo "\n";
            echo '    html{filter : grayscale(100%);-webkit-filter: grayscale(100%);-moz-filter: grayscale(100%);-ms-filter: grayscale(100%);-o-filter: grayscale(100%);filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);}';
            echo "\n";
        }
        echo '  </style>';
        echo "\n";
    }
  ?>

  <?php
    if ($dark == 0) {
        echo '<body>';
        echo "\n";
        echo " ";
    } else
    if ($dark == 1) {
        echo '<body class="mdui-theme-layout-dark">';
        echo "\n";
        echo " ";
    } else 
    if($dark == 2) {
        echo '<body class="0" style="background-color:black;">';
        echo "\n";
        echo " ";
    } else {
        echo '<body>';
        echo "\n";
        echo " ";
    }
  ?>
  <div id="music_player" class="player">

    <div id="music_loading" class="loading">
        <div class="loading-box">
            <span class="loading-text">正在加载中</span>
        </div>
    </div>

    <?php
        if ((!file_exists(__MUSICLIDT_DIR__.'/music_res/music_list.dat')) || (!file_exists(__MUSICLIDT_DIR__.'/music_res/pure_music.dat')) || (!file_exists(__MUSICLIDT_DIR__.'/music_res/english_music.dat'))) {
            echo '<div class="player-error mdui-typo-display-1-opacity">错误：数据加载失败！</div>';
            echo "\n    ";
        } else {
            if ($type==1) {
                $a = file(__MUSICLIDT_DIR__.'/gedan_res/play_music.dat');
                $music = rand(0,count(file(__MUSICLIDT_DIR__.'/gedan_res/play_music.dat')));
                echo '<iframe id="player" style="display: none;" frameborder="no" border="0" marginwidth="0" marginheight="0" width=100% height=52 src="https://music.163.com/outchain/player?type=0&id='.trim($a[$music],"\n").'&auto='.$auto.'&height=32"></iframe>';
                echo "\n";
            } else 
            if ($type==0) {
                $a = file(__MUSICLIDT_DIR__.'/gedan_res/play_music.dat');
                $music = rand(0,count(file(__MUSICLIDT_DIR__.'/gedan_res/play_music.dat')));
                echo '<iframe id="player" style="display: none;" frameborder="no" border="0" marginwidth="0" marginheight="0" width=100% height=110 src="https://music.163.com/outchain/player?type=0&id='.trim($a[$music],"\n").'&auto='.$auto.'&height=90"></iframe>';
                echo "\n";
            } else {
                # 参数有误[Error_LodeFaild]
                $a = file(__MUSICLIDT_DIR__.'/music_res/play_music.dat');
                $music = rand(0,count(file(__MUSICLIDT_DIR__.'/music_res/play_music.dat')));
                echo '<div class="player-error mdui-typo-display-1-opacity">错误：请求参数有误！</div>';
            }
        }
    ?>
  </div>  
  <?php
    echo "\n  ";
    if ($m == 1) {
        $website_live2d['live2d_status'] = false;
    } else
    if ($m == 0) {
        echo '  <div id="button-sheet" class="button-sheet layui-anim layui-anim-up">';
        echo "\n  ";
        $live2d_vOffset = -50;
        if ($website_config['website_online'] == true) {
            if ($website_config['website_icons'] == true) {
                echo '    <button id="copyright-relode" class="reflash_button btn btn-outline-info btn-lg btn-block mdui-ripple" onclick="javascript:window.location.reload();"><i class="mdui-icon material-icons fa-spin">face</i>&nbsp;&nbsp;随机网易云（'.online_users().'人在线）</button>';
            } else {
                echo '    <button id="copyright-relode" class="reflash_button btn btn-outline-info btn-lg btn-block mdui-ripple" onclick="javascript:window.location.reload();">随机网易云（'.online_users().'人在线）</button>';
            }
            echo "\n";
            echo '    </div>';
            echo "\n  ";
        } else {
            if ($website_config['website_online'] == true) {
                echo '    <button id="copyright-relode" class="reflash_button btn btn-outline-info btn-lg btn-block mdui-ripple" onclick="javascript:window.location.reload();"><i class="mdui-icon material-icons fa-spin">face</i>&nbsp;&nbsp;随机网易云</button>';
            } else {
                echo '    <button id="copyright-relode" class="reflash_button btn btn-outline-info btn-lg btn-block mdui-ripple" onclick="javascript:window.location.reload();">随机网易云</button>';
            }
            echo "\n";
            echo '    </div>';
            echo "\n  ";
        }

        if ($website_config['website_feedback'] == 1) {
            $back_code = rand_code($website_webwaf['code_length']);
            echo '  <div class="mdui-dialog" id="feedback">';
            echo "\n  ";
            echo '      <div class="mdui-dialog-title"><i class="mdui-icon material-icons mdui-text-color-blue">&#xe88f;</i> 是否反馈该歌单?</div>';
            echo "\n  ";
            echo '      <div class="mdui-dialog-content" style="white-space: normal;">当网易云歌单无法播放时或者是歌单存在不适等，您可以向站长反馈这个歌单。';
            echo "\n  ";
            if ($website_webwaf['feed_backcode'] == true) {
                if ($website_model['model_input'] == 1) {
                    echo '          <input type="backcode" class="form-control" id="backcode" placeholder="请输入安全验证码：'.$back_code.'">';
                } else 
                if ($website_model['model_input'] == 2) {
                    echo '          <input type="text" id="backcode" class="layui-input" placeholder="请输入安全验证码：'.$back_code.'">';
                } else {
                    echo '          <div class="mdui-textfield">';
                    echo "\n  ";
                    echo '              <input class="mdui-textfield-input" type="text" id="backcode" placeholder="请输入安全验证码：'.$back_code.'" maxlength="'.$website_webwaf['code_length'].'" pattern="[0-9]+"/>';
                    echo "\n  ";
                    echo '              <div class="mdui-textfield-error">请在上方输入正确的安全验证码</div>';
                    echo "\n  ";
                    echo '              <div class="mdui-textfield-helper">请在上方输入正确的安全验证码</div>';
                    echo "\n  ";
                    echo '          </div>';
                }
                echo "\n  ";
                echo '      </div>';
                echo "\n  ";
            } else {
                echo '  </div>';
                echo "\n";
            }
            echo '      <div class="mdui-dialog-actions">';
            echo "\n  ";
            echo '          <button id="n_feeback" class="mdui-btn mdui-ripple" mdui-dialog-close>取消</button>';
            echo "\n  ";
            echo '          <button id="y_feedback" class="mdui-btn mdui-ripple" onclick="y_feedback()" mdui-dialog-confirm>反馈</button>';
            echo "\n  ";
            echo '      </div>';
            echo "\n  ";
            echo '  </div>';
            echo "\n";
            echo '  <button class="mdui-fab mdui-fab-fixed mdui-text-color-cyan mdui-color-blue-50" mdui-dialog="{target: \'#feedback\'}" style="bottom: 35px;"><i class="mdui-icon material-icons">&#xe163;</i></button>';
            echo "\n";
            }

            if ($website_live2d['live2d_status'] == true) {
                echo '  <script src="https://eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>';
                echo "\n";
            }

            switch ($website_config['website_click']) {
                case 1:
                    echo '  <script src="'.$cdn_url.'/Assets/JavaScript/website_click.js"></script>';
                    echo "\n";
                    break;
                case 2:
                    echo '  <script src="'.$cdn_url.'/Assets/JavaScript/texiao_aixin.js"></script>';
                    echo "\n";
                    break;
                case 3:
                    echo '  <script src="'.$cdn_url.'/Assets/JavaScript/texiao_yinghua.js"></script>';
                    echo "\n";
                    break;
                case 4:
                    echo '  <script src="'.$cdn_url.'/Assets/JavaScript/texiao_zhizhu.js"></script>';
                    echo "\n";
                    break;
                case 5:
                    echo '  <script src="'.$cdn_url.'/Assets/JavaScript/texiao_xiannu.js"></script>';
                    echo "\n";
                    break;
                case 6:
                    echo '  <script src="'.$cdn_url.'/Assets/JavaScript/texiao_face.js"></script>';
                    echo "\n";
                    break;
                case 7:
                    echo '  <script src="'.$cdn_url.'/Assets/JavaScript/texiao_paopao.js"></script>';
                    echo "\n";
                    break;
                case 8:
                    echo '  <script src="'.$cdn_url.'/Assets/JavaScript/texiao_yanhua.js"></script>';
                    echo "\n";
                    break;
                case 9:
                    echo '  <script src="'.$cdn_url.'/Assets/JavaScript/texiao_text.js"></script>';
                    echo "\n";
                    break;
                default:
                    break;
            }
    }
  ?>
<script type="text/javascript">
    L2Dwidget.init({
      "model": {
          <?php echo '"jsonPath": "'.$website_live2d['live2d_modelurl'].'",'; ?>

          "scale": 1
        },
      "display": {
          <?php echo '"position": "'.$website_live2d['live2d_position'].'",'; ?>

          <?php echo '"width": '.$website_live2d['live2d_width'].','; ?>

          <?php echo '"height": '.$website_live2d['live2d_height'].','; ?>

          "hOffset": 0,
          <?php echo '"vOffset": '.$live2d_vOffset.''; ?>
                    
        },
      "mobile": {
          <?php echo '"show": '.$website_live2d['live2d_status'].','; ?>

          "scale": 0.5
        },
      "react": {
          <?php echo '"opacityDefault": '.$website_live2d['live2d_default'].','; ?>

          <?php echo '"opacityOnHover": '.$website_live2d['live2d_onhover'].','; ?>
          
        }
    });
  </script>

  <script type"text/javascript">
    <?php
    if ((!file_exists(__MUSICLIDT_DIR__.'/music_res/music_list.dat')) || (!file_exists(__MUSICLIDT_DIR__.'/music_res/pure_music.dat')) || (!file_exists(__MUSICLIDT_DIR__.'/music_res/english_music.dat'))) {
        echo 'console.log("%cERROR:The file has not found!","width:100%;padding:5px;background-color:#ff0000;color:#ffffff;border-radius:5px;font-weight:bolder;")';
    } else {
        if (trim($a[$music],"\n") == "") {
            echo 'window.location.reload();';
            echo "\n";
        } else {
            $usertoken = md5(trim($a[$music],"\n"));
            setcookie("usertoken",$usertoken,time()+1*1*1*30);
            echo 'console.log("%cThe page load success!","width:100%;padding:5px;background-color:#00ff00;color:#ffffff;border-radius:5px;font-weight:bolder;")';
            echo "\n";
        }
    }
    ?>
  </script>

  <script type"text/javascript">
    function y_feedback() {
        var codeinput = document.getElementById("backcode");
        var codevalue = codeinput.value;
        if (codevalue != <?php echo $back_code; ?>) {
            window.setTimeout("alert('请输入正确的安全验证码！');",500);
        } else {
            var theid = <?php echo trim($a[$music],"\n"); ?>;
            var feedback = new XMLHttpRequest();
            feedback.open('get','/sendmail.php?type=2&mid=' + theid,true);
            feedback.send();
            window.setTimeout("alert('感谢您的反馈！');",1000);
        }
    };
  </script>
  <?php
    echo '<script src="'.$cdn_url.'/Assets/js/script2.js"></script>';
    echo "\n  ";
    if ($m == 1) {
        echo "\n";
    } else 
    if ($m == 0) {
        if ($website_config['website_rejquery'] == true) {
            echo '<script src="'.$cdn_url.'/Assets/mdui-v1.0.2/js/mdui.min.js"></script>';
            echo "\n";
        } else {
            echo '<script src="'.$cdn_url.'/Assets/js/jquery.min.js"></script>';
            echo "\n";
            echo '<script src="'.$cdn_url.'/Assets/mdui-v1.0.2/js/mdui.min.js"></script>';
            echo "\n";
        }
    }
  ?>
  <!-- 2019-2023 © Reah-随机网易云(https://music.yunair.cn) -->
  </body><?php echo '<!-- 加载耗时：'.timer_get().'-->';?></html>