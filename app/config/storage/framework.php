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
        'update_gap' => 3600,
        'pull_user' => false
    ],

    // LDAP settings
    'ldap' => [
        'hostname' => 'ldap.example.com',
        'port' => 636,
        'domain' => 'example.com'
    ],

    // I18n settings
    'i18n' => [
        'default_locale' => 'en'
    ],
];