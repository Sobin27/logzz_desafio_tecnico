<?php
namespace App\Core\Service\Category;

use App\Http\Request\Category\CategoryCreateRequest;

interface ICategoryCreateService
{
    public function createCategory(CategoryCreateRequest $request): bool;
}
