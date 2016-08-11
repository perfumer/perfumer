<?php

return [
    '_domains' => [
        [
            'domain' => 'example.prod',
            'bundle' => 'app'
        ]
    ],

    'twig' => [
        'debug' => true,
        'cache_dir' => TMP_DIR . 'twig'
    ],
];