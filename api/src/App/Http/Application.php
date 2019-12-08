<?php

namespace App\Http;


class Application
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function get($name, $path, $handler, array $options = []): void
    {
        $this->route($name, $path, $handler, ['GET'], $options);
    }

    public function post($name, $path, $handler, array $options = []): void
    {
        $this->route($name, $path, $handler, ['POST'], $options);
    }
}