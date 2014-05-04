<?php

return [
    // Proxy settings
    'proxy' => [
        'data_type' => 'query_string',
        'default_url' => 'saas/home',
        'prefixes' => ['company']
    ],

    // Auth and session settings
    'auth' => [
        'update_gap' => 3600,
        'session_cookie_name' => 'session',
        'session_cookie_lifetime' => 3600,
        'api_secret' => '',
        'api_token_name' => 'API_TOKEN',
        'api_secret_name' => 'API_SECRET'
    ],

    // Cache settings
    'cache' => [
        'lifetime' => 3600,
        'sqlite_database' => TMP_DIR . 'sqlite/cache.sql3',
        'sqlite_schema' => 'CREATE TABLE caches(id VARCHAR(127) PRIMARY KEY, expiration INTEGER, cache TEXT)',
        'memcache_server' => [
            'host' => 'localhost',
            'port' => 11211,
            'persistent' => false,
            'weight' => 1,
            'timeout' => 1,
            'retry_interval' => 15,
            'status' => true
        ]
    ]
];