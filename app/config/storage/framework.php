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

    // Auth settings
    'auth' => [
        'cookie_lifetime' => 86400,
        'session_lifetime' => 3600,
        'update_gap' => 1800,
        'pull_user' => false
    ],

    // LDAP settings
    'ldap' => [
        'hostname' => 'ldap.example.com',
        'port' => 389,
        'domain' => 'example.com'
    ],

    // Translator settings
    'translator' => [
        'default_locale' => 'en'
    ],
];