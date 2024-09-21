<?php
namespace App\Domain\User;

use App\Core\Repository\User\IUserFindByIdRepository;
use App\Core\Repository\User\IUserUpdateRepository;
use App\Core\Service\User\IUserUpdateService;
use App\Http\Request\User\UserUpdateRequest;
use App\Models\User;

class UserUpdateService implements IUserUpdateService
{
    private User $user;
    private UserUpdateRequest $request;

    public function __construct(
        private readonly IUserFindByIdRepository $userFindByIdRepository,
        private readonly IUserUpdateRepository $userUpdateRepository
    )
    { }

    public function updateUser(UserUpdateRequest $request): bool
    {
        $this->setRequest($request);
        $this->setUser();
        $this->mappedUser();
        return $this->userUpdateRepository->updateUser($this->user);
    }
    private function setRequest(UserUpdateRequest $request): void
    {
        $this->request = $request;
    }
    private function setUser(): void
    {
        $this->user = $this->userFindByIdRepository->findById(auth()->user()->id);
    }
    private function mappedUser(): void
    {
        $this->user->name = $this->request->name ?? $this->user->name;
        $this->user->email = $this->request->email ?? $this->user->email;
    }
}
