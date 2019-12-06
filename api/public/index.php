<?php declare(strict_types=1);

use Http\Factory\Diactoros\ResponseFactory;
use Zend\Diactoros\ServerRequestFactory;
use League\Route\Strategy\JsonStrategy;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Route\Router;
use League\Route\RouteGroup;
use Dotenv\Dotenv;
use App\Http\Middleware\JwtMiddleware;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$dotEnv = Dotenv::create(dirname(__DIR__));
$dotEnv->load();

$request = ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);

$strategy = new JsonStrategy(new ResponseFactory);
$router = new Router;

$router->group('/api', static function (RouteGroup $route) {
    $route->get('/', App\Http\ApiV1\Index::class);
    $route->get('/users', App\Http\ApiV1\Users::class);
    $route->get('/user/{id:number}', App\Http\ApiV1\User::class);
})->setStrategy($strategy)->setScheme('http')->middleware(new JwtMiddleware);

$response = $router->dispatch($request);

$emitter = new SapiEmitter();
$emitter->emit($response);