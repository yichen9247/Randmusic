<!DOCTYPE html>
<html>
    <?php ob_start(); ?>
<head>
	    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	    <title>网站安全验证</title>
	    <link rel="shortcut icon" href="https://s1.music.126.net/style/favicon.ico">
	    <?php 
	        if ($website_config['website_mdui2'] == true) {
                echo '<link rel="stylesheet" href="'.$cdn_url.'/assets/mdui-v1.0.2/mdui2.main.css">';
                echo "\n    ";
	        }
	        echo '    <link rel="stylesheet" href="'.$cdn_url.'/assets/layui-v2.7.6/css/layui.css">';
            echo "\n    ";
            echo '    <link rel="stylesheet" href="'.$cdn_url.'/assets/mdui-v1.0.2/css/mdui.min.css">';
            echo "\n    ";
            echo '    <link rel="stylesheet" href="'.$cdn_url.'/assets/bootstrap-v4.6.2/css/bootstrap.min.css">';
            echo "\n";
	    ?>
	</head>
	<?php
        if ($website_config['website_recolor'] == true) {
            echo '<style type="text/css">';
            echo "\n";
            echo '    html{filter : grayscale(100%);-webkit-filter: grayscale(100%);-moz-filter: grayscale(100%);-ms-filter: grayscale(100%);-o-filter: grayscale(100%);filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);}';
            echo "\n";
            echo '  </style>';
        }
        echo "\n";
    ?>
	<body>
	    <div class="mdui-typo-display-1-opacity" style="text-align: center; margin-top: 10px">综合网站安全验证</div>
	    <button id="copyright-relode" class="btn btn-outline-info btn-lg btn-block mdui-ripple" style="margin-top: 30px" mdui-dialog="{target: '#go-verify'}">请点击此处完成验证</button>
	    <div class="mdui-dialog" id="go-verify">
	        <div class="mdui-dialog-title">综合网站安全验证</div>
	        <div class="mdui-dialog-content">为什么会跳转到此处页面，因为您的访问频率过高，触发了网站安全保护机制，请在<span style="color: red">30秒内</span>完成验证。
	        <?php
	            $verify_code = rand_code($website_webwaf['code_length']);
	            if ($website_model['model_input'] == 1) {
	                echo "   ";
                    echo '  <input type="verifycode" class="form-control" id="backcode" placeholder="请输入安全验证码：'.$verify_code.'">';
                } else 
                if ($website_model['model_input'] == 2) {
                    echo "   ";
                    echo '  <input type="text" id="verifycode" class="layui-input" placeholder="请输入安全验证码：'.$verify_code.'">';
                } else {
                    echo "  ";
                    echo '  <div class="mdui-textfield">';
                    echo "\n  ";
                    echo '                  <input class="mdui-textfield-input" type="text" id="verifycode" placeholder="请输入安全验证码：'.$verify_code.'" maxlength="'.$website_webwaf['code_length'].'" pattern="[0-9]+"/>';
                    echo "\n  ";
                    echo '                  <div class="mdui-textfield-error">请在上方输入正确的安全验证码</div>';
                    echo "\n  ";
                    echo '                  <div class="mdui-textfield-helper">请在上方输入正确的安全验证码</div>';
                    echo "\n  ";
                    echo '              </div>';
                    echo "\n  ";
                }
	        ?>
	        </div>
	        <div class="mdui-dialog-actions">
	            <button id="n_feeback" class="mdui-btn mdui-ripple" mdui-dialog-close>取消</button>
	            <button id="y_feedback" class="mdui-btn mdui-ripple" onclick="y_goverify()" mdui-dialog-confirm>提交</button>
	       </div>
	   </div>
	</body>
	<script type="text/javascript">
	    <?php 
	        if ($userkey == md5("yichen9247")) {
	            $vertoken = md5($verify_code);
                setcookie("vertoken",$vertoken,time()+1*1*1*30);
	        }
	    ?>
	</script>
	<script type"text/javascript">
        function y_goverify() {
            var codeinput = document.getElementById("verifycode");
            var codevalue = codeinput.value;
            if (codevalue != <?php echo $verify_code; ?>) {
                window.setTimeout("alert('请输入正确的安全验证码！');",500);
            } else {
                var code = <?php echo $verify_code; ?>;
                var secureban = new XMLHttpRequest();
                secureban.open('get','/versuccess.php?type=1&vertoken=' + code,true);
                secureban.send();
                window.setTimeout("alert('验证成功，请手动刷新！');",1000);
                /*var windowalert = confirm("验证成功，已解除封锁！");
                if (windowalert == true) {
                    window.setTimeout("window.location.reload();",500)；
                } else {
                    window.setTimeout("window.location.reload();",500)
                }*/
            }
        };
  </script>
  <?php
    echo '<script src="'.$cdn_url.'/assets/js/jquery.min.js"></script>';
    echo "\n";
    echo '  <script src="'.$cdn_url.'/assets/mdui-v1.0.2/js/mdui.min.js"></script>';
    echo "\n";
  ?>
</html>