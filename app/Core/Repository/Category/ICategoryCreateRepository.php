<?php
namespace App\Core\Repository\Category;

use App\Http\Request\Category\CategoryCreateRequest;

interface ICategoryCreateRepository
{
    public function createCategory(CategoryCreateRequest $request): bool;
}
