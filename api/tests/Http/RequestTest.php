<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 12/2/19
 * Time: 8:53 PM
 */

namespace Tests\Http;

use PHPUnit\Framework\TestCase;
use Zend\Diactoros\ServerRequestFactory;

class RequestTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $_POST = [];
        $_GET = [];
    }

    public function testEmpty(): void
    {
        $request = ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);

        self::assertEquals([], $request->getQueryParams());
        self::assertEquals([], $request->getParsedBody());
    }

    public function testQueryParams(): void
    {
        $_GET = $data = [
            'name' => 'John',
            'age' => 25,
        ];

        $request = ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);

        self::assertEquals($data, $request->getQueryParams());
        self::assertEquals([], $request->getParsedBody());
    }

    public function testParsedBody(): void
    {
        $_POST = $data = ['body' => 'test'];

        $request = ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);

        self::assertEquals([], $request->getQueryParams());
        self::assertEquals($data, $request->getParsedBody());
    }
}
