<?php

namespace Spm\Zipper;

use Illuminate\Support\ServiceProvider;

class ZipperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('zipper', Zipper::class);
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