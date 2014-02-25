<?php

return [
    'request' => [
        'class' => 'Perfumer\\Request',
        'arguments' => ['container']
    ],
    'response' => [
        'class' => 'Perfumer\\Response'
    ],
    'assets' => [
        'shared' => true,
        'class' => 'Perfumer\\Assets',
        'arguments' => [[
            'source_dir' => '@assets.source_dir',
            'cache_dir' => '@assets.cache_dir',
            'web_path' => '@assets.web_path'
        ]]
    ],

    // Auth
    'auth' => [
        'shared' => true,
        'class' => 'Perfumer\\Auth\\Core',
        'arguments' => ['#session']
    ],

    // Session
    'session' => [
        'shared' => true,
        'class' => 'Perfumer\\Session\\NativeSession',
        'arguments' => ['#cookie', '@session.cookie_name', '@session.cookie_lifetime']
    ],
    'session.cookie_provider' => [
        'class' => 'Perfumer\\Session\\Token\\Provider\\CookieProvider',
        'arguments' => ['#cookie']
    ],

    // Template engine
    'twig' => [
        'shared' => true,
        'class' => 'Twig_Environment',
        'arguments' => ['#twig.loader', [
            'cache' => '@twig.cache_dir',
            'debug' => '@twig.debug'
        ]]
    ],
    'twig.loader' => [
        'shared' => true,
        'class' => 'Twig_Loader_Filesystem',
        'arguments' => ['@twig.templates_dir']
    ],

    // Helpers
    'cookie' => [
        'shared' => true,
        'class' => 'Perfumer\\Helper\\Cookie'
    ],
];