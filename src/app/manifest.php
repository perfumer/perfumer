<?php

return [
    'name' => 'app',
    'description' => '',
    'service_maps' => [
        APP_DIR . 'config/service_map/framework.php',
        APP_DIR . 'config/service_map/shared.php',
        APP_DIR . 'config/service_map/' . ENV . '.php'
    ],
    'storages' => [],
    'config_files' => [
        APP_DIR . 'config/storage/framework.php',
        APP_DIR . 'config/storage/shared.php',
        APP_DIR . 'config/storage/' . ENV . '.php'
    ],
    'services' => [
        'internal_router' => 'internal_router',
        'view_router' => 'view_router',
    ]
];