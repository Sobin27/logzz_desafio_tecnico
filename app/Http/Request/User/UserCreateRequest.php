<?php
namespace App\Http\Request\User;

use App\Http\Request\BaseRequest;

/**
 * Class UserCreateRequest
 * @package App\Http\Request\User
 * @param string $name
 * @param string $email
 * @param string $password
 */
class UserCreateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string'
        ];
    }
}
