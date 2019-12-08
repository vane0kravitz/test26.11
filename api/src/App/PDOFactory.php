<?php

namespace App;

use Psr\Container\ContainerInterface;

class PDOFactory
{
    public function __invoke(ContainerInterface $container): \PDO
    {
        $config = $container->get('config')['db']['mysql'];

        return new \PDO(
            $config['dsn'],
            $config['user'],
            $config['pass'],
            $config['options']

        );
    }
}
