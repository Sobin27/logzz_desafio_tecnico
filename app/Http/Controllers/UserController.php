<?php
namespace App\Http\Controllers;

use App\Core\Service\User\IUserCreateService;
use App\Core\Service\User\IUserUpdateService;
use App\Http\Controllers\Controller;
use App\Http\Request\User\UserCreateRequest;
use App\Http\Request\User\UserUpdateRequest;
use Exception;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{
    public function __construct(
        private readonly IUserCreateService $userCreateService,
        private readonly IUserUpdateService $userUpdateService,
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
    public function updateUser(UserUpdateRequest $request): Response
    {
        try {
         return response()->json([
                'message' => 'User updated successfully',
                'data' => $this->userUpdateService->updateUser($request)
            ]);
        }catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
