<?php

return [
    // Proxy settings
    'proxy' => [
        'default_url' => 'home',
        'prefixes' => [],
        'data_type' => 'query_string',
        'auto_trim' => true,
        'auto_null' => true
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

    // I18n settings
    'i18n' => [
        'default_locale' => 'en'
    ],
];