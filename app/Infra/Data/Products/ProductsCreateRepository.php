<?php
namespace App\Infra\Data\Products;

use App\Core\Repository\Products\IProductsCreateRepository;
use App\Http\Request\Products\ProductsCreateRequest;
use App\Models\Products;

class ProductsCreateRepository implements IProductsCreateRepository
{
    public function createProducts(ProductsCreateRequest $request): bool
    {
        $product = Products::query()->create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category' => $request->category,
            'image_url' => $request->image
        ]);
        if ($product) return true;
        return false;
    }
}
