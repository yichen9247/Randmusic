<div class="config-error-message">
    <div class="mdui-typo-display-1-opacity" style="text-align: center;">网站配置信息异常</div>
    <?php
    function throwError($message) {
        echo '<div class="mdui-typo-caption-opacity" style="text-align: center;">'.$message.'</div>';
        echo "\n";
        
    }
    ?>
</div>