<?php declare(strict_types=1);

namespace App\Http\ApiV1;

use App\Models\UserModel;
use Psr\Http\Message\ServerRequestInterface;

class Users
{
    private $model;

    public function __construct(UserModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(ServerRequestInterface $request): array
    {
        return [
            'data' => $this->model->getAll(),
        ];
    }
}