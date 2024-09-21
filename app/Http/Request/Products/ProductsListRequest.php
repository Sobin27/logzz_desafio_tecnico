<?php
namespace App\Http\Request\Products;

use App\Http\Request\BaseRequest;

/**
 * Class ProductsListRequest
 * @package App\Http\Request\Products
 * @param int|null $id
 * @param string|null $name
 * @param string|null $category
 * @param bool|null $image_with
 * @param bool|null $image_without
 */
class ProductsListRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
        ];
    }
}
