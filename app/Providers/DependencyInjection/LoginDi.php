<?php
namespace App\Providers\DependencyInjection;

use App\Core\Repository\Login\ILoginRepository;
use App\Core\Service\Login\ILoginService;
use App\Domain\Login\LoginService;
use App\Infra\Data\Login\LoginRepository;

class LoginDi extends DependencyInjection
{
    protected function services(): array
    {
        return [
            [ILoginService::class, LoginService::class],
        ];
    }

    protected function repositories(): array
    {
        return [
            [ILoginRepository::class, LoginRepository::class],
        ];
    }
}
