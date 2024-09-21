<?php
namespace App\Infra\Data\User;

use App\Core\Repository\User\IUserFindByIdRepository;
use App\Models\User;

class UserFindByIdRepository implements IUserFindByIdRepository
{
    public function findById(int $id): User
    {
        return User::query()->find($id)
            ->get()
            ->first();
    }
}
