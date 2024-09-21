<?php
namespace App\Core\Repository\User;

use App\Http\Request\User\UserCreateRequest;
use App\Models\User;

interface IUserCreateRepository
{
    public function createUser(UserCreateRequest $request): User;
}
