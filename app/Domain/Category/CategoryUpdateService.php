<?php
namespace App\Domain\Category;

use App\Core\Repository\Category\ICategoryFindByIdRepository;
use App\Core\Repository\Category\ICategoryUpdateRepository;
use App\Core\Service\Category\ICategoryUpdateService;
use App\Http\Request\Category\CategoryUpdateRequest;
use App\Models\Category;

class CategoryUpdateService implements ICategoryUpdateService
{
    private CategoryUpdateRequest $request;
    private Category $category;

    public function __construct(
        private readonly ICategoryFindByIdRepository $categoryFindByIdRepository,
        private readonly ICategoryUpdateRepository $categoryUpdateRepository,
    )
    { }
    public function updateCategory(CategoryUpdateRequest $request): bool
    {
        $this->setRequest($request);
        $this->setCategory();
        $this->mappedCategory();
        return $this->categoryUpdateRepository->updateCategory($this->category);
    }
    private function setRequest(CategoryUpdateRequest $request): void
    {
        $this->request = $request;
    }
    private function setCategory(): void
    {
        $this->category = $this->categoryFindByIdRepository->findById($this->request->categoryId);
    }
    private function mappedCategory(): void
    {
        $this->category->name = $this->request->name ?? $this->category->name;
    }
}
