<?php

namespace App\Providers;

use App\Containers\BlogContainer;
use App\Containers\UserContainer;
use App\Containers\UserContainerLegacy;
use App\Contracts\BlogInterface;
use App\Contracts\UserInterface;
use Illuminate\Support\ServiceProvider;

class BlogProvider extends ServiceProvider
{

    public $bindings = [
        UserInterface::class => UserContainer::class,
        BlogInterface::class => BlogContainer::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
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
