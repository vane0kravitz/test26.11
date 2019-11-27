<?php

namespace App;


use App\Exception\RouteNotFoundException;
use App\Models\Model;

abstract class Api
{
    protected $model;
    protected $response;

    public $name = 'v1';
    protected $method = '';
    protected $action = '';

    public $requestUri = [];
    public $requestParams = [];

    public function __construct(Model $model, Response $response) {

        $this->response = $response;
        $this->model = $model;
        $this->requestUri = explode('/', trim($_SERVER['REQUEST_URI'],'/'));
        $this->requestParams = $_REQUEST;

        $this->method = $_SERVER['REQUEST_METHOD'];
        if ($this->method === 'POST' && array_key_exists('HTTP_X_HTTP_METHOD', $_SERVER)) {
            if ($_SERVER['HTTP_X_HTTP_METHOD'] === 'DELETE') {
                $this->method = 'DELETE';
            } else {
                throw new \LogicException('Method not found');
            }
        }
    }

    public function processRequest()
    {
        switch ($this->method) {
            case 'GET':
                if ($this->requestParams['id']) {
                    $response = $this->get($this->requestParams['id']);
                } else {
                    $response = $this->getAll();
                };
                break;
            case 'POST':
                $response = $this->create($this->requestParams);
                break;
            case 'DELETE':
                $response = $this->delete($this->requestParams['id']);
                break;
            default:
                throw new RouteNotFoundException($this->method, $this->requestParams);
                break;
        }
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

    abstract protected function get(int $id);
    abstract protected function getAll();
    abstract protected function create(array $request);
    abstract protected function delete(int $id);
}