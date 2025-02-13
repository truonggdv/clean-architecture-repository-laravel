<?php

namespace App\Core\Application\Services;

use App\Core\Domain\Repositories\UserRepositoryInterface;
use App\Core\Domain\Entities\UserEntity;

class UserService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers(): array
    {
        return $this->userRepository->getAll();
    }

    public function createUser(string $name, string $email, string $password): UserEntity
    {
        $user = new UserEntity(null, $name, $email, $password);
        return $this->userRepository->create($user);
    }

    public function updateUser(int $id, string $name, string $email, string $password): UserEntity
    {
        $user = new UserEntity($id, $name, $email, $password);
        return $this->userRepository->update($user);
    }

    public function deleteUser(int $id): bool
    {
        return $this->userRepository->delete($id);
    }
}
