<?php
namespace App\Core\Service\Products;

use App\Http\Request\Products\ProductsUpdateRequest;

interface IProductsUpdateService
{
    public function updateProducts(ProductsUpdateRequest $request): bool;
}
