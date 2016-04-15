<?php

define('ENV', 'prod');

// Common initialization
require '../init/http/bootstrap.php';

// Executing request
$container->get('proxy')->run();
