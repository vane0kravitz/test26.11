<?php

namespace App\Models;


use App\PDOFactory;

abstract class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = (new PDOFactory)();
    }
}