<?php
namespace App\Http\Controllers;

use App\Core\Service\Login\ILoginService;
use App\Http\Controllers\Controller;
use App\Http\Request\Login\LoginRequest;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function __construct(
        private readonly ILoginService $loginService,
    )
    { }

    public function login(LoginRequest $request): Response
    {
        try {
            return response()->json([
               'message' => 'Login success',
                'data' => $this->loginService->login($request)
            ]);
        }catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
