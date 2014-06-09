<?php

// Timezone
date_default_timezone_set('Asia/Almaty');

// Define directory constants
define('ROOT_DIR', __DIR__ . '/../');
define('APP_DIR', ROOT_DIR . 'app/');
define('TMP_DIR', ROOT_DIR . 'tmp/');
define('VENDOR_DIR', ROOT_DIR . 'vendor/');
define('WEB_DIR', ROOT_DIR . 'web/');
define('ATTACHMENTS_DIR', WEB_DIR . 'attachments/');

// Composer autoloader
require VENDOR_DIR . 'autoload.php';

// DI Container initialization
$container = new \Perfumer\Container\Core();

// Default service maps
$container->registerServiceMap(APP_DIR . 'config/service_map/framework.php');
$container->registerServiceMap(APP_DIR . 'config/service_map/shared.php');

// Environment specific service map
$container->registerServiceMap(APP_DIR . 'config/service_map/' . ENV . '.php');

// Registering storage services
$container->registerStorage('default', $container->getService('storage.default'));
$container->registerStorage('file', $container->getService('storage.file'));

// Default shared file storage parameters
$container->getService('storage.file')->registerFile(APP_DIR . 'config/storage/framework.php');
$container->getService('storage.file')->registerFile(APP_DIR . 'config/storage/shared.php');

// Environment specific file storage parameters
$container->getService('storage.file')->registerFile(APP_DIR . 'config/storage/' . ENV . '.php');

// Propel configuration
require APP_DIR . 'config/propel/initialize.php';