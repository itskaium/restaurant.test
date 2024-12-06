<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('isManager', function($user) { 
            return $user->role == 'manager'; 
        });
        Gate::define('isChef', function($user) { 
            return $user->role == 'chef'; 
        });
        Gate::define('isWaiter', function($user) { 
            return $user->role == 'waiter'; 
        });
    }
}
