<?php
namespace App\Http\Request\Products;

use App\Http\Request\BaseRequest;

class ProductsUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'productId' => 'required|integer',
            'name' => 'string',
            'price' => 'numeric',
            'category' => 'string',
            'description' => 'string',
            'image' => 'url'
        ];
    }
}
