<?php

return [
    'bundle_resolver' => [
        'bundles' => [
            [
                'domain' => 'example.prod',
                'bundle' => 'app'
            ]
        ]
    ],

    'twig' => [
        'debug' => true,
        'cache_dir' => TMP_DIR . 'twig'
    ],
];