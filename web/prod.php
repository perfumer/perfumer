<?php

// Common initialization for all environments
require '../app/bootstrap.php';

// Environment specific file storage parameters
$container->getService('storage.file')->registerFile(APP_DIR . 'config/storage/prod.php');

// Environment specific service map
$container->registerServiceMap(APP_DIR . 'config/service_map/prod.php');

// Propel configuration
require APP_DIR . 'config/propel/initialize.php';

// Executing request
try
{
    $page = $container->getService('request')->execute()->sendHeaders()->getBody();
}
catch (\Perfumer\Controller\Exception\HTTPException $e)
{
    $page = $container->getService('request')->execute('exception', 'http', [$e->getCode()])->sendHeaders()->getBody();
}

echo $page;