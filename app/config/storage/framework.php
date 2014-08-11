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
        'update_gap' => 3600
    ],

    // LDAP settings
    'ldap' => [
        'domain' => 'domain',
        'hostname' => 'ldap.example.com',
    ],

    // I18n settings
    'i18n' => [
        'default_locale' => 'en'
    ],
];