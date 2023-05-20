<?php
    require 'config.php';
    if ($website_webwaf['cc_project'] == true) {
        include __INCLUDE_DIR__.'/Firewall/CCProtect.php';
    }
    if ($website_webwaf['website_dissql'] == true) {
        include __INCLUDE_DIR__.'/Firewall/DisSQL.php';
    }
    require_once __DIR__.'/Include/Index.php';
?>    