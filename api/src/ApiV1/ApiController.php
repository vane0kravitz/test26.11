<?php

namespace App\ApiV1;


use App\ApiInterface;
use App\Models\Model;
use App\Response;

abstract class ApiController
{
    protected $model;
    protected $response;

    public $name = 'v1';
    protected $method = '';

    public $requestUri = [];
    public $requestParams = [];

    public function __construct(Model $model)
    {
        $this->response = new Response;
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

    public function processRequest(ApiInterface $api): void
    {
        $response = false;
        switch ($this->method) {
            case 'GET':
                if ($this->requestParams['id']) {
                    $response = $api->get($this->requestParams['id']);
                } else {
                    $response = $api->getAll();
                };
                break;
            case 'POST':
                $response = $api->create($this->requestParams);
                break;
            case 'DELETE':
                $response = $api->delete($this->requestParams['id']);
                break;
            default:
                (new Response())('Not found', Response::STATUS_NOT_FOUND);
                break;
        }
        (new Response())($response, Response::STATUS_OK);
    }
}