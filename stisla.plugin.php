<?php
/**
 * Plugin Name: Template Stisla
 * Plugin URI: -
 * Description: Template yang dibuat berdasar pada template Stisla - https://codeload.github.com/technext/stisla-1/zip/refs/tags/v2.2.0
 * Version: 1.0.0
 * Author: Drajat Hasan
 * Author URI: https://t.me/drajathasan
 */
use SLiMS\Plugins;

define('STISLA_DIR', __DIR__ . DS);
define('STISLA_TEMPLATE', STISLA_DIR . 'template' . DS);
define('STISLA_URL', SWB . 'plugins/' . basename(__DIR__) . '/template/stisla/');

Plugins::hook(Plugins::ADMIN_SESSION_AFTER_START, function() {
    global $sysconf,$dbs;

    $trace = array_pop(debug_backtrace());
    $path = str_replace(SB, '', $trace['file']);

    if (file_exists($fullPath = STISLA_DIR . 'pages/' . $path)) {
        utility::loadUserTemplate($dbs, $_SESSION['uid']??0);

        if ($sysconf['admin_template']['theme'] == 'stisla' || basename($path) === 'theme.php') {
            if (((explode('/', trim($_GET['p']??'')))[0]??'') == 'api') {
                include STISLA_DIR . 'pages/rest/routes.php';
                exit;
            }
    
            require STISLA_DIR . 'lib/helpers.php';
            include $fullPath;
        }
    }
});