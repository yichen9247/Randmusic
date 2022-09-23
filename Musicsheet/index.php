<!DOCTYPE html>
<html>
  <?php
    header('Content-type: text/html; charset=utf-8');
    include '../config.php';
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
    <?php echo '<meta property="og:url" content="'.$website_url.'/Musicsheet/" />'; ?>

	<title>随机网易云</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/mdui@1.0.2/dist/css/mdui.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.7.6/css/layui.css">
    <link rel="shortcut icon" href="https://s1.music.126.net/style/favicon.ico?v20180823" />
  </head>
  <?php
  if($dark==0) {
    echo '<body class="0" style="overflow:hidden;">';
    echo "\n";
    } else
  if($dark==1) {
    echo '<body class="mdui-theme-layout-dark" style="overflow:hidden">';
    echo "\n";
    } else 
  if($dark==2) {
    echo '<body class="0" style="overflow:hidden; background-color:black;">';
    echo "\n";
    } else {
    echo '<body class="0" style="overflow:hidden;">';
    echo "\n";
    }
  ?>
  <?php
    echo " ";
    if((!file_exists('./gedan_res/play_music.dat'))) {
      echo '<h1>数据文件不存在！</h1>';
      echo "\n    ";
      }
  ?>
 <div class="music">
  <?php
  echo "    ";
  if($type==1) {
       $a=file('./gedan_res/play_music.dat');
       $music=rand(0,count(file('./gedan_res/play_music.dat')));
       echo '<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=100% height=52 src="https://music.163.com/outchain/player?type=0&id='.$a[$music].'&auto='.$radio.'&height=32"></iframe>';
       echo "\n";
    } else 
  if($type==0) {
       $a=file('./gedan_res/play_music.dat');
       $music=rand(0,count(file('./gedan_res/play_music.dat')));
       echo '<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=100% height=110 src="https://music.163.com/outchain/player?type=0&id='.$a[$music].'&auto='.$radio.'&height=90"></iframe>';
       echo "\n";
    }
  ?>
    </div>
    <div class="layui-anim layui-anim-up">
      <button id="copyright-relode" class="btn btn-outline-info btn-lg btn-block mdui-ripple" onclick="javascript:window.location.reload();">随机网易云</button>
    </div>
  <?php
    if ($m == 1) {
      $live2d_status = false;
       } else
    if ($m == 0) {
      $vOffset = -50;
      }
    if($website_debug == 1) {
      echo '  <div class="debug"><hr/>';
      echo "\n    ";
      echo '  <h5 class="mdui-text-color-white" style="text-align:center;">';
      echo "\n  ";
      echo '      [0]ID:'.$a[$music].'';
      echo '      </h5>';
      echo "\n    ";
      echo '</div>';
      echo "\n  ";
      }
    if($live2d_status == true) {
      echo '  <script src="https://assets.1ilo.com/live2d/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>';
      echo "\n  ";
      }
    if($texiao_dianji == 1) {
      echo '<script src="https://cdn.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_dianji.js"></script>';
      echo "\n";
      } else
    if($texiao_dianji == 2) {
      echo '  <script src="https://cdn.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_aixin.js"></script>';
      echo "\n";
      } else
    if($texiao_dianji == 3) {
      echo '<script src="https://cdn.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_yinghua.js"></script>';
      echo "\n";
      } else
    if($texiao_dianji == 4) {
      echo '  <script src="https://cdn.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_zhizhu.js"></script>';
      echo "\n";
      } else
    if($texiao_dianji == 5) {
      echo '  <script src="https://cdn.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_xiannu.js"></script>';
      echo "\n";
      } else
    if($texiao_dianji == 6) {
      echo '  <script src="https://cdn.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_face.js"></script>';
      echo "\n";
      } else
    if($texiao_dianji == 7) {
      echo '  <script src="https://cdn.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_paopao.js"></script>';
      echo "\n";
      } else
    if($texiao_dianji == 8) {
      echo '  <script src="https://cdn.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_yanhua.js"></script>';
      echo "\n";
      } else
    if($texiao_dianji == 9) {
      echo '  <script src="https://cdn.jsdelivr.net/gh/yichen9247/Randmusic/assets/JavaScript/texiao_text.js"></script>';
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
  <script src="https://unpkg.com/mdui@1.0.2/dist/js/mdui.min.js"></script>
  </body></html>