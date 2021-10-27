<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $url = explode('/',url('/'));
        $url = $url[0]."//".$url[1].$url[2].'/drinkapp_mobile/public/uploads';
        view()->share('url', $url);
    }
}
