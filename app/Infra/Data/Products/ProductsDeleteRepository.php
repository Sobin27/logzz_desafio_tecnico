<?php
namespace App\Infra\Data\Products;

use App\Core\Repository\Products\IProductsDeleteRepository;
use App\Models\Products;

class ProductsDeleteRepository implements IProductsDeleteRepository
{
    public function deleteProduct(Products $products): bool
    {
        return $products->delete();
    }
}
