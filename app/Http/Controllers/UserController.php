<?php
namespace App\Http\Controllers;

use App\Core\Service\User\IUserCreateService;
use App\Http\Controllers\Controller;
use App\Http\Request\User\UserCreateRequest;
use Exception;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{
    public function __construct(
        private readonly IUserCreateService $userCreateService,
    )
    { }

    public function createUser(UserCreateRequest $request): Response
    {
        try {
            return response()->json([
                'message' => 'User created successfully',
                'data' => $this->userCreateService->createUser($request)
            ], 201);
        }catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
