<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Load Bootrap 4 views for pagination because the default views are made in Tailwind CSS
        Paginator::useBootstrap();

        // Throw exception when lazy loading is used
        Model::preventLazyLoading(!app()->isProduction());
    }
}
