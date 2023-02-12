<?php

namespace App\Providers;

use App\Http\Interfaces\CakeInterface;
use App\Http\Interfaces\InterestedInterface;
use App\Http\Repositories\CakeRepository;
use App\Http\Repositories\InterestedRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CakeInterface::class, CakeRepository::class);
        $this->app->bind(InterestedInterface::class, InterestedRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
