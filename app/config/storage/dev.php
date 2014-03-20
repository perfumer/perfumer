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

    // Templating settings
    'templating' => [
        'debug' => true,
        'extension' => 'twig',
        'templates_dir' => APP_DIR . 'view',
        'cache_dir' => TMP_DIR . 'twig'
    ]
];