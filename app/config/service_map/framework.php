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

    // Propel ORM
    'propel.service_container' => [
        'shared' => true,
        'class' => 'Propel\\Runtime\\Propel',
        'static_init' => 'getServiceContainer',
        'after' => function(\Perfumer\Container\Core $container, $service_container) {
            $project = $container->getParam('propel.project');
            $database = $container->getParam('propel.database');
            $connection_manager = $container->getService('propel.connection_manager');
            $service_container->setAdapterClass($project, $database);
            $service_container->setConnectionManager($project, $connection_manager);
        }
    ],
    'propel.connection_manager' => [
        'class' => 'Propel\\Runtime\\Connection\\ConnectionManagerSingle',
        'after' => function(\Perfumer\Container\Core $container, \Propel\Runtime\Connection\ConnectionManagerSingle $connection_manager) {
            $connection_manager->setConfiguration([
                'dsn' => $container->getParam('propel.dsn'),
                'user' => $container->getParam('propel.db_user'),
                'password' => $container->getParam('propel.db_password'),
                'settings' => [
                    'charset' => 'utf8',
                ]
            ]);
        }
    ],

    // View
    'view' => [
        'class' => 'Perfumer\\View\\Core',
        'arguments' => ['#twig']
    ],

    // Twig
    'twig' => [
        'shared' => true,
        'class' => 'Twig_Environment',
        'arguments' => ['#twig.loader', [
            'cache' => '@twig.cache_dir',
            'debug' => '@twig.debug'
        ]],
        'after' => function(\Perfumer\Container\Core $container, \Twig_Environment $twig) {
            $twig->addExtension($container->s('twig.framework_extension'));
            $twig->addExtension($container->s('twig.assets_extension'));
        }
    ],
    'twig.loader' => [
        'shared' => true,
        'class' => 'Twig_Loader_Filesystem',
        'arguments' => ['@twig.templates_dir']
    ],
    'twig.framework_extension' => [
        'class' => 'Perfumer\\View\\TwigExtension\\FrameworkExtension',
        'arguments' => ['container']
    ],
    'twig.assets_extension' => [
        'class' => 'Perfumer\\View\\TwigExtension\\AssetsExtension',
        'arguments' => ['#assets']
    ],

    // Assets
    'assets' => [
        'shared' => true,
        'class' => 'Perfumer\\Assets',
        'arguments' => ['#cache', [
            'source_path' => '@assets.source_path',
            'web_path' => '@assets.web_path',
            'combine' => '@assets.combine'
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
    'auth.api' => [
        'shared' => true,
        'class' => 'Perfumer\\Auth\\Core',
        'arguments' => ['#session', '#session.header_provider', [
            'update_gap' => '@auth.update_gap'
        ]]
    ],

    // Session
    'session.native' => [
        'shared' => true,
        'class' => 'Perfumer\\Session\\NativeSession',
        'arguments' => ['#cookie', '@auth.session_cookie_name', '@auth.session_cookie_lifetime']
    ],
    'session.cookie_provider' => [
        'class' => 'Perfumer\\Session\\Token\\Provider\\CookieProvider',
        'arguments' => ['@auth.session_cookie_name']
    ],
    'session.header_provider' => [
        'class' => 'Perfumer\\Session\\Token\\Provider\\HeaderProvider',
        'arguments' => ['@auth.api_token_name']
    ],

    // Cache
    'cache.memcache' => [
        'shared' => true,
        'class' => 'Stash\\Pool',
        'arguments' => ['#cache.memcache_driver']
    ],
    'cache.ephemeral' => [
        'shared' => true,
        'class' => 'Stash\\Pool',
        'arguments' => ['#cache.ephemeral_driver']
    ],
    'cache.memcache_driver' => [
        'shared' => true,
        'class' => 'Stash\\Driver\\Memcache',
        'after' => function(\Perfumer\Container\Core $container, \Stash\Driver\Memcache $driver) {
            $driver->setOptions();
        }
    ],
    'cache.ephemeral_driver' => [
        'shared' => true,
        'class' => 'Stash\\Driver\\Ephemeral'
    ],

    // I18n
    'i18n' => [
        'shared' => true,
        'class' => 'Perfumer\\I18n\\Core',
        'arguments' => ['#cache', [
            'locale' => '@i18n.default_locale'
        ]]
    ],

    // Validator
    'validator' => [
        'class' => 'Perfumer\\Validator\\Core',
        'arguments' => ['#i18n']
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