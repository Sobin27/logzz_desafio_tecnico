<?php
namespace App\Providers\DependencyInjection;

use App\Core\Repository\User\IUserCreateRepository;
use App\Core\Repository\User\IUserFindByIdRepository;
use App\Core\Repository\User\IUserUpdateRepository;
use App\Core\Repository\User\IVerifyIfEmailExistsRepository;
use App\Core\Service\User\IUserCreateService;
use App\Core\Service\User\IUserUpdateService;
use App\Domain\User\UserCreateService;
use App\Domain\User\UserUpdateService;
use App\Infra\Data\User\UserCreateRepository;
use App\Infra\Data\User\UserFindByIdRepository;
use App\Infra\Data\User\UserUpdateRepository;
use App\Infra\Data\User\VerifyIfEmailExistsRepository;

class UserDi extends DependencyInjection
{

    protected function services(): array
    {
        return [
            [IUserCreateService::class, UserCreateService::class],
            [IUserUpdateService::class, UserUpdateService::class],
        ];
    }

    protected function repositories(): array
    {
        return [
            [IVerifyIfEmailExistsRepository::class, VerifyIfEmailExistsRepository::class],
            [IUserCreateRepository::class, UserCreateRepository::class],
            [IUserUpdateRepository::class, UserUpdateRepository::class],
            [IUserFindByIdRepository::class, UserFindByIdRepository::class],
        ];
    }
}
