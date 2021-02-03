<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SendMessageProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Helpers/SendMessageProvider/SendMessageProvider.php';
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
