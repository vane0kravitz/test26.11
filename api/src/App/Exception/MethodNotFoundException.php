<?php

namespace App\Exception;

class MethodNotFoundException extends \LogicException
{
    private $name;

    public function __construct($name)
    {
        parent::__construct('Method "' . $name . '" not found.', 0);
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
