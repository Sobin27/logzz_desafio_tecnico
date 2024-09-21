<?php
namespace App\Core\Repository\Login;

use App\Http\Request\Login\LoginRequest;

interface ILoginRepository
{
    public function login(LoginRequest $request): array;
}
