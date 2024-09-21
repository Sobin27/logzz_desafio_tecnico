<?php
namespace App\Infra\Data\Products;

use App\Core\Repository\Products\IProductsListRepository;
use App\Core\Support\PaginatedList;
use App\Core\Support\Pagination;
use App\Http\Request\Products\ProductsListRequest;
use App\Models\Products;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductsListRepository implements IProductsListRepository
{
    public function list(Pagination $pagination, ProductsListRequest $request): PaginatedList
    {
        return PaginatedList::builderByEloquentPagination($this->query($pagination, $request), $pagination);
    }
    private function query(Pagination $pagination, ProductsListRequest $request): LengthAwarePaginator
    {
        return Products::query()
            ->select(['*'])
            ->where($this->filter($request))
            ->paginate($pagination->perPage);
    }

    private function filter(ProductsListRequest $request): array
    {
        $filter = [];
        if (isset($request->name)) {
            $filter[] = ['name', 'like', '%' . $request->name . '%'];
        }
        if (isset($request->category)) {
            $filter[] = ['category', 'like', '%' . $request->category . '%'];
        }
        if (isset($request->id)) {
            $filter[] = ['id', '=', $request->price];
        }
        if (isset($request->image_with)){
            $filter[] = ['image_url', '!=', ''];
        }
        if (isset($request->image_without)){
            $filter[] = ['image_url', '=', ''];
        }
        return $filter;
    }
}
