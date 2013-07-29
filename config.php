<?php
if (!defined('ITVERWALTUNG')) die();

define('HOME_DIR', realpath(dirname(__FILE__)) . '/');
define('LIB_DIR', HOME_DIR . 'lib/');
define('PAGE_DIR', HOME_DIR . 'page/');
define('SMARTY_DIR', LIB_DIR . 'smarty/');

define('CONFIG_DB_HOST', 'localhost');
define('CONFIG_DB_NAME', 'itv_v2');
define('CONFIG_DB_USER', 'entwickler');
define('CONFIG_DB_PASS', 'entwickler12');

?>