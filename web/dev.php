<?php

define('ENV', 'dev');

// Common initialization
require '../init/http/bootstrap.php';

// Executing request
$container->get('proxy')->run();
