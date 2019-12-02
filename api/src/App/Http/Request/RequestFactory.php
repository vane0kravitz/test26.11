<?php


namespace App\Http\Request;


class RequestFactory
{
    public static function fromGlobals(): Request
    {
        $request = new Request;
        $request->withQueryParams($_GET);
        $request->withParsedBody($_POST);

        return $request;
    }
}