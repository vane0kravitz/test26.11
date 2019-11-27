<?php

namespace Console;

use Console\Db\UsersMigration;
use Dotenv\Dotenv;

chdir(dirname(__DIR__));

$dotEnv = Dotenv::create(dirname(__DIR__));
$dotEnv->load();

(new Console())();

class Console
{
    public function __construct()
    {
        chdir(dirname(__DIR__));

        $dotEnv = Dotenv::create(dirname(__DIR__));
        $dotEnv->load();
    }

    public function __invoke(): void
    {
        $this->migrate();
    }

    public function migrate(): void
    {
        (new UsersMigration())->execute();
    }
}