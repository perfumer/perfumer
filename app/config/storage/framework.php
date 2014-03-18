<?php

return [
    // Proxy settings
    'proxy' => [
        'default_url' => 'home',
        'prefixes' => []
    ],

    // Assets settings
    'assets' => [
        'css_path' => 'css',
        'js_path' => 'js'
    ],

    // Session settings
    'session' => [
        'cookie_name' => 'session',
        'cookie_lifetime' => 3600
    ],

    // Cache settings
    'cache' => [
        'lifetime' => 3600,
        'sqlite_database' => TMP_DIR . 'sqlite/cache.sql3',
        'sqlite_schema' => 'CREATE TABLE caches(id VARCHAR(127) PRIMARY KEY, expiration INTEGER, cache TEXT)'
    ]
];