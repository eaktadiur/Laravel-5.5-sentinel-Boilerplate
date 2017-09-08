<?php

namespace App\Providers;

use App\Models\Blog;
use App\Observers\BlogObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class EloquentEventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        Blog::observe(BlogObserver::class);
        //User::observe(UserObserver::class);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
