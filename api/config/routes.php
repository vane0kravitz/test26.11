<?php declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Http\Factory\Diactoros\ResponseFactory;
use League\Route\Strategy\JsonStrategy;
use League\Route\Router;
use League\Route\RouteGroup;
use App\Http\Middleware\JwtMiddleware;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


return function (ContainerInterface $container, ServerRequestInterface $request): ResponseInterface
{
    $strategy = new JsonStrategy(new ResponseFactory);
    $router = new Router;

    $router->group('/api', static function (RouteGroup $route) {
        $route->get('/', App\Http\ApiV1\Index::class);
        $route->get('/users', App\Http\ApiV1\Users::class);
        $route->get('/user/{id:number}', App\Http\ApiV1\User::class);
    })->setStrategy($strategy)->setScheme('http')->middleware(new JwtMiddleware);

    return $router->dispatch($request);

};
