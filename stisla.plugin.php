<?php
/**
 * Plugin Name: Template Stisla
 * Plugin URI: -
 * Description:-
 * Version: 1.0.0
 * Author: Drajat Hasan
 * Author URI: https://t.me/drajathasan
 */
use SLiMS\Plugins;

define('STISLA_DIR', __DIR__ . DS);
define('STISLA_TEMPLATE', STISLA_DIR . 'template');
define('STISLA_URL', SWB . 'plugins/' . basename(__DIR__) . '/template/stisla/');

Plugins::hook(Plugins::ADMIN_SESSION_AFTER_START, function() {
    global $sysconf,$dbs;
    $trace = array_pop(debug_backtrace());
    $path = str_replace(SB, '', $trace['file']);

    if (file_exists($fullPath = STISLA_DIR . 'pages/' . $path)) {
        include $fullPath;
    }
});