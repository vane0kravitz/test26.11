<?php

use App\Http\Application;
use Zend\ServiceManager\ServiceManager;


$config = require __DIR__ . '/params.php';
$dependencies = require __DIR__ . '/dependencies.php';

$container = new ServiceManager($dependencies);
$container->setService('config', $config);

$container->setFactory(PDO::class,  App\PDOFactory::class);
$container->setFactory(Application::class, Application::class);
$container->setFactory(App\Models\UserModel::class, App\Models\UserModel::class);

return $container;