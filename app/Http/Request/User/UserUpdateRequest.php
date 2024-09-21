<?php
namespace App\Http\Request\User;

use App\Http\Request\BaseRequest;

/**
 * Class UserCreateRequest
 * @package App\Http\Request\User
 * @param string $name
 * @param string $email
 */
class UserUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string',
            'email' => 'email'
        ];
    }
}
