<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'example' => [
                    'adapter'    => 'mysql',
                    'dsn'        => 'mysql:host=localhost;dbname=example',
                    'user'       => 'user',
                    'password'   => 'password',
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