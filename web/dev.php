<?php

// Common initialization for all environments
require '../app/bootstrap.php';

// Environment specific file storage parameters
$container->getService('storage.file')->registerFile(APP_DIR . 'config/storage/dev.php');

// Environment specific service map
$container->registerServiceMap(APP_DIR . 'config/service_map/dev.php');

// Propel configuration
require APP_DIR . 'config/propel/initialize.php';

// Executing request
echo $container->getService('request')->execute()->sendHeaders()->getBody();