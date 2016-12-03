<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'example' => [
                    'adapter' => 'pgsql',
                    'dsn' => 'pgsql:host=localhost;port=5432;dbname=example',
                    'user' => 'postgres',
                    'password' => 'postgres',
                    'settings' => [
                        'charset' => 'utf8',
                        'queries' => [
                            'utf8' => "SET NAMES 'UTF8'"
                        ]
                    ],
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'example',
            'connections' => ['example']
        ],
        'generator' => [
            'defaultConnection' => 'example',
            'connections' => ['example']
        ]
    ]
];