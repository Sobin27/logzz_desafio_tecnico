<?php
namespace App\Providers\DependencyInjection;

use App\Core\Repository\User\IUserCreateRepository;
use App\Core\Repository\User\IVerifyIfEmailExistsRepository;
use App\Core\Service\User\IUserCreateService;
use App\Domain\User\UserCreateService;
use App\Infra\Data\User\UserCreateRepository;
use App\Infra\Data\User\VerifyIfEmailExistsRepository;

class UserDi extends DependencyInjection
{

    protected function services(): array
    {
        return [
            [IUserCreateService::class, UserCreateService::class],
        ];
    }

    protected function repositories(): array
    {
        return [
            [IVerifyIfEmailExistsRepository::class, VerifyIfEmailExistsRepository::class],
            [IUserCreateRepository::class, UserCreateRepository::class],
        ];
    }
}
