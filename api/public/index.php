<?php declare(strict_types=1);

use Dotenv\Dotenv;
use Zend\Diactoros\ServerRequestFactory;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

(function () {
    $dotEnv = Dotenv::create(dirname(__DIR__));
    $dotEnv->load();

    /** @var \Psr\Container\ContainerInterface $container */
    $container = require 'config/container.php';

    $request = ServerRequestFactory::fromGlobals();
    $response = require 'config/routes.php';

    $emitter = new SapiEmitter;
    $emitter->emit($response($container, $request));

})();