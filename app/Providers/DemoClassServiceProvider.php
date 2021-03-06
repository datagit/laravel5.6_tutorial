<?php

namespace MyLearnLaravel5x\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use MyLearnLaravel5x\Services\DemoClassService;
use MyLearnLaravel5x\Services\DogService;

class DemoClassServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Config::get('services')['demo_class_service'], function ($app) {
            return new DemoClassService(new DogService());
        });
    }
}
