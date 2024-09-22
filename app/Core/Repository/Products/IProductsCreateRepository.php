<?php
namespace App\Core\Repository\Products;

use App\Http\Request\Products\ProductsCreateRequest;

interface IProductsCreateRepository
{
    public function createProducts(ProductsCreateRequest $request): bool;
}
