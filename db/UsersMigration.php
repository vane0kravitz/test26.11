<?php

use App\PDOFactory;

$statement = <<<EOS
    CREATE TABLE IF NOT EXISTS users (
        id INT NOT NULL AUTO_INCREMENT,
        email VARCHAR(100) NOT NULL,
        password VARCHAR(100) NOT NULL,
        PRIMARY KEY (id)
    );
EOS;

try {
    $createTable = (new PDOFactory)()->exec($statement);
    echo "Success!\n";
} catch (\PDOException $e) {
    exit($e->getMessage());
}