<?php
namespace App\Domain\Category;

use App\Core\Repository\Category\ICategoryCreateRepository;
use App\Core\Service\Category\ICategoryCreateService;
use App\Http\Request\Category\CategoryCreateRequest;

class CategoryCreateService implements ICategoryCreateService
{
    public function __construct(
        private readonly ICategoryCreateRepository $categoriaCreateRepository
    )
    { }
    public function createCategory(CategoryCreateRequest $request): bool
    {
        return $this->categoriaCreateRepository->createCategory($request);
    }
}
