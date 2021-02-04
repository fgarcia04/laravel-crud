<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ApiZohoProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Helpers/ApiZoho/ApiZoho.php';
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
