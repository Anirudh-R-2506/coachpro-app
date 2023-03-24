<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Foundation\Vite;
use Illuminate\Support\ServiceProvider;


class FilamentServiceProvider extends ServiceProvider
{
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
        Filament::serving(function () {
            if (auth()->check() && auth()->user()->canAccessFilament()) {
                /* Filament::registerViteTheme('resources/css/filament.css'); */
                Filament::registerRenderHook(
                    'head.end',
                      static fn()=>(new Vite)(['resources/css/filament.css'])
                );
            }
            else {
                return abort(403, 'You are not authorized to access the admin panel.');
            }
        });
    }
}
