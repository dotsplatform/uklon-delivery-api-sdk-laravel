<?php

return [
    'stageEnv' => true,

    'max_retries' => 3,

    'auth' => [
        'appUid' => env('UKLON_APP_UID'),
        'clientId' => env('UKLON_CLIENT_ID'),
        'clientSecret' => env('UKLON_CLIENT_SECRET'),
    ],

    'webhooks' => [
        'order' => [
            'url' => env('UKLON_ORDER_WEBHOOK_URL'),
        ],
        'driver' => [
            'url' => env('UKLON_DRIVER_WEBHOOK_URL'),
        ],
    ],
];
