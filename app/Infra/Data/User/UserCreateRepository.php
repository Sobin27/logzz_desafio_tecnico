<?php
namespace App\Infra\Data\User;

use App\Core\Repository\User\IUserCreateRepository;
use App\Http\Request\User\UserCreateRequest;
use App\Models\User;

class UserCreateRepository implements IUserCreateRepository
{
    public function createUser(UserCreateRequest $request): User
    {
        return User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
    }
}
