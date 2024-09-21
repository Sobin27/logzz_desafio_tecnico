<?php
namespace App\Core\Service\Login;

use App\Http\Request\Login\LoginRequest;

interface ILoginService
{
    public function login(LoginRequest $request): array;
}
