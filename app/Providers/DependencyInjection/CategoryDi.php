<?php
namespace App\Providers\DependencyInjection;

use App\Core\Repository\Category\ICategoryCreateRepository;
use App\Core\Repository\Category\ICategoryFindByIdRepository;
use App\Core\Repository\Category\ICategoryUpdateRepository;
use App\Core\Service\Category\ICategoryCreateService;
use App\Core\Service\Category\ICategoryUpdateService;
use App\Domain\Category\CategoryCreateService;
use App\Domain\Category\CategoryUpdateService;
use App\Infra\Data\Category\CategoryCreateRepository;
use App\Infra\Data\Category\CategoryFindByIdRepository;
use App\Infra\Data\Category\CategoryUpdateRepository;

class CategoryDi extends DependencyInjection
{
    protected function services(): array
    {
        return [
            [ICategoryCreateService::class, CategoryCreateService::class],
            [ICategoryUpdateService::class, CategoryUpdateService::class],
        ];
    }

    protected function repositories(): array
    {
        return [
            [ICategoryCreateRepository::class, CategoryCreateRepository::class],
            [ICategoryFindByIdRepository::class, CategoryFindByIdRepository::class],
            [ICategoryUpdateRepository::class, CategoryUpdateRepository::class],
        ];
    }
}
