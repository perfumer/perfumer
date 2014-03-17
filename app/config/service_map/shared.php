<?php

return [
    'proxy' => [
        'shared' => true,
        'class' => 'Perfumer\\Proxy\\Core',
        'arguments' => ['container']
    ],
    'request' => [
        'class' => 'Perfumer\\Proxy\\Request',
        'arguments' => ['container']
    ],
    'response' => [
        'class' => 'Perfumer\\Proxy\\Response'
    ],
    'assets' => [
        'shared' => true,
        'class' => 'Perfumer\\Assets',
        'arguments' => [[
            'css_path' => '@assets.css_path',
            'js_path' => '@assets.js_path'
        ]]
    ],
    'stock' => [
        'shared' => true,
        'class' => 'Perfumer\\Stock'
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
        'arguments' => ['#cookie', '@session.cookie_name']
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
    'twig.proxy_extension' => [
        'class' => 'Perfumer\\Twig\\Extension\\ProxyExtension',
        'arguments' => ['#proxy']
    ],

    // Helpers
    'arr' => [
        'shared' => true,
        'class' => 'Perfumer\\Helper\\Arr'
    ],
    'cookie' => [
        'shared' => true,
        'class' => 'Perfumer\\Helper\\Cookie'
    ],
    'feed' => [
        'shared' => true,
        'class' => 'Perfumer\\Helper\\Feed'
    ],
];