<?php

namespace App\Core\Domain\Repositories;

use App\Core\Domain\Entities\UserEntity;

interface AuthRepositoryInterface
{
    public function register(UserEntity $data): UserEntity;
    public function login($username, $password);
    // public function logout(): void;
}