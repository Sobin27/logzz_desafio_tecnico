<?php
namespace App\Core\Repository\Products;

use App\Core\Support\PaginatedList;
use App\Core\Support\Pagination;
use App\Http\Request\Products\ProductsListRequest;

interface IProductsListRepository
{
    public function list(Pagination $pagination, ProductsListRequest $request): PaginatedList;
}
