<?php
namespace App\Core\Service\Products;

use App\Http\Request\Products\ProductsCreateRequest;

interface IProductsCreateService
{
    public function createProducts(ProductsCreateRequest $request): bool;
}
