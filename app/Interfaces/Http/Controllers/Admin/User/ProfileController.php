<?php

namespace App\Interfaces\Http\Controllers\Admin\User;

use App\Interfaces\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\Profile\ChangePasswordRequest;
use App\Interfaces\Http\Requests\Profile\ChangePassword2Request;
use Illuminate\Http\Request;
use App\Core\Domain\Entities\UserEntity;
use App\Core\Application\Services\ProfileService;
use App\Core\Application\Services\ActivityLogService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected ProfileService $profile_service;

    protected ActivityLogService $activity_log_service;
    /**
     * ProfileController constructor.
     *
     * @param ProfileService $profile_service
     * @param ActivityLogService $activity_log_service
     */
    public function __construct(
            ProfileService $profile_service, 
            ActivityLogService $activity_log_service
        )
	{
        $this->profile_service = $profile_service;
        $this->activity_log_service = $activity_log_service;
        $this->page_breadcrumbs[] = [
            'page' => route('admin.profile'),
            'title' => __("Thông tin cá nhân")
        ];
	}
    public function getProfile(Request $request){
        $this->activity_log_service->add('Truy cập trang thông tin profile');
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

        $this->activity_log_service->add('Đổi mật khẩu thành công');

        return redirect()->back()->with('tab',1)->with('success', trans( 'Đổi mật khẩu thành công'));
    }

    public function postChangePassword2(ChangePassword2Request $request){

        $data = $request->validated();

        $data['username'] = Auth::user()->username;

        $result = $this->profile_service->changePassword2($data);

        if ($result->success === false) {
            return redirect()->back()->withErrors($result->message);
        }

        $user = $result->data;

        $this->activity_log_service->add('Đổi mật khẩu cấp 2 thành công');

        return redirect()->back()->with('tab',1)->with('success', trans( 'Đổi mật khẩu cấp 2 thành công'));
    }
}
