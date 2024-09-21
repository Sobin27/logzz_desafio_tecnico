<?php
namespace App\Infra\Data\Category;

use App\Core\Repository\Category\ICategoryFindByIdRepository;
use App\Models\Category;

class CategoryFindByIdRepository implements ICategoryFindByIdRepository
{
    public function findById(int $id): Category
    {
        return Category::query()->find($id);
    }
}
