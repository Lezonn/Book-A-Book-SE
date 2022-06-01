<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('SuperAdmin', function(User $user) {
            return $user->role->role_name === 'SuperAdmin';
        });

        Gate::define('Admin', function(User $user) {
            return $user->role->role_name === 'Admin';
        });
    }
}
