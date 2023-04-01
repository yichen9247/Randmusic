<!DOCTYPE html>
<html>
  <?php
    header('Content-type:text/html;charset=utf-8');
    include './config.php';
    include './functions.php';
    $m = $_GET["m"];
    if($m=="") {
      $m = 0;
      }
    $dark = $_GET["dark"];
    if($dark=="") {
      $dark = 0;
      }
    $type = $_GET["type"];
    if($type=="") {
      $type = 0;
      }
    $song = $_GET["song"];
    if($song=="") {
      $song = 0;
      }
    $auto = $_GET["auto"];
    if($auto=="") {
      $auto = 0;
      }
  ?>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="随机网易云" />
    <meta name="description" content="随机网易云是一款随机获取网易云歌曲和歌单的播放器，适合个人博客站长嵌入网页。" />
    <!-- Open Graph on SEO -->
    <meta property="og:title" content="随机网易云" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://p3.music.126.net/tBTNafgjNnTL1KlZMt7lVA==/18885211718935735.jpg" />
    <?php echo '<meta property="og:url" content="'.$website_url.'" />'; ?>
    
    <meta property="og:site_name" content="随机网易云"/>
	<title>随机网易云</title>
    <link rel="shortcut icon" href="https://s1.music.126.net/style/favicon.ico?v20180823">
    <?php
      if($m == 1) {
        echo "\n";
      } else 
      if($m == 0) {
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.7.6/css/layui.css">';
        echo "\n";
        echo '    <link rel="stylesheet" href="https://fastly.jsdelivr.net/npm/mdui@1.0.0/dist/css/mdui.min.css">';
        echo "\n";
        echo '    <link rel="stylesheet" href="https://fastly.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">';
        echo "\n";
        if($website_icons == true) {
          echo '    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/font-awesome/6.1.2/css/all.min.css">';
        }
      }
    ?>
  </head>
  <?php
    if($website_recolor == true) {
      echo '<style type="text/css">';
      echo "\n";
      echo '    html{filter : grayscale(100%);-webkit-filter: grayscale(100%);-moz-filter: grayscale(100%);-ms-filter: grayscale(100%);-o-filter: grayscale(100%);filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);}';
      echo "\n";
      echo '  </style>';
    }
    echo "\n";
  ?>
  <?php
  if($dark==0) {
    echo '<body class="0" style="overflow:hidden;">';
    echo "\n";
    echo " ";
  } else
  if($dark==1) {
    echo '<body class="mdui-theme-layout-dark" style="overflow:hidden">';
    echo "\n";
    echo " ";
  } else 
  if($dark==2) {
    echo '<body class="0" style="overflow:hidden; background-color:black;">';
    echo "\n";
    echo " ";
  } else {
    echo '<body class="0" style="overflow:hidden;">';
    echo "\n";
    echo " ";
  }
  if((!file_exists('./music_res/music_list.dat'))||(!file_exists('./music_res/pure_music.dat'))||(!file_exists('./music_res/english_music.dat'))) {
      echo '<div class="mdui-typo-display-1-opacity">错误：数据加载失败！</div>';
      echo "\n    ";
  }
  ?>
 <?php
   echo '  <div class="music">';
   echo "\n      ";
   if($type==1) {
     if($song==0) {
       # 全部音乐[pure_music.dat]
       $a=file('./music_res/music_list.dat');
       $music=rand(0,count(file('./music_res/music_list.dat')));
       echo '<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=100% height=52 src="https://music.163.com/outchain/player?type=2&id='.$a[$music].'&auto='.$auto.'&height=32"></iframe>';
       echo "\n";
     } else 
     if($song==1) {
       # 纯音类型[pure_music.dat]
       $a=file('./music_res/pure_music.dat');
       $music=rand(0,count(file('./music_res/pure_music.dat')));
       echo '<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=100% height=52 src="https://music.163.com/outchain/player?type=2&id='.$a[$music].'&auto='.$auto.'&height=32"></iframe>';
       echo "\n";
     } else 
     if($song==2) {
       # 英文类型[english_music.dat]
       $a=file('./music_res/english_music.dat');
       $music=rand(0,count(file('./music_res/english_music.dat')));
       echo '<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=100% height=52 src="https://music.163.com/outchain/player?type=2&id='.$a[$music].'&auto='.$auto.'&height=32"></iframe>';
       echo "\n";
     } else {
       # 加载失败[Error_LodeFaild]
       echo '<div class="mdui-typo-display-1-opacity">错误：数据加载失败！</div>';
     }
   } else 
   if($type==0) {
     if($song==0) {
       # 全部音乐[music_list.dat]
       $a=file('./music_res/music_list.dat');
       $music=rand(0,count(file('./music_res/music_list.dat')));
       echo '<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=100% height=86 src="https://music.163.com/outchain/player?type=2&id='.$a[$music].'&auto='.$auto.'&height=66"></iframe>';
       echo "\n";
       } else
     if($song==1) {
       # 纯音类型[pure_music.dat]
       $a=file('./music_res/pure_music.dat');
       $music=rand(0,count(file('./music_res/pure_music.dat')));
       echo '<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=100% height=86 src="https://music.163.com/outchain/player?type=2&id='.$a[$music].'&auto='.$auto.'&height=66"></iframe>';
       echo "\n";
       } else 
     if($song==2) {
       # 英文类型[english_music.dat]
       $a=file('./music_res/english_music.dat');
       $music=rand(0,count(file('./music_res/english_music.dat')));
       echo '<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=100% height=86 src="https://music.163.com/outchain/player?type=2&id='.$a[$music].'&auto='.$auto.'&height=66"></iframe>';
       echo "\n";
       } else {
       # 加载失败[Error_LodeFaild]
       echo '<div class="mdui-typo-display-1-opacity">错误：数据加载失败！</div>';
       }
    }
    echo '    </div>';
  ?>
  <?php
    echo "\n  ";
    if($m == 1) {
      $live2d_status = false;
    } else
    if($m == 0) {
      echo '  <div class="layui-anim layui-anim-up">';
      echo "\n  ";
      $live2d_vOffset = -50;
      if($website_online == true) {
        if($website_icons == true) {
          echo '    <button id="copyright-relode" class="btn btn-outline-info btn-lg btn-block mdui-ripple" onclick="javascript:window.location.reload();"><i class="mdui-icon material-icons fa-spin">face</i>&nbsp;&nbsp;随机网易云（'.online_users().'人在线）</button>';
        } else {
        echo '    <button id="copyright-relode" class="btn btn-outline-info btn-lg btn-block mdui-ripple" onclick="javascript:window.location.reload();">随机网易云（'.online_users().'人在线）</button>';
        }
        echo "\n";
        echo '    </div>';
        echo "\n  ";
        } else {
        if($website_icons == true) {
          echo '    <button id="copyright-relode" class="btn btn-outline-info btn-lg btn-block mdui-ripple" onclick="javascript:window.location.reload();"><i class="mdui-icon material-icons fa-spin">face</i>&nbsp;&nbsp;随机网易云</button>';
        } else {
          echo '    <button id="copyright-relode" class="btn btn-outline-info btn-lg btn-block mdui-ripple" onclick="javascript:window.location.reload();">随机网易云</button>';
        }
        echo "\n";
        echo '    </div>';
        echo "\n  ";
        }
      if($website_debug == 1) {
        echo '  <div class="mdui-dialog" id="feedback">';
        echo "\n  ";
        echo '      <div class="mdui-dialog-title"><i class="mdui-icon material-icons mdui-text-color-blue">info_outline</i> 是否反馈该歌曲?</div>';
        echo "\n  ";
        echo '      <div class="mdui-dialog-content">当网易云音乐无法播放时或者是音乐存在不适等，您可以向站长反馈该首歌曲。</div>';
        echo "\n  ";
        echo '      <div class="mdui-dialog-actions">';
        echo "\n  ";
        echo '          <button id="n_feeback" class="mdui-btn mdui-ripple" mdui-dialog-close>取消</button>';
        echo "\n  ";
        echo '          <button id="y_feedback" class="mdui-btn mdui-ripple" onclick="y_feedback()" mdui-dialog-confirm>反馈</button>';
        echo "\n  ";
        echo '      </div>';
        echo "\n  ";
        echo '  </div>';
        echo "\n  ";
        echo '  <div class="debug"><hr/>';
        echo "\n    ";
        echo '  <h5 class="mdui-text-color-white" mdui-dialog="{target: \'#feedback\'}" style="text-align:center;">';
        echo "\n  ";
        echo '      ['.$song.']ID:'.$a[$music].'';
        echo '      </h5>';
        echo "\n    ";
        echo '</div>';
        echo "\n";
        }
      if($live2d_status == true) {
        echo '  <script src="https://eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>';
        echo "\n";
      }
      if($texiao_dianji == 1) {
        echo '  <script src="https://fastly.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_dianji.js"></script>';
        echo "\n";
      } else
      if($texiao_dianji == 2) {
        echo '  <script src="https://fastly.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_aixin.js"></script>';
        echo "\n";
      } else
      if($texiao_dianji == 3) {
        echo '  <script src="https://fastly.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_yinghua.js"></script>';
        echo "\n";
      } else
      if($texiao_dianji == 4) {
        echo '  <script src="https://fastly.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_zhizhu.js"></script>';
        echo "\n";
      } else
      if($texiao_dianji == 5) {
        echo '  <script src="https://fastly.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_xiannu.js"></script>';
        echo "\n";
      } else
      if($texiao_dianji == 6) {
        echo '  <script src="https://fastly.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_face.js"></script>';
        echo "\n";
      } else
      if($texiao_dianji == 7) {
        echo '  <script src="https://fastly.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_paopao.js"></script>';
        echo "\n";
      } else
      if($texiao_dianji == 8) {
        echo '  <script src="https://fastly.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_yanhua.js"></script>';
        echo "\n";
      } else
      if($texiao_dianji == 9) {
        echo '  <script src="https://fastly.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_text.js"></script>';
        echo "\n";
      }
    }
  ?>
  <script type="text/javascript">
    L2Dwidget.init({
      "model": {
          <?php echo '"jsonPath": "'.$live2d_modelurl.'",'; ?>
          
          "scale": 1
        },
      "display": {
          <?php echo '"position": "'.$live2d_position.'",'; ?>
           
          <?php echo '"width": '.$live2d_width.','; ?>
           
          <?php echo '"height": '.$live2d_height.','; ?>
                     
          "hOffset": 0,
          <?php echo '"vOffset": '.$live2d_vOffset.''; ?>
                    
        },
      "mobile": {
          <?php echo '"show": '.$live2d_status.','; ?>
          
          "scale": 0.5
        },
      "react": {
          <?php echo '"opacityDefault": '.$live2d_default.','; ?>
           
          <?php echo '"opacityOnHover": '.$live2d_onhover.','; ?>
          
        }
    });
  </script>
  <script type"text/javascript">
    <?php
      if($a[$music]=="") {
        echo 'window.location.reload();';
        echo "\n";
      } else {
        echo 'console.log("page load success!");';
        echo "\n";
      }
    ?>
    function y_feedback() {
        var song = <?php echo $song; ?>
        
        var theid = <?php echo $a[$music]; ?>
        var feedback = new XMLHttpRequest();
        feedback ['\x6f\x70\x65\x6e']('\x67\x65\x74','\x2f\x73\x65\x6e\x64\x6d\x61\x69\x6c\x2e\x70\x68\x70\x3f\x74\x79\x70\x65\x3d\x31\x26\x63\x6f\x6e\x74\x65\x6e\x74\x3d\u67d0\u70ed\u5fc3\u7f51\u53cb\u53cd\u9988\u4e86\u97f3\u4e50\uff0c\u8be5\u97f3\u4e50\u53ef\u80fd\u6709\u95ee\u9898\x3c\x62\x72\x2f\x3e\x3c\x63\x65\x6e\x74\x65\x72\x3e\x3c\x68\x72\x2f\x3e\u5931\u6548\u7684\x49\x44 \uff1a\x5b'+song+'\x5d'+theid+'\x3c\x68\x72\x2f\x3e\x3c\x2f\x63\x65\x6e\x74\x65\x72\x3e\x3c\x62\x72\x2f\x3e\x50\x53\uff1a\u8bf7\u4ed4\u7ec6\u6838\u5b9e\u8be5\x49\x44\uff0c\u82e5\u8be5\x49\x44\u786e\u5b9e\u5df2\u7ecf\u5931\u6548\uff0c\u8fd8\u8bf7\u7ad9\u957f\u5220\u9664\u8be5\x49\x44\u4ee5\u63d0\u5347\u4f53\u9a8c\uff01\x3c\x62\x72\x2f\x3e\x3c\x62\x72\x2f\x3e\u6e29\u99a8\u63d0\u793a\uff1a\u8bf7\u5c06\u6b64\u90ae\u7bb1\u52a0\u5165\u5230\u90ae\u7bb1\u767d\u540d\u5355\uff0c\u4ee5\u514d\u88ab\u5f53\u4f5c\u6210\u5e7f\u544a\u90ae\u4ef6\uff01',true);
        feedback.send();
        window.setTimeout("alert('感谢您的反馈！');",1000);
    };
  </script>
  <?php
    if($m == 1) {
      echo "\n";
    } else 
    if($m == 0) {
      echo '<script src="https://cdn.staticfile.org/jquery/3.6.0/jquery.min.js"></script>';
      echo "\n";
      echo '  <script src="https://fastly.jsdelivr.net/npm/mdui@1.0.0/dist/js/mdui.min.js"></script>';
      echo "\n";
    }
  ?>
  <!-- 2019-2023 © Reah-随机网易云(https://music.yunair.cn) -->
  </body><?php echo '<!-- 加载耗时：'.timer_get().'-->';?></html>