<?php

// Timezone
date_default_timezone_set('Asia/Almaty');

// Define directory constants
define('ROOT_DIR', __DIR__ . '/../../');
define('TMP_DIR', ROOT_DIR . 'tmp/');
define('VENDOR_DIR', ROOT_DIR . 'vendor/');
define('WEB_DIR', ROOT_DIR . 'web/');
define('FILES_DIR', ROOT_DIR . 'files/');
define('FILES_TMP_DIR', TMP_DIR . 'files/');
define('FILES_CACHE_DIR', WEB_DIR . 'files/');

// Composer autoloader
require VENDOR_DIR . 'autoload.php';

// DI Container initialization
$container = new \Perfumer\Component\Container\Container();
$container->registerBundles(require __DIR__ . '/bundles.php');

// Propel configuration
$propel_container = $container->get('propel.service_container');
