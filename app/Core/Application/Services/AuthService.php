<?php

namespace App\Core\Application\Services;
use App\Core\Domain\Repositories\AuthRepositoryInterface;
use App\Core\Domain\Entities\UserEntity;
use App\Core\Domain\DTO\BaseResponse;
use App\Core\Domain\UseCases\LoginUseCase;

class AuthService {

    protected AuthRepositoryInterface $authRepository;
    protected LoginUseCase $loginUseCase;


    public function __construct(AuthRepositoryInterface $authRepository,  LoginUseCase $loginUseCase)
    {
        $this->authRepository = $authRepository;
        $this->loginUseCase = $loginUseCase;
    }

    public function register(UserEntity $user): UserEntity
    {
        return $this->authRepository->register($user);
    }

    /**
     * Xử lý đăng nhập
     */
    public function login(string $email, string $password): BaseResponse
    {

        // 1. Truy vấn dữ liệu user từ repository
        $user = $this->authRepository->login($email);

        // 2. Xử lý logic bằng UseCase
        return $this->loginUseCase->execute($user, $password);
    }

    /**
     * Đăng xuất user
     */
    public function logout(): void
    {
        $this->authRepository->logout();
    }

    public function login_with_google(string $token) : BaseResponse
    {
        return $this->authRepository->login_with_google($token);
    }
}