<?php declare(strict_types=1);

namespace App\Http\ApiV1;

use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class User
{
    public function __invoke(ServerRequestInterface $request, array $arguments = [])
    {
        if (!$arguments['id']) {
             return new JsonResponse('User not found', 404); // TODO: response structure ?
        }

        // Model -> fetch user

        return [
            'data'   => 'User id: ' . $arguments['id'],
        ];
    }
}