<?php

define('ENV', 'dev');

// Common initialization
require '../src/bootstrap.php';

// Executing request
$container->get('proxy')->run();
