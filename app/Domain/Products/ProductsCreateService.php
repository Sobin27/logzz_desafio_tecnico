<?php
namespace App\Domain\Products;

use App\Core\Repository\Products\IProductsCreateRepository;
use App\Core\Service\Products\IProductsCreateService;
use App\Http\Request\Products\ProductsCreateRequest;

class ProductsCreateService implements IProductsCreateService
{
    private string $pathImage = '';
    public function __construct(
        private readonly IProductsCreateRepository $productsCreateRepository,
    )
    { }

    public function createProducts(ProductsCreateRequest $request): bool
    {
        if (isset($request->image)) $this->saveImage($request);
        return $this->productsCreateRepository->createProducts($request, $this->pathImage);
    }
    private function saveImage(ProductsCreateRequest $request): void
    {
        $this->pathImage = $request->file('image')->store('products/image', 'public');
    }
}
