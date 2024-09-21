<?php
namespace App\Core\Service\Category;

use App\Http\Request\Category\CategoryUpdateRequest;

interface ICategoryUpdateService
{
    public function updateCategory(CategoryUpdateRequest $request): bool;
}
