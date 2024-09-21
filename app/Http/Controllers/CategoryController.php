<?php
namespace App\Http\Controllers;

use App\Core\Service\Category\ICategoryCreateService;
use App\Core\Service\Category\ICategoryUpdateService;
use App\Http\Controllers\Controller;
use App\Http\Request\Category\CategoryCreateRequest;
use App\Http\Request\Category\CategoryUpdateRequest;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function __construct(
        private readonly ICategoryCreateService $categoryCreateService,
        private readonly ICategoryUpdateService $categoryUpdateService,
    )
    { }

    public function createCategory(CategoryCreateRequest $request): Response
    {
        try {
            return response()->json([
                'message' => 'Category created successfully',
                'data' => $this->categoryCreateService->createCategory($request)
            ], 201);
        }catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function updateCategory(CategoryUpdateRequest $request): Response
    {
        try {
            return response()->json([
                'message' => 'Category updated successfully',
                'data' => $this->categoryUpdateService->updateCategory($request)
            ], 200);
        }catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
