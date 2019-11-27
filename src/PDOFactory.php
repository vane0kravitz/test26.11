<?php

namespace App;

class PDOFactory
{
    public function __invoke(): \PDO
    {
        $dsn = 'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_DATABASE');
        return new \PDO(
            $dsn,
            getenv('DB_USER'),
            getenv('DB_PASSWORD')
        );
    }
}
