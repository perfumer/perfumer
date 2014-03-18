<?php

// Timezone
date_default_timezone_set('Asia/Almaty');

// Define directory constants
define('ROOT_DIR', __DIR__ . '/../');
define('APP_DIR', ROOT_DIR . 'app/');
define('TMP_DIR', ROOT_DIR . 'tmp/');
define('VENDOR_DIR', ROOT_DIR . 'vendor/');
define('WEB_DIR', ROOT_DIR . 'web/');

// Composer autoloader
require VENDOR_DIR . 'autoload.php';

// DI Container initialization
$container = new \Perfumer\Container\Core();

// Shared files for file storage parameters
$container->getService('storage.file')->registerFile(APP_DIR . 'config/storage/framework.php');
$container->getService('storage.file')->registerFile(APP_DIR . 'config/storage/shared.php');

// Service maps
$container->registerServiceMap(APP_DIR . 'config/service_map/helpers.php');
$container->registerServiceMap(APP_DIR . 'config/service_map/framework.php');
$container->registerServiceMap(APP_DIR . 'config/service_map/shared.php');