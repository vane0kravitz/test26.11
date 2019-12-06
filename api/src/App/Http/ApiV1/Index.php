<?php declare(strict_types=1);

namespace App\Http\ApiV1;

use Psr\Http\Message\ServerRequestInterface;

class Index
{
    private const VERSION = 1;

    public function __invoke(ServerRequestInterface $request): array
    {
        return [
            'title'   => 'Api',
            'version' => self::VERSION,
        ];
    }
}