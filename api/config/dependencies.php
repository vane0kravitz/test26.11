<?php


return [
    'dependencies' => [
        'invokables' => [
            App\Http\ApiV1\Index::class,
            App\Http\ApiV1\User::class,
            App\Http\ApiV1\Users::class,
        ],
        'factories' => [
            App\Http\Middleware\JwtMiddleware::class,
        ]
    ]
];