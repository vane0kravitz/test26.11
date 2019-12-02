<?php


namespace App\Http;


use Psr\Http\Message\ResponseInterface;

class ResponseSender
{
    public function send(ResponseInterface $response): void
    {
        header(sprintf(
            'HTTP/%s %d %s',
            $response->getProtocolVersion(),
            $response->getStatusCode(),
            $response->getReasonPhrase()
        ));
        foreach ($response->getHeaders() as $header => $values) {
            foreach ($values as $value) {
                header(sprintf('%s: %s', $header, $value), false);
            }
        }
        echo $response->getBody()->getContents();
    }
}