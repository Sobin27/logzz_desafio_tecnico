<?php
namespace App\Core\Service\User;

use App\Http\Request\User\UserUpdateRequest;

interface IUserUpdateService
{
    public function updateUser(UserUpdateRequest $request): bool;
}
