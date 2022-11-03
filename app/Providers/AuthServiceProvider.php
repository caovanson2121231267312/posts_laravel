<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        // Implicitly grant "Super-Admin" role all permission checks using can()
        \Gate::before(function ($user, $ability) {
            return $user->hasRole('Super-Admin') ? true : null;
        });

        /* define a admin user role */
        \Gate::define('isSuperAdmin', function($user) {
            return $user->role == 'Super-Admin';
         });
    }
}
