<?php

return [
    'stageEnv' => true,

    'max_retries' => 3,

    'auth' => [
        'clientId' => env('UKLON_CLIENT_ID'),
        'clientSecret' => env('UKLON_CLIENT_SECRET'),
    ],
];
