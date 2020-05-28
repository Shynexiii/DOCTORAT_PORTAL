<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->hasAnyRole(['admin']);
        });

        Gate::define('coding', function ($user) {
            return $user->hasAnyRole(['coding']);
        });

        Gate::define('secretariat', function ($user) {
            return $user->hasAnyRole(['secretariat']);
        });

        Gate::define('adminOrCoding', function ($user) {
            return $user->hasAnyRole(['admin','coding']);

        });
        
        Gate::define('adminOrSecretariat', function ($user) {
            return $user->hasAnyRole(['admin','secretariat']);
        });

        Gate::define('all', function ($user) {
            return $user->hasAnyRole(['admin','secretariat','coding']);
        });
    }
}
