<?php
namespace App\Domain\User;

use App\Core\Repository\User\IUserCreateRepository;
use App\Core\Repository\User\IVerifyIfEmailExistsRepository;
use App\Core\Service\User\IUserCreateService;
use App\Http\Request\User\UserCreateRequest;
use App\Models\User;
use Exception;

class UserCreateService implements IUserCreateService
{
    private UserCreateRequest $request;

    public function __construct(
        private readonly IVerifyIfEmailExistsRepository $verifyIfEmailExistsRepository,
        private readonly IUserCreateRepository $userCreateRepository
    )
    { }

    /**
     * @throws Exception
     */
    public function createUser(UserCreateRequest $request): bool
    {
        $this->setRequest($request);
        $this->checkIfEmailExists();
        return $this->userCreate();
    }
    private function setRequest(UserCreateRequest $request): void
    {
        $this->request = $request;
    }
    /**
     * @throws Exception
     */
    private function checkIfEmailExists(): void
    {
        if ($this->verifyIfEmailExistsRepository->verifyIfEmailExists($this->request->email)) {
            throw new Exception('Email already exists');
        }
    }
    private function userCreate(): bool
    {
        $user = $this->userCreateRepository->createUser($this->request);
        if ($user) return true;
        return false;
    }
}
