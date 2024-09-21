<?php
namespace App\Domain\Products;

use App\Core\ApiExterna\IApiExternaRepository;
use App\Core\Repository\Products\IProductsImportRepository;
use App\Core\Service\Products\IProductsImportService;

class ProductsImportService implements IProductsImportService
{
    public function __construct(
        private readonly IApiExternaRepository $apiExternaRepository,
        private readonly IProductsImportRepository $productsImportRepository
    )
    { }

    public function importProducts(int|null $id): bool
    {
        if (isset($id)) {
            $productsImport = $this->apiExternaRepository->getProductById($id)->data;
            $products = collect([$productsImport])->transform(function ($item){
                $item['name'] = $item['title'];
                $item['image_url'] = $item['image'];
                unset($item['image']);
                unset($item['id']);
                unset($item['title']);
                unset($item['rating']);
                return $item;
            });
            return $this->productsImportRepository->import($products);
        }
        $productsImport = $this->apiExternaRepository->getAllProducts()->data;
        $products = collect($productsImport)->transform(function ($item){
            $item['name'] = $item['title'];
            $item['image_url'] = $item['image'];
            unset($item['image']);
            unset($item['id']);
            unset($item['title']);
            unset($item['rating']);
            return $item;
        });
        return $this->productsImportRepository->import($products);
    }
}
