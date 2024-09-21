<?php
namespace App\Core\Repository\Products;

use App\Models\Products;

interface IProductsFindByIdRepository
{
    public function findById(int $id): Products;
}
