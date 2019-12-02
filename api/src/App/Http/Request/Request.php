<?php


namespace App\Http\Request;


class Request
{
    private $queryParams;
    private $parsedBody;

    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    public function withQueryParams(array $query = []): void
    {
        $this->queryParams = $query;
    }

    public function withParsedBody($parsedBody = null): void
    {
        $this->parsedBody = $parsedBody;
    }

    public function getParsedBody()
    {
        return $this->parsedBody;
    }
}