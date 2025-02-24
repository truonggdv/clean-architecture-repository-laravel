<?php

namespace App\Infrastructure\Repositories;

use App\Core\Domain\Repositories\ProfileRepositoryInterface;
use App\Core\Domain\Entities\UserEntity;
use App\Infrastructure\Persistence\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Core\Domain\Exceptions\BaseException;
use App\Core\Domain\DTO\BaseResponse;
use DB;
use Log;

class ProfileRepository implements ProfileRepositoryInterface
{
    public function changePassword($data) : BaseResponse
    {
        DB::beginTransaction();
        try {
            $user = User::where('username', $data['username'])
            ->where('status', 1)
            ->where(function ($query){
                $query->orWhere('account_type', 1);
                $query->orWhere('account_type',3);
            })
            ->first();
            if(!$user){
                return BaseResponse::error("Người dùng không tồn tại hoặc đã bị tạm khóa", 401);
            }
    
            if(!Hash::check($data['old_password'],$user->password)){
                return BaseResponse::error("Mật khẩu cũ không đúng", 400);
            }
            $user->password=Hash::make($data['password']);
            $user->save();
            DB::commit();
            $result = new UserEntity($user->toArray());
            return BaseResponse::success($result,'Thay đổi mật khẩu thành công.',200);
        }catch(\Exception $e){
            DB::rollBack();
            Log::error($e);
            return BaseResponse::error("Lỗi hệ thống, vui lòng thông báo QTV để xử lý ! ".$e->getMessage(), 500);
        }
    }
    public function changePassword2(UserEntity $data) : bool
    {

    }
}