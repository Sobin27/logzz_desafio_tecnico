<?php
namespace App\Infra\Data\Products;

use App\Core\Repository\Products\IProductsUpdateRepository;
use App\Models\Products;

class ProductsUpdateRepository implements IProductsUpdateRepository
{
    public function updateProduct(Products $products): bool
    {
        return $products->save();
    }
}
