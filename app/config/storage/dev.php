<?php

return [
    // Propel ORM settings
    'propel' => [
        'project' => 'example',
        'database' => 'mysql',
        'dsn' => 'mysql:host=localhost;dbname=example',
        'db_user'     => 'user',
        'db_password' => 'password'
    ],

    // Twig templating settings
    'twig' => [
        'debug' => true,
        'templates_dir' => APP_DIR . 'view',
        'cache_dir' => TMP_DIR . 'twig'
    ]
];