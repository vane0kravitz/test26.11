<?php declare(strict_types=1);

namespace App\Http\ApiV1;

use Psr\Http\Message\ServerRequestInterface;

class Users
{
    public function __invoke(ServerRequestInterface $request): array
    {
        return [
            'data'   => 'Users collection',
        ];
    }
}