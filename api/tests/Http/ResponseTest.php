<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 12/2/19
 * Time: 8:53 PM
 */

namespace Tests\Http;

use App\Http\Request\Request;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public function testEmpty(): void
    {
        $response = new Response($body = 'body');

        self::assertEquals($body, $response->getBody());
        self::assertEquals(200, $response->getStatus());
        self::assertEquals('OK', $response->getReasonPhrase());
    }

    public function test404(): void
    {
        $response = new Response($body = 'body', $status = 404);

        self::assertEquals($body, $response->getBody());
        self::assertEquals($status, $response->getStatus());
        self::assertEquals('Not Found', $response->getReasonPhrase());
    }

    public function testHeaders(): void
    {
        $response = (new Response)
            ->withHeader($name = "name", $value = "value")
            ->withHeader($name1 = "name1", $value1 = "value1");

        self::assertEquals([$name => $value, $name1 => $value1], $response->getHeaders());
    }
}
