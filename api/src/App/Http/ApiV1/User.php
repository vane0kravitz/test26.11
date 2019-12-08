<?php declare(strict_types=1);

namespace App\Http\ApiV1;

use App\Models\UserModel;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class User
{
    private $model;

    public function __construct(UserModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(ServerRequestInterface $request, array $arguments = [])
    {
        if (!$arguments['id']) {
             return new JsonResponse('User not found', 404); // TODO: response structure ?
        }

        return [
            'data'   => $this->model->get($arguments['id'])
        ];
    }
}