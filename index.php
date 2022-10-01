<!DOCTYPE html>
<html>
  <?php
    header('Content-type: text/html; charset=utf-8');
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
    <link rel="stylesheet" href="https://cdn.staticfile.org/bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.7.6/css/layui.css">
    <link rel="stylesheet" href="https://fastly.jsdelivr.net/npm/mdui@1.0.0/dist/css/mdui.min.css" />
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="https://s1.music.126.net/style/favicon.ico?v20180823" />
  </head>
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
       echo '<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=100% height=52 src="https://music.163.com/outchain/player?type=2&id='.$a[$music].'&auto='.$radio.'&height=32"></iframe>';
       echo "\n";
       } else 
     if($song==1) {
       # 纯音类型[pure_music.dat]
       $a=file('./music_res/pure_music.dat');
       $music=rand(0,count(file('./music_res/pure_music.dat')));
       echo '<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=100% height=52 src="https://music.163.com/outchain/player?type=2&id='.$a[$music].'&auto='.$radio.'&height=32"></iframe>';
       echo "\n";
       } else 
     if($song==2) {
       # 英文类型[english_music.dat]
       $a=file('./music_res/english_music.dat');
       $music=rand(0,count(file('./music_res/english_music.dat')));
       echo '<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=100% height=52 src="https://music.163.com/outchain/player?type=2&id='.$a[$music].'&auto='.$radio.'&height=32"></iframe>';
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
       echo '<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=100% height=86 src="https://music.163.com/outchain/player?type=2&id='.$a[$music].'&auto='.$radio.'&height=66"></iframe>';
       echo "\n";
       } else
     if($song==1) {
       # 纯音类型[pure_music.dat]
       $a=file('./music_res/pure_music.dat');
       $music=rand(0,count(file('./music_res/pure_music.dat')));
       echo '<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=100% height=86 src="https://music.163.com/outchain/player?type=2&id='.$a[$music].'&auto='.$radio.'&height=66"></iframe>';
       echo "\n";
       } else 
     if($song==2) {
       # 英文类型[english_music.dat]
       $a=file('./music_res/english_music.dat');
       $music=rand(0,count(file('./music_res/english_music.dat')));
       echo '<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=100% height=86 src="https://music.163.com/outchain/player?type=2&id='.$a[$music].'&auto='.$radio.'&height=66"></iframe>';
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
    echo '  <div class="layui-anim layui-anim-up">';
    echo "\n  ";
    if($m == 1) {
      $live2d_status = false;
       } else
    if($m == 0) {
      $live2d_vOffset = -50;
      }
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
      echo '  <div class="debug"><hr/>';
      echo "\n    ";
      echo '  <h5 class="mdui-text-color-white" style="text-align:center;">';
      echo "\n  ";
      echo '      ['.$song.']ID:'.$a[$music].'';
      echo '      </h5>';
      echo "\n    ";
      echo '</div>';
      echo "\n";
      }
    if($live2d_status == true) {
      echo '  <script src="https://assets.1ilo.com/live2d/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>';
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
  ?>
  <script>
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
  <script src="https://cdn.staticfile.org/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://fastly.jsdelivr.net/npm/mdui@1.0.0/dist/js/mdui.min.js"></script>
  <!-- 2019-2022 © Reah-随机网易云(https://music.yunair.cn) -->
  </body><?php echo '<!-- 加载耗时：'.timer_get().'-->';?></html>