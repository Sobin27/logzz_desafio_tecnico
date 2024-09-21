<?php
namespace App\Http\Request\Category;

use App\Http\Request\BaseRequest;

/**
 * @property string $categoryId
 * @property string $name
 */
class CategoryUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'categoryId' => 'required|integer',
            'name' => 'string'
        ];
    }
}
