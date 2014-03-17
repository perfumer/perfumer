<?php

// Perfumer default framework services
return [
    // Requesting
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

    // Template engine
    'templating' => [
        'alias' => 'twig'
    ],

    // Twig
    'twig' => [
        'shared' => true,
        'class' => 'Twig_Environment',
        'arguments' => ['#twig.loader', [
            'cache' => '@twig.cache_dir',
            'debug' => '@twig.debug'
        ]],
        'after' => function($container, $twig) {
            $twig->addExtension($container->s('twig.container_extension'));
            $twig->addExtension($container->s('twig.framework_extension'));
        }
    ],
    'twig.loader' => [
        'shared' => true,
        'class' => 'Twig_Loader_Filesystem',
        'arguments' => ['@twig.templates_dir']
    ],
    'twig.framework_extension' => [
        'class' => 'Perfumer\\Twig\\Extension\\FrameworkExtension',
        'arguments' => ['#proxy']
    ],
    'twig.container_extension' => [
        'class' => 'Perfumer\\Twig\\Extension\\ContainerExtension',
        'arguments' => ['container']
    ],

    // Assets
    'assets' => [
        'shared' => true,
        'class' => 'Perfumer\\Assets',
        'arguments' => [[
            'css_path' => '@assets.css_path',
            'js_path' => '@assets.js_path'
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
        'arguments' => ['#cookie', '@session.cookie_name']
    ],

    // Cache
    'cache.dummy' => [
        'shared' => true,
        'class' => 'Perfumer\\Cache\\DummyCache'
    ],
    'cache.php' => [
        'shared' => true,
        'class' => 'Perfumer\\Cache\\PhpCache'
    ],
    'cache.sqlite' => [
        'shared' => true,
        'class' => 'Perfumer\\Cache\\SqliteCache',
        'arguments' => ['@cache.sqlite_database', '@cache.sqlite_schema', '@cache.lifetime']
    ]
];