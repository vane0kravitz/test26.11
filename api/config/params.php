<?php

return [
    'debug' => true,
    'db' => [
        'mysql' => [
            'dsn'       => 'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_DATABASE'),
            'user'      => getenv('DB_USER'),
            'pass'      => getenv('DB_PASSWORD'),
            'options'   => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        ]
    ]
];