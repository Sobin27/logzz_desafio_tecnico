<?php
namespace App\Core\Repository\Products;

use App\Models\Products;

interface IProductsDeleteRepository
{
    public function deleteProduct(Products $products): bool;
}
