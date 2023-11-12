<?php

namespace App\Providers;

use App\Repositories\Position\PositionRepository;
use App\Repositories\Position\PositionRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\WorkingTime\WorkingTimeRepositoryInterface;
use App\Repositories\WorkingTime\WorkingTimeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{

    public function register(): void
    {
       $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
       $this->app->bind(PositionRepositoryInterface::class,PositionRepository::class);
       $this->app->bind(WorkingTimeRepositoryInterface::class,WorkingTimeRepository::class);
    }


    public function boot(): void
    {
        //
    }
}
