<?php
namespace App\Core\Repository\Category;

use App\Models\Category;

interface ICategoryFindByIdRepository
{
    public function findById(int $id): Category;
}
