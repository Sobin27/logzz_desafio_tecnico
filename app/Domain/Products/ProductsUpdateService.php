<?php
namespace App\Domain\Products;

use App\Core\Repository\Products\IProductsFindByIdRepository;
use App\Core\Repository\Products\IProductsUpdateRepository;
use App\Core\Service\Products\IProductsUpdateService;
use App\Http\Request\Products\ProductsUpdateRequest;
use App\Models\Products;

class ProductsUpdateService implements IProductsUpdateService
{
    private Products $products;
    private ProductsUpdateRequest $request;

    public function __construct(
        private readonly IProductsFindByIdRepository $productsFindByIdRepository,
        private readonly IProductsUpdateRepository $productsUpdateRepository,
    )
    { }

    public function updateProducts(ProductsUpdateRequest $request): bool
    {
        $this->setRequest($request);
        $this->setProduct();
        $this->mapperProduct();
        return $this->productsUpdateRepository->updateProduct($this->products);
    }
    private function setRequest(ProductsUpdateRequest $request): void
    {
        $this->request = $request;
    }
    private function setProduct(): void
    {
        $this->products = $this->productsFindByIdRepository->findById($this->request->productId);
    }
    private function mapperProduct(): void
    {
        $this->products->name = $this->request->name ?? $this->products->name;
        $this->products->description = $this->request->description ?? $this->products->description;
        $this->products->price = $this->request->price ?? $this->products->price;
        $this->products->category = $this->request->category ?? $this->products->category;
        $this->products->image_url = $this->request->image ?? $this->products->image_url;
    }
}
