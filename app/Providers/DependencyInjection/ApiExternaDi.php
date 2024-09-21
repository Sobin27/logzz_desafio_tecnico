<?php
namespace App\Providers\DependencyInjection;

use App\Core\ApiExterna\IApiExternaRepository;
use App\Infra\ApiExterna\ApiExternaRepository;

class ApiExternaDi extends DependencyInjection
{
    protected function services(): array
    {
        return [];
    }

    protected function repositories(): array
    {
        return [
            [IApiExternaRepository::class, ApiExternaRepository::class]
        ];
    }
}
