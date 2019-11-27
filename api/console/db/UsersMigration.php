<?php

namespace Console\Db;

use App\PDOFactory;

class UsersMigration implements MigratoryInterface
{
    public function execute(): bool
    {
        $statement = <<<EOS
    CREATE TABLE IF NOT EXISTS users (
        id INT NOT NULL AUTO_INCREMENT,
        email VARCHAR(100) NOT NULL,
        password VARCHAR(100) NOT NULL,
        PRIMARY KEY (id)
    )
EOS;

        try {
            (new PDOFactory)()->exec($statement);
            print_r("Success!\n");
            return true;
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
            return false;
        }
    }
}