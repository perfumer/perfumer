<?php

require __DIR__ . '/../vendor/autoload.php';

$application = new \App\Application\ProdHttpApplication();
$application->run();