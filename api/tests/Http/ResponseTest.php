<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 12/2/19
 * Time: 8:53 PM
 */

namespace Tests\Http;

use PHPUnit\Framework\TestCase;
use Zend\Diactoros\Response\JsonResponse;

class ResponseTest extends TestCase
{
    public function testEmpty(): void
    {
        $response = new JsonResponse($body = ['body']);
        self::assertEquals($body, $response->getPayload());
        self::assertEquals(200, $response->getStatusCode());
        self::assertEquals('OK', $response->getReasonPhrase());
    }

    public function test404(): void
    {
        $response = new JsonResponse($body = ['body'], $status = 404);
        self::assertEquals($body, $response->getPayload());
        self::assertEquals($status, $response->getStatusCode());
        self::assertEquals('Not Found', $response->getReasonPhrase());
    }

    public function testHeaders(): void
    {
        $response = (new JsonResponse([]))
            ->withHeader($name = "name", $value = "value")
            ->withHeader($name1 = "name1", $value1 = "value1");

        self::assertEquals([
            'content-type' => ['application/json'],
            $name => [$value],
            $name1 => [$value1]
        ], $response->getHeaders());
    }
}
