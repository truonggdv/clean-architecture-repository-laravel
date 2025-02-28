<?php

namespace App\Core\Application\Services;
use App\Core\Domain\Repositories\ProfileRepositoryInterface;
use App\Core\Domain\Entities\UserEntity;
use App\Core\Domain\DTO\BaseResponse;

class ProfileService {
    
    protected ProfileRepositoryInterface $profileRepository;


    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }
    public function changePassword($data): BaseResponse
    {
        return $this->profileRepository->changePassword($data);
    }
    public function changePassword2($data): BaseResponse
    {
        return $this->profileRepository->changePassword2($data);
    }
}