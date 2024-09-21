<?php
namespace App\Core\Service\Products;

use App\Core\Support\PaginatedList;
use App\Http\Request\Products\ProductsListRequest;

interface IProductsListService
{
    public function listPaginated(ProductsListRequest $request): PaginatedList;
}
