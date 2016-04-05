<?php

return [
    'bundle_resolver' => [
        'alias' => 'bundle.http_resolver'
    ],

    // Requesting
    'bundle.http_resolver' => [
        'shared' => true,
        'class' => 'Perfumer\\Framework\\Bundle\\Resolver\\HttpResolver',
        'arguments' => ['@bundle_resolver/bundles']
    ],

    'app.external_router' => [
        'shared' => true,
        'class' => 'Perfumer\\Framework\\ExternalRouter\\HttpRouter',
        'arguments' => [[
            'data_type' => 'json',
        ]]
    ],

    'app.request' => [
        'class' => 'Perfumer\\Framework\\Proxy\\Request',
        'arguments' => ['$0', '$1', '$2', '$3', [
            'prefix' => 'App\\Controller',
            'suffix' => 'Controller'
        ]]
    ],

    'app.view' => [
        'class' => 'Perfumer\\Framework\\View\\TemplateView',
        'arguments' => ['#twig', '#app.view.template_provider']
    ],

    'app.view.template_provider' => [
        'shared' => true,
        'class' => 'Perfumer\\Framework\\View\\TemplateProvider\\TwigFilesystemProvider',
        'arguments' => ['#twig.filesystem_loader', SRC_DIR . 'app/view', 'app']
    ]
];