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
        $request = new Request;

        self::assertEquals([], $request->getQueryParams());
        self::assertNull($request->getParsedBody());
    }

    public function testQueryParams(): void
    {
        $_GET = $data = [
            'name' => 'John',
            'age' => 25,
        ];

        $request = new Request;

        self::assertEquals($data, $request->getQueryParams());
        self::assertNull($request->getParsedBody());
    }

    public function testParsedBody(): void
    {
        $_POST = $data = ['body' => 'test'];

        $request = new Request;

        self::assertEquals([], $request->getQueryParams());
        self::assertEquals($data, $request->getParsedBody());
    }
}
