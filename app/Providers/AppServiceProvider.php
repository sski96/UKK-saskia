<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
         // Paginator using Bootstrap
         Paginator::useBootstrap();

         // Define Gate for Hotel Guest
         Gate::define('hotel_guest', function(User $user) {
             return $user->role === 'hotel_guest';
         });
 
         // Define Admin and Receptionist Gate
         Gate::define('admin', function(User $user) {
             return $user->role === 'administrator';
         });
 
         Gate::define('receptionist', function(User $user) {
             return $user->role === 'receptionist';
         });
 
         // Carbon Locale ID
         setLocale(LC_TIME, $this->app->getLocale());

         Validator::extend('username', function ($attribute, $value, $parameters, $validator) {
            // Logika validasi Anda di sini, misalnya, menggunakan aturan 'dns'
            return preg_match('/^[a-zA-Z0-9.-]+\.([a-zA-Z]{2,})$/', $value);
        });
    }
}
