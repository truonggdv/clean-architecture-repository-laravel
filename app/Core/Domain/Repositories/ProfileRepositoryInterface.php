<?php

namespace App\Core\Domain\Repositories;

use App\Core\Domain\Entities\UserEntity;
use App\Core\Domain\DTO\BaseResponse;

interface ProfileRepositoryInterface
{
    public function changePassword(UserEntity $data): BaseResponse;
    public function changePassword2(UserEntity $data) : bool;
}