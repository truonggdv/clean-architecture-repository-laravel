<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Core\Domain\Repositories\UserRepositoryInterface;
use App\Core\Domain\Repositories\AuthRepositoryInterface;
use App\Infrastructure\Repositories\UserRepository;
use App\Infrastructure\Repositories\AuthRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
    }

    public function boot()
    {
        //
    }
}
