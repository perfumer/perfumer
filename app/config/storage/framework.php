<?php

return [
    // Proxy settings
    'proxy' => [
        'data_type' => 'query_string',
        'default_url' => 'home',
        'prefixes' => []
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
        'memcache_server' => [
            'host' => 'localhost',
            'port' => 11211,
            'persistent' => false,
            'weight' => 1,
            'timeout' => 1,
            'retry_interval' => 15,
            'status' => true
        ]
    ],

    // I18n settings
    'i18n' => [
        'default_locale' => 'en'
    ],
];