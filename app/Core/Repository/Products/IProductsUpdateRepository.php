<?php
namespace App\Core\Repository\Products;

use App\Models\Products;

interface IProductsUpdateRepository
{
    public function updateProduct(Products $products): bool;
}
