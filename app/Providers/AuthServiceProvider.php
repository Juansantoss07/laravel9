<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Produto;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        

        Gate::define('admin', function(User $usuario){
            return $usuario->admin === 1;
        });

        Gate::define('ver-produtos', function(User $user, Produto $produtos){
            return $user->id === $produtos->id_user;
        });
    }
}
