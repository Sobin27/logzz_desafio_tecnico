<?php
namespace App\Core\Repository\Category;

use App\Models\Category;

interface ICategoryUpdateRepository
{
    public function updateCategory(Category $category): bool;
}
