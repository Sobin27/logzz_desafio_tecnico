<?php
namespace App\Domain\Products;

use App\Core\Repository\Products\IProductsListRepository;
use App\Core\Service\Products\IProductsListService;
use App\Core\Support\PaginatedList;
use App\Http\Request\Products\ProductsListRequest;

class ProductsListService implements IProductsListService
{
    public function __construct(
        private readonly IProductsListRepository $productsListRepository
    )
    { }

    public function listPaginated(ProductsListRequest $request): PaginatedList
    {
        return $this->productsListRepository->list($request->getPagination(), $request);
    }
}
