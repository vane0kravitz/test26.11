<?php declare(strict_types=1);

namespace App\Http\Middleware;


use \Firebase\JWT\JWT;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

class JwtMiddleware implements MiddlewareInterface
{
    private $public_key;
    private $private_key;

    public function __construct()
    {
        $base_path = dirname($_SERVER['DOCUMENT_ROOT']) . '/';
        $this->public_key = file_get_contents($base_path . getenv('API_PUBLIC_KEY'), true);
        $this->private_key = file_get_contents($base_path . getenv('API_PRIVATE_KEY'), true);

//        $payload = [
//            "iss" => getenv('API_URL'),
//            "aud" => getenv('API_URL'),
//            "iat" => 1356999524,
//            "nbf" => 1357000000
//        ];
//        $jwt = JWT::encode($payload, $this->private_key, 'RS256'); // TODO: move to separate auth and config
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            $this->check($request->getHeaderLine('jwt-token'));
            return $handler->handle($request);
        } catch (\Exception $e) {
            return new JsonResponse([ // TODO: return 401 if debug disable
                'errors' => $e->getMessage(),
            ], 400);
        }
    }

    private function check(string $jwt_token): object
    {
        return JWT::decode($jwt_token, $this->public_key, ['RS256']);
    }
}