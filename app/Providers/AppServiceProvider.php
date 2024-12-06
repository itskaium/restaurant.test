<?php

namespace App\Providers;

use App\Policies\UserPolicy;
use App\Models\User;
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


        Gate::define('isManager', [UserPolicy::class, 'isManager']);

        Gate::define('isChef', [UserPolicy::class, 'isChef']);
        
        Gate::define('isWaiter', [UserPolicy::class, 'isWaiter']);



        //Gate

        // Gate::define('isManager', function($user) { 
        //     return $user->role == 'manager'; 
        // });
        // Gate::define('isChef', function($user) { 
        //     return $user->role == 'chef'; 
        // });
        // Gate::define('isWaiter', function($user) { 
        //     return $user->role == 'waiter'; 
        // });
    }
}
