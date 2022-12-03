<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\SearchRepositoryInterface;
use App\Repositories\SearchRepository;

use App\Interfaces\RoomRepositoryInterface;
use App\Repositories\RoomRepository;

use App\Interfaces\DashboardRepositoryInterface;
use App\Repositories\DashboardRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SearchRepositoryInterface::class, SearchRepository::class);
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
        $this->app->bind(DashboardRepositoryInterface::class, DashboardRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
