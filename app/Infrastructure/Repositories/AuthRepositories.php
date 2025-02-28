<?php

namespace App\Infrastructure\Repositories;

use App\Core\Domain\Repositories\AuthRepositoryInterface;
use App\Core\Domain\Entities\UserEntity;
use App\Infrastructure\Persistence\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Core\Domain\Exceptions\BaseException;
use App\Core\Domain\DTO\BaseResponse;

class AuthRepositories implements AuthRepositoryInterface{

    public function register(UserEntity $data) : UserEntity {
        $result = User::create([
            'shop_id' => $data->shop_id,
            'username' => $data->username,
            'email' => $data->email,
            'account_type' => $data->account_type,
            'password' => Hash::make($data->password),
            'status' => 1,
            'balance' => 0,
        ]);
        return new UserEntity($result->toArray());
    }

    public function login($username, $password) {
        $user = User::where('username', $username)
        ->where('status', 1)
        ->where(function ($query){
            $query->orWhere('account_type', 1);
            $query->orWhere('account_type',3);
        })
        ->first();
        if (!$user) {
            return BaseResponse::error("Tài khoản hoặc mật khẩu không đúng", 401);
        }
        if($user->required_login_gmail == 1){
            return BaseResponse::error("Tài khoản của bạn đã được cấu hình đăng nhập với google. Vui lòng đăng nhập bằng tài khoản google để truy cập vào hệ thống", 400);
        }
        if(!\Hash::check($password, $user->password)){
            return BaseResponse::error("Tài khoản hoặc mật khẩu không đúng", 401);
        }
        $result = new UserEntity($user->toArray());
        return BaseResponse::success($result,'Đăng nhập thành công',200);
    }
}