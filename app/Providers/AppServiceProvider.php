<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;    

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        //gates
        Gate::define('ver-admin', function(User $user){
            return $user->rol == 'admin';
        });

        Gate::define('ver-ventas', function(User $user){
            return in_array($user->rol, ['admin', 'cajero']);
        });
    }
}
