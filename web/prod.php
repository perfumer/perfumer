<?php

define('ENV', 'prod');

// Common initialization
require '../src/bootstrap.php';

// Executing request
$container->get('proxy')->run();
