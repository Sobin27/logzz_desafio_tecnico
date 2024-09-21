<?php
namespace App\Infra\Data\Products;

use App\Core\Repository\Products\IProductsFindByIdRepository;
use App\Models\Products;

class ProductsFindByIdRepository implements IProductsFindByIdRepository
{
    public function findById(int $id): Products
    {
        return Products::query()->find($id);
    }
}
