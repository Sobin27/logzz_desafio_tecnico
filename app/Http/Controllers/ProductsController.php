<?php
namespace App\Http\Controllers;

use App\Core\Service\Products\IProductsCreateService;
use App\Core\Service\Products\IProductsDeleteService;
use App\Core\Service\Products\IProductsListService;
use App\Core\Service\Products\IProductsUpdateService;
use App\Http\Controllers\Controller;
use App\Http\Request\Products\ProductsCreateRequest;
use App\Http\Request\Products\ProductsListRequest;
use App\Http\Request\Products\ProductsUpdateRequest;
use Exception;
use Symfony\Component\HttpFoundation\Response;


class ProductsController extends Controller
{
    public function __construct(
        private readonly IProductsCreateService $productsCreateService,
        private readonly IProductsUpdateService $productsUpdateService,
        private readonly IProductsDeleteService $productsDeleteService,
        private readonly IProductsListService $productsListService
    )
    { }

    public function createProducts(ProductsCreateRequest $request): Response
    {
        try {
            return response()->json([
                'message' => 'Products created successfully',
                'data' => $this->productsCreateService->createProducts($request)
            ], 201);
        }catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
    public function updateProducts(ProductsUpdateRequest $request): Response
    {
        try {
            return response()->json([
                'message' => 'Products updated successfully',
                'data' => $this->productsUpdateService->updateProducts($request)
            ]);
        }catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
    public function deleteProducts(int $id): Response
    {
        try {
            return response()->json([
                'message' => 'Products deleted successfully',
                'data' => $this->productsDeleteService->deleteProduct($id)
            ]);
        }catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
    public function listProducts(ProductsListRequest $request): Response
    {
        try {
            return response()->json([
                'message' => 'Products listed successfully',
                'data' => $this->productsListService->listPaginated($request)
            ]);
        }catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
