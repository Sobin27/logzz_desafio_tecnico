<?php
namespace App\Infra\Data\Products;

use App\Core\Repository\Products\IProductsImportRepository;
use App\Models\Products;
use Illuminate\Support\Collection;

class ProductsImportRepository implements IProductsImportRepository
{
    public function import(Collection $products): bool
    {
        return Products::insert($products->toArray());
    }
}
