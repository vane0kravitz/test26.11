<?php


namespace App;


interface ApiInterface
{
    public function get(int $id);
    public function getAll();
    public function create(array $request);
    public function delete(int $id);
}