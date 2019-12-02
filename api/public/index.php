<?php

use Dotenv\Dotenv;
use App\ApiV1\UserController;
use App\Response;
use App\Models\UserModel;
use App\Http\Request\RequestFactory;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$dotEnv = Dotenv::create(dirname(__DIR__));
$dotEnv->load();


$request = RequestFactory::fromGlobals();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

if ($uri[1] !== 'api' || $uri[2] !== 'user') {
    return (new Response())('Not found', Response::STATUS_NOT_FOUND);
}

$api = new UserController(new UserModel());
$api->processRequest($api);