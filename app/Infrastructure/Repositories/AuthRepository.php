<?php

namespace App\Infrastructure\Repositories;

use App\Core\Domain\Repositories\AuthRepositoryInterface;
use App\Core\Domain\Entities\UserEntity;
use App\Infrastructure\Persistence\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthRepositoryInterface{

    public function register(UserEntity $data) : UserEntity {
        $result = User::create([
            'shop_id' => $data->shop_id,
            'username' => $data->username,
            'email' => $data->email,
            'account_type' => $data->account_type,
            'password' => Hash::make($data->password),
            'balance' => 0,
        ]);
        return new UserEntity($result->toArray());
    }
}