<?php

define('ENV', 'prod');

// Common initialization
require '../app/bootstrap.php';

// Executing request
$container->getService('proxy')->process();