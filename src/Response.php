<?php

namespace App;


class Response
{
    const STATUS_OK = 200;
    const STATUS_NOT_FOUND = 404;
    const STATUS_ERROR = 500;

    public function __invoke($result, int $status = self::STATUS_OK)
    {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");

        $response['status_code_header'] = 'HTTP/1.1 ' . $status . ' OK';
        $response['body'] = json_encode($result);
    }
}