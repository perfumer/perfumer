<?php

// Perfumer default framework services
return [
    // Storage engines
    'storage.default' => [
        'shared' => true,
        'class' => 'Perfumer\\Component\\Container\\Storage\\DefaultStorage'
    ],
    'storage.file' => [
        'shared' => true,
        'class' => 'Perfumer\\Component\\Container\\Storage\\FileStorage'
    ],
    'storage.database' => [
        'shared' => true,
        'class' => 'Perfumer\\Component\\Container\\Storage\\DatabaseStorage'
    ],

    // Requesting
    'external.http_router' => [
        'shared' => true,
        'class' => 'Perfumer\\MVC\\ExternalRouter\\HttpRouter'
    ],
    'internal.directory_router' => [
        'shared' => true,
        'class' => 'Perfumer\\MVC\\InternalRouter\\DirectoryRouter'
    ],
    'proxy' => [
        'shared' => true,
        'class' => 'Perfumer\\MVC\\Proxy\\Core',
        'arguments' => ['#external.http_router', '#internal.directory_router'],
        'after' => function(\Perfumer\Component\Container\Core $container, \Perfumer\MVC\Proxy\Core $proxy) {
            $proxy->inject('_container', $container);
        }
    ],

    // Propel ORM
    'propel.service_container' => [
        'shared' => true,
        'class' => 'Propel\\Runtime\\Propel',
        'static' => 'getServiceContainer',
        'after' => function(\Perfumer\Component\Container\Core $container, $service_container) {
            $project = $container->getParam('propel.project');
            $database = $container->getParam('propel.database');
            $connection_manager = $container->getService('propel.connection_manager');
            $service_container->setAdapterClass($project, $database);
            $service_container->setConnectionManager($project, $connection_manager);
        }
    ],
    'propel.connection_manager' => [
        'class' => 'Propel\\Runtime\\Connection\\ConnectionManagerSingle',
        'after' => function(\Perfumer\Component\Container\Core $container, \Propel\Runtime\Connection\ConnectionManagerSingle $connection_manager) {
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
        'class' => 'Perfumer\\MVC\\View\\Core',
        'arguments' => ['#twig', '#view_router', [
            'extension' => '@view.extension'
        ]]
    ],

    'view_router' => [
        'shared' => true,
        'class' => 'Perfumer\\MVC\\View\\Router\\IdenticalRouter'
    ],

    // Twig
    'twig' => [
        'shared' => true,
        'class' => 'Twig_Environment',
        'arguments' => ['#twig.loader', [
            'cache' => '@twig.cache_dir',
            'debug' => '@twig.debug'
        ]],
        'after' => function(\Perfumer\Component\Container\Core $container, \Twig_Environment $twig) {
            $twig->addExtension($container->getService('twig.framework_extension'));
            $twig->addExtension($container->getService('twig.assets_extension'));
        }
    ],
    'twig.loader' => [
        'shared' => true,
        'class' => 'Twig_Loader_Filesystem',
        'arguments' => ['@twig.templates_dir']
    ],
    'twig.framework_extension' => [
        'class' => 'Perfumer\\MVC\\View\\TwigExtension\\FrameworkExtension',
        'arguments' => ['container']
    ],
    'twig.assets_extension' => [
        'class' => 'Perfumer\\Component\\Assets\\TwigExtension',
        'arguments' => ['#assets']
    ],

    // Assets
    'assets' => [
        'shared' => true,
        'class' => 'Perfumer\\Component\\Assets\\Core',
        'arguments' => [[
            'source_path' => '@assets.source_path',
            'web_path' => '@assets.web_path',
            'combine' => '@assets.combine',
            'minify' => '@assets.minify',
            'version' => '@assets.version'
        ]]
    ],

    // Auth
    'auth.database' => [
        'shared' => true,
        'class' => 'Perfumer\\Component\\Auth\\Authorization\\DatabaseAuthorization',
        'arguments' => ['#session', '#auth.token.cookie_handler', [
            'update_gap' => '@auth.update_gap'
        ]]
    ],

    'auth.ldap' => [
        'shared' => true,
        'class' => 'Perfumer\\Component\\Auth\\Authorization\\LdapAuthorization',
        'arguments' => ['#session', '#auth.token.cookie_handler', [
            'update_gap' => '@auth.update_gap',
            'ldap_hostname' => '@ldap.hostname',
            'ldap_port' => '@ldap.port',
            'ldap_domain' => '@ldap.domain',
            'pull_user' => '@auth.pull_user'
        ]]
    ],

    'auth.token.cookie_handler' => [
        'shared' => true,
        'class' => 'Perfumer\\Component\\Auth\\TokenHandler\\CookieHandler',
        'arguments' => ['#cookie', '@auth.cookie_lifetime']
    ],

    // Session
    'session' => [
        'shared' => true,
        'class' => 'Perfumer\\Component\\Session\\Core',
        'arguments' => ['#cache.memcache', [
            'lifetime' => '@auth.session_lifetime'
        ]]
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
        'after' => function(\Perfumer\Component\Container\Core $container, \Stash\Driver\Memcache $driver) {
            $driver->setOptions();
        }
    ],
    'cache.ephemeral_driver' => [
        'shared' => true,
        'class' => 'Stash\\Driver\\Ephemeral'
    ],

    // Translator
    'translator' => [
        'shared' => true,
        'class' => 'Perfumer\\Component\\Translator\\Core',
        'arguments' => ['#cache', [
            'locale' => '@translator.default_locale'
        ]]
    ],

    // Validation
    'validation' => [
        'class' => 'Perfumer\\Component\\Validation\\Core',
        'arguments' => ['#translator']
    ],

    // Console
    'console.application' => [
        'shared' => true,
        'class' => 'Perfumer\\MVC\\Console\\Application',
        'arguments' => ['#console.single_application_command']
    ],

    'console.single_application_command' => [
        'shared' => true,
        'class' => 'Perfumer\\MVC\\Console\\SingleApplicationCommand',
        'arguments' => ['#console.proxy']
    ],

    'console.proxy' => [
        'shared' => true,
        'class' => 'Perfumer\\MVC\\Console\\Proxy',
        'arguments' => ['container']
    ],

    'console.request' => [
        'class' => 'Perfumer\\MVC\\Console\\Request'
    ],

    // Helper services
    'cookie' => [
        'shared' => true,
        'class' => 'Perfumer\\Helper\\Cookie'
    ]
];