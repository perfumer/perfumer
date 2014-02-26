<?php

require '../vendor/autoload.php';

$container = new \Perfumer\Container\Core();

// Root directory for project
$root_dir = __DIR__ . '/../';

$container->setParam('app.root_dir', $root_dir);
$container->setParam('app.env', 'prod');
$container->setParam('twig.debug', false);

// Common initialization for all environments
require '../app/bootstrap.php';

// Environment specific file storage parameters
$container->getService('storage.file')->registerFile($root_dir . 'app/config/storage/dev.php');

// Environment specific service map
$container->registerServiceMap($root_dir . 'app/config/service_map/prod.php');

// Propel configuration
require $root_dir . 'app/config/propel/initialize.php';

unset($root_dir);

// Executing request
try
{
    $page = $container->getService('request')->execute()->getBody();
}
catch (\Perfumer\Controller\HTTPException $e)
{
    $page = $container->getService('request')->execute('exception', 'http', [$e->getCode()])->getBody();
}

echo $page;