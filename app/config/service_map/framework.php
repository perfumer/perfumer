<?php

// Perfumer default framework services
return [
    // Storage engines
    'storage.default' => [
        'shared' => true,
        'class' => 'Perfumer\\Container\\Storage\\DefaultStorage'
    ],
    'storage.file' => [
        'shared' => true,
        'class' => 'Perfumer\\Container\\Storage\\FileStorage'
    ],

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
            'cache' => '@templating.cache_dir',
            'debug' => '@templating.debug'
        ]],
        'after' => function($container, $twig) {
            $twig->addExtension($container->s('twig.framework_extension'));
            $twig->addExtension($container->s('twig.assets_extension'));
        }
    ],
    'twig.loader' => [
        'shared' => true,
        'class' => 'Twig_Loader_Filesystem',
        'arguments' => ['@templating.templates_dir']
    ],
    'twig.framework_extension' => [
        'class' => 'Perfumer\\Twig\\Extension\\FrameworkExtension',
        'arguments' => ['container']
    ],
    'twig.assets_extension' => [
        'class' => 'Perfumer\\Twig\\Extension\\AssetsExtension',
        'arguments' => ['#assets']
    ],

    // Assets
    'assets' => [
        'shared' => true,
        'class' => 'Perfumer\\Assets',
        'arguments' => [[
            'vendor_path' => '@assets.vendor_path',
            'css_path' => '@assets.css_path',
            'js_path' => '@assets.js_path'
        ]]
    ],

    // Auth
    'auth.native' => [
        'shared' => true,
        'class' => 'Perfumer\\Auth\\Core',
        'arguments' => ['#session', '#session.cookie_provider', [
            'update_gap' => '@auth.update_gap'
        ]]
    ],

    // Session
    'session.native' => [
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
    ],

    // Helper services
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