<?php
namespace App\Infra\Data\Login;

use App\Core\Repository\Login\ILoginRepository;
use App\Http\Request\Login\LoginRequest;
use App\Models\User;

class LoginRepository implements ILoginRepository
{
    public function login(LoginRequest $request): array
    {
        $token = auth()->attempt(['email' => $request->email, 'password' => $request->password]);
        if (!$token) {
            return [];
        }
        return [
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'token' => $token
        ];
    }
}
