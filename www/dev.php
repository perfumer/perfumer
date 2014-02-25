<?php

require '../vendor/autoload.php';

$container = new \Perfumer\Container\Core();

// Root directory for project
$root_dir = __DIR__ . '/../';

$container->setParam('app.root_dir', $root_dir);
$container->setParam('app.env', 'dev');
$container->setParam('twig.debug', true);

// Common initialization for all environments
require '../app/bootstrap.php';

// Environment specific file storage parameters
$container->getService('storage.file')->registerFile($root_dir . 'app/config/storage/dev.php');

// Environment specific service map
$container->registerServiceMap($root_dir . 'app/config/service_map/dev.php');

unset($root_dir);

// Executing request
echo $container->getService('request')->execute()->getBody();