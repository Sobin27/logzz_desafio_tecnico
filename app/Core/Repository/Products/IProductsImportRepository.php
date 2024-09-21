<?php
namespace App\Core\Repository\Products;

use Illuminate\Support\Collection;

interface IProductsImportRepository
{
    public function import(Collection $products): bool;
}
