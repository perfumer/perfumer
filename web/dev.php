<?php

require __DIR__ . '/../vendor/autoload.php';

$application = new \App\Application\DevHttpApplication();
$application->run();