<?php

/*
 * Your own services.
 * This service map is registered at the last order (but before environment specific service maps),
 * so you can overwrite any default framework services here.
 */
return [
    'external_router' => [
        'alias' => 'external.http_router'
    ],

    'internal_router' => [
        'alias' => 'internal.directory_router'
    ],

    'auth' => [
        'alias' => 'auth.database'
    ],
];