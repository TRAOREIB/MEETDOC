<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
      //   $this->app->bind(ClientInterface::class, AbstractClient::class);
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
//         Blade::if('patient', function(){
//        return auth()->user()->profil === 'Patient';
//        });
//        
//         Blade::if('medecin', function(){
//        return auth()->user()->profil === 'Medecin';
//        });
//        
//         Blade::if('admin', function(){
//        return auth()->user()->profil === 'Admin';
//        });
    }
}
