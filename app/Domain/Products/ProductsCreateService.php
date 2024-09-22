<?php
namespace App\Domain\Products;

use App\Core\Repository\Products\IProductsCreateRepository;
use App\Core\Service\Products\IProductsCreateService;
use App\Http\Request\Products\ProductsCreateRequest;

class ProductsCreateService implements IProductsCreateService
{
    public function __construct(
        private readonly IProductsCreateRepository $productsCreateRepository,
    )
    { }

    public function createProducts(ProductsCreateRequest $request): bool
    {
        return $this->productsCreateRepository->createProducts($request);
    }
}
