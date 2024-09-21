<?php
namespace App\Core\Service\User;

use App\Http\Request\User\UserCreateRequest;

interface IUserCreateService
{
    public function createUser(UserCreateRequest $request): bool;
}
