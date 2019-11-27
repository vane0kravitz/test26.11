<?php

namespace App\ApiV1;

use App\Api;
use App\Models\UserModel;

class UserController extends Api
{
    public $name = 'v1';
    private $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function get(int $id)
    {
        return (new $this->response)($this->userModel->get($id));
    }

    public function getAll()
    {
        return (new $this->response)($this->userModel->getAll());
    }

    public function create(array $request)
    {
        return (new $this->response)($this->userModel->create($request));
    }

    public function delete(int $id)
    {
        return (new $this->response)($this->userModel->delete($id));
    }
}