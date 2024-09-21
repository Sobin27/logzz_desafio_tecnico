<?php
namespace App\Infra\Data\User;

use App\Core\Repository\User\IVerifyIfEmailExistsRepository;
use App\Models\User;

class VerifyIfEmailExistsRepository implements IVerifyIfEmailExistsRepository
{
    public function verifyIfEmailExists(string $email): bool
    {
        return User::query()->where('email', $email)->exists();
    }
}
