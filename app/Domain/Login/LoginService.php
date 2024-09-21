<?php
namespace App\Domain\Login;

use App\Core\Repository\Login\ILoginRepository;
use App\Core\Service\Login\ILoginService;
use App\Http\Request\Login\LoginRequest;
use Exception;

class LoginService implements ILoginService
{
    public function __construct(
        private ILoginRepository $loginRepository
    )
    { }
    /**
     * @throws Exception
     */
    public function login(LoginRequest $request): array
    {
        $userValidated = $this->loginRepository->login($request);
        $this->checkUser($userValidated);
        return $userValidated;
    }
    /**
     * @throws Exception
     */
    private function checkUser(array $userValidated): void
    {
        if (empty($userValidated)) {
            throw new Exception('Unauthorized', 401);
        }
    }
}
