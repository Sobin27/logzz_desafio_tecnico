<?php
namespace App\Domain\Products;

use App\Core\Repository\Products\IProductsDeleteRepository;
use App\Core\Repository\Products\IProductsFindByIdRepository;
use App\Core\Service\Products\IProductsDeleteService;
use App\Models\Products;

class ProductsDeleteService implements IProductsDeleteService
{
    private Products $products;

    public function __construct(
        private readonly IProductsFindByIdRepository $productsFindByIdRepository,
        private readonly IProductsDeleteRepository $productsDeleteRepository
    )
    { }

    public function deleteProduct(int $id): bool
    {
        $this->setProduct($id);
        return $this->productsDeleteRepository->deleteProduct($this->products);
    }
    private function setProduct(int $id): void
    {
        $this->products = $this->productsFindByIdRepository->findById($id);
    }
}
