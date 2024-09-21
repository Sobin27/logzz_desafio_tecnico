<?php
namespace App\Infra\Data\Category;

use App\Core\Repository\Category\ICategoryCreateRepository;
use App\Http\Request\Category\CategoryCreateRequest;
use App\Models\Category;

class CategoryCreateRepository implements ICategoryCreateRepository
{
    public function createCategory(CategoryCreateRequest $request): bool
    {
        $category = Category::query()->create([
            'name' => $request->name,
        ]);
        if ($category) return true;
        return false;
    }
}
