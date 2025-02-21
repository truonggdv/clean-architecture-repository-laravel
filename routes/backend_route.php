<?php

use Illuminate\Support\Facades\Route;
use App\Interfaces\Http\Controllers\Admin\UserController;
use App\Interfaces\Http\Controllers\Admin\Auth\RegisterController;
use App\Interfaces\Http\Controllers\Admin\Auth\LoginController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(array('as' => 'admin.'),function(){
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            $page_title = 'Dashboard';
            $page_breadcrumbs = [
                [
                    'page' => route('admin.dashboard'),
                    'title' => 'Home',
                ],
            ];
            return view('admin.index',compact('page_title', 'page_breadcrumbs'));
        })->name('dashboard');
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    });
});
