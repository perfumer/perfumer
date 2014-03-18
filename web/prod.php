<?php

define('ENV', 'prod');

// Common initialization
require '../app/bootstrap.php';

// Executing request
echo $container->getService('proxy')->start()->sendHeaders()->getBody();