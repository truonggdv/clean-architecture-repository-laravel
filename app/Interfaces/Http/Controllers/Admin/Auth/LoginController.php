<?php

namespace App\Interfaces\Http\Controllers\Admin\Auth;

use App\Interfaces\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Interfaces\Http\Requests\LoginRequest;
use App\Core\Domain\Entities\UserEntity;
use App\Core\Application\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected AuthService $authService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthService $authService)
    {
        $this->middleware('guest')->except('logout');
        $this->authService = $authService;
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    public function login(LoginRequest $request){

        $data = new UserEntity($request->validated());

        $username = $data->username;

        $password = $data->password;

        $result = $this->authService->login($username,$password);

        if ($result->success === false) {
            return redirect()->back()->with('errors', $result->message);
        }
        $user = $result->data;

        Auth::loginUsingId($user->id);

        return redirect()->intended($this->redirectPath());
        
    }
}
