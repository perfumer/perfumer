<?php

use Propel\Runtime\Propel;
use Propel\Runtime\Connection\ConnectionManagerSingle;

$project = $container->p('propel.project');
$database = $container->p('propel.database');

$propel_container = Propel::getServiceContainer();
$propel_container->setAdapterClass($project, $database);
$propel_connection_manager = new ConnectionManagerSingle();
$propel_connection_manager->setConfiguration([
    'dsn' => $container->p('propel.db_dsn'),
    'user' => $container->p('propel.db_user'),
    'password' => $container->p('propel.password'),
]);
$propel_container->setConnectionManager($project, $propel_connection_manager);

unset($project);
unset($database);