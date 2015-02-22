<?php

// Timezone
date_default_timezone_set('Asia/Almaty');

// Define directory constants
define('ROOT_DIR', __DIR__ . '/../');
define('APP_DIR', ROOT_DIR . 'app/');
define('TMP_DIR', ROOT_DIR . 'tmp/');
define('VENDOR_DIR', ROOT_DIR . 'vendor/');
define('WEB_DIR', ROOT_DIR . 'web/');
define('FILES_DIR', ROOT_DIR . 'files/');
define('FILES_TMP_DIR', TMP_DIR . 'files/');
define('FILES_CACHE_DIR', WEB_DIR . 'files/');

// Composer autoloader
require VENDOR_DIR . 'autoload.php';

// DI Container initialization
$container = new \Perfumer\Component\Container\Core();

// Default service maps
$container->registerServiceMap(APP_DIR . 'config/service_map/framework.php');
$container->registerServiceMap(APP_DIR . 'config/service_map/shared.php');

// Environment specific service map
$container->registerServiceMap(APP_DIR . 'config/service_map/' . ENV . '.php');

// Registering storage services
$container->registerStorage('default', $container->getService('storage.default'));
$container->registerStorage('file', $container->getService('storage.file'));
$container->registerStorage('database', $container->getService('storage.database'));

// Default shared file storage parameters
$container->getService('storage.file')->registerFile(APP_DIR . 'config/storage/framework.php');
$container->getService('storage.file')->registerFile(APP_DIR . 'config/storage/shared.php');

// Environment specific file storage parameters
$container->getService('storage.file')->registerFile(APP_DIR . 'config/storage/' . ENV . '.php');

// Propel configuration
$propel_container = $container->getService('propel.service_container');