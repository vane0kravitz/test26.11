<?php declare(strict_types=1);

use Dotenv\Dotenv;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\ResponseFactory;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$dotEnv = Dotenv::create(dirname(__DIR__));
$dotEnv->load();

$request = ServerRequestFactory::fromGlobals();
$response = (new JsonResponse(['data' => 'json data']));

echo $response->getBody();