<?php

// Timezone
date_default_timezone_set('Asia/Almaty');

// Define directory constants
define('ROOT_DIR', __DIR__ . '/../');
define('SRC_DIR', ROOT_DIR . 'src/');
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

$bundler = new \Perfumer\Framework\Bundle\Bundler($container);
$bundler->importBundlesFile(SRC_DIR . 'bundles.php');

$container->registerSharedService('bundler', $bundler);

// Propel configuration
$propel_container = $container->get('propel.service_container');
