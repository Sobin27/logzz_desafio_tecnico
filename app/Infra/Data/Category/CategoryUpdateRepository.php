<?php
namespace App\Infra\Data\Category;

use App\Core\Repository\Category\ICategoryUpdateRepository;
use App\Models\Category;

class CategoryUpdateRepository implements ICategoryUpdateRepository
{
    public function updateCategory(Category $category): bool
    {
        return $category->save();
    }
}
