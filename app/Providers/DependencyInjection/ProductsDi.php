<?php
namespace App\Providers\DependencyInjection;

use App\Core\Repository\Products\IProductsCreateRepository;
use App\Core\Repository\Products\IProductsDeleteRepository;
use App\Core\Repository\Products\IProductsFindByIdRepository;
use App\Core\Repository\Products\IProductsImportRepository;
use App\Core\Repository\Products\IProductsListRepository;
use App\Core\Repository\Products\IProductsUpdateRepository;
use App\Core\Service\Products\IProductsCreateService;
use App\Core\Service\Products\IProductsDeleteService;
use App\Core\Service\Products\IProductsImportService;
use App\Core\Service\Products\IProductsListService;
use App\Core\Service\Products\IProductsUpdateService;
use App\Domain\Products\ProductsCreateService;
use App\Domain\Products\ProductsDeleteService;
use App\Domain\Products\ProductsImportService;
use App\Domain\Products\ProductsListService;
use App\Domain\Products\ProductsUpdateService;
use App\Infra\Data\Products\ProductsCreateRepository;
use App\Infra\Data\Products\ProductsDeleteRepository;
use App\Infra\Data\Products\ProductsFindByIdRepository;
use App\Infra\Data\Products\ProductsImportRepository;
use App\Infra\Data\Products\ProductsListRepository;
use App\Infra\Data\Products\ProductsUpdateRepository;

class ProductsDi extends DependencyInjection
{
    protected function services(): array
    {
        return [
            [IProductsCreateService::class, ProductsCreateService::class],
            [IProductsUpdateService::class, ProductsUpdateService::class],
            [IProductsDeleteService::class, ProductsDeleteService::class],
            [IProductsListService::class, ProductsListService::class],
            [IProductsImportService::class, ProductsImportService::class],
        ];
    }

    protected function repositories(): array
    {
        return [
            [IProductsCreateRepository::class, ProductsCreateRepository::class],
            [IProductsUpdateRepository::class, ProductsUpdateRepository::class],
            [IProductsFindByIdRepository::class, ProductsFindByIdRepository::class],
            [IProductsDeleteRepository::class, ProductsDeleteRepository::class],
            [IProductsListRepository::class, ProductsListRepository::class],
            [IProductsImportRepository::class, ProductsImportRepository::class],
        ];
    }
}
