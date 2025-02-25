<?php

namespace App\Interfaces\Http\Controllers\Admin\User;

use App\Interfaces\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\Profile\ChangePasswordRequest;
use Illuminate\Http\Request;
use App\Core\Domain\Entities\UserEntity;
use App\Core\Application\Services\ProfileService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected ProfileService $profile_service;

    public function __construct(ProfileService $profile_service)
	{
        $this->profile_service = $profile_service;
        $this->page_breadcrumbs[] = [
            'page' => route('admin.profile'),
            'title' => __("Thông tin cá nhân")
        ];
	}
    public function getProfile(Request $request){
        return view('admin.profile.index')->with('page_breadcrumbs',$this->page_breadcrumbs);
    }
    public function postChangePassword(ChangePasswordRequest $request){

        $data = $request->validated();

        $data['username'] = Auth::user()->username;

        $result = $this->profile_service->changePassword($data);

        if ($result->success === false) {
            return redirect()->back()->withErrors($result->message);
        }

        $user = $result->data;

        Auth::loginUsingId($user->id);

        return redirect()->back()->with('tab',1)->with('success', trans( 'Đổi mật khẩu thành công'));
    }
}
