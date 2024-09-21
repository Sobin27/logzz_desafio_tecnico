<?php
namespace App\Http\Request\Category;

use App\Http\Request\BaseRequest;

class CategoryCreateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string'
        ];
    }
}
