<?php

return [
    // Proxy settings
    'proxy' => [
        'default_url' => 'home',
        'prefixes' => []
    ],

    // Assets settings
    'assets' => [
        'vendor_path' => 'vendor',
        'css_path' => 'css',
        'js_path' => 'js'
    ],

    // Auth settings
    'auth' => [
        'enabled' => true,
        'update_gap' => 3600
    ],

    // Session settings
    'session' => [
        'cookie_name' => 'session',
        'cookie_lifetime' => 3600,
        'api_token_name' => 'API_TOKEN',
        'api_secret_name' => 'API_SECRET'
    ],

    // Cache settings
    'cache' => [
        'lifetime' => 3600,
        'sqlite_database' => TMP_DIR . 'sqlite/cache.sql3',
        'sqlite_schema' => 'CREATE TABLE caches(id VARCHAR(127) PRIMARY KEY, expiration INTEGER, cache TEXT)'
    ]
];