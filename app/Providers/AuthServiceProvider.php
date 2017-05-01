<?php

namespace CodeFin\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'CodeFin\Model' => 'CodeFin\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* GATE definido para retornar se true caso o usuário possua a role admin em seu cadastro*/
        Gate::define('access-admin', function($user){
            return $user->role == \CodeFin\User::ROLE_ADMIN;
        });
    }
}
