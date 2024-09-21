<?php
namespace App\Infra\Data\User;

use App\Core\Repository\User\IUserUpdateRepository;
use App\Models\User;

class UserUpdateRepository implements IUserUpdateRepository
{
    public function updateUser(User $user): bool
    {
        return $user->save();
    }
}
