<?php

namespace App\Providers;

//use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
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
        // Paginator::useBootstrap;
        $locale = config('locales.fallback_locale');
        App::setLocale($locale);
        Lang::setLocale($locale);
        Session::put('locale', $locale);
        Carbon::setLocale($locale);
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

    }
}
