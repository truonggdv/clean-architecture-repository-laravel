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
use App\Infrastructure\Persistence\Models\User;

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
        $this->module='security-2fa';
        $this->page_breadcrumbs[] = [
            'page' => route('admin.profile'),
            'title' => __("Thông tin cá nhân")
        ];
        $this->middleware('permission:security-2fa', ['only' => ['get_security_2fa']]);
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

    public function get_security_2fa(Request $request){
        $this->page_breadcrumbs[] =[
            'page' => '#',
            'title' => __("Bảo mật tải khoản")
        ];
        $this->activity_log_service->add('Truy cập trang cấu hình bảo mật google 2FA');

        $user = Auth::user();

        if($user->google2fa_enable == 1){
            $google2fa_enable = 1;
        }
        else{
            $google2fa_enable = 0;
        }

        return view('admin.profile.2fa.index')
        ->with('module', $this->module)
        ->with('user', $user)
        ->with('google2fa_enable', $google2fa_enable)
        ->with('page_breadcrumbs', $this->page_breadcrumbs);
    }

    public function setup_google_2fa(Request $request){

        $this->page_breadcrumbs[] =[
            'page' => '#',
            'title' => __("Bảo mật tải khoản")
        ];

        $this->activity_log_service->add('Truy cập trang setup cấu hình bảo mật google 2FA');

        $user = User::findOrFail(Auth::user()->id);
        if($user->google2fa_enable == 1){
            return redirect()->route('admin.security-2fa.index')->withErrors("Tài khoản đã được cấu hình GG2FA" );
        }
        $google2fa = app('pragmarx.google2fa');
           // secret_key cho từng user
        $google2fa_secret = $google2fa->generateSecretKey();
        if($google2fa_secret){
            $user->google2fa_secret=$google2fa_secret;
            $user->save();
        }
        // lấy QR ảnh để lấy thông tin và quét mã lưu tài khoản vào app GG2FA
        $google2fa_url = $google2fa->getQRCodeInline(
            $request->getHttpHost(),
            $user->username."-".$user->email,
            $user->google2fa_secret
        );

        dd($google2fa_url);
        
        return view('admin.profile.2fa.setup')
        ->with('module', $this->module)
        ->with('user', $user)
        ->with('google2fa_url', $google2fa_url)
        ->with('page_breadcrumbs', $this->page_breadcrumbs);
    }
}
