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
    ],

    // Assets settings
        'assets' => [
        'vendor_path' => VENDOR_DIR . 'bower',
        'source_path' => TMP_DIR . 'assets',
        'web_path' => WEB_DIR,
        'combine' => false
    ]
];