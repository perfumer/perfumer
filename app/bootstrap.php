<?php

// Default url if "/" path info provided
$container->setParam('app.default_url', 'home');

// Parameters for assets service
$container->setParamGroup('assets', [
    'source_dir' => $root_dir . 'app/assets',
    'cache_dir' => $root_dir . 'www/assets',
    'web_path' => 'assets'
]);

// Parameters for Twig template engine
$container->setParamGroup('twig', [
    'templates_dir' => $root_dir . 'app/view',
    'cache_dir' => $root_dir . 'tmp/twig'
]);

// Shared file for file storage parameters
$container->getService('storage.file')->registerFile($root_dir . 'app/config/storage/shared.php');

// Shared service map
$container->registerServiceMap($root_dir . 'app/config/service_map/shared.php');