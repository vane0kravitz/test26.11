<?php

namespace App\ApiV1;

use App\Api;
use App\ApiInterface;
use App\Models\UserModel;

class UserController extends ApiController implements ApiInterface
{
    public function get(int $id)
    {
        return (new $this->response)($this->model->get($id));
    }

    public function getAll()
    {
        return (new $this->response)($this->model->getAll());
    }

    public function create(array $request)
    {
        return (new $this->response)($this->model->create($request));
    }

    public function delete(int $id)
    {
        return (new $this->response)($this->model->delete($id));
    }
}