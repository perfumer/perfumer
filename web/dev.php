<?php

define('ENV', 'dev');

// Common initialization
require '../app/bootstrap.php';

// Executing request
$container->getService('proxy')->process();