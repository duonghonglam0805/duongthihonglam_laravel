<?php

namespace App\Providers;

use App\View\Components\Alert;
use App\View\Components\Inputs\Button;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('env', function ($value) {
            //Trả về giá trị boolean
            if (config('app.env') === $value) {
                return true;
            }
            return false;
        });
        // Blade::component('package-alert', Alert::class);
        Blade::component('button', Button::class);
    }
}
