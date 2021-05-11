<?php

namespace App\Providers;

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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
		Gate::define('admin-only', function ($user) {
            if($user->role == "admin")
            {
                return true;
            }
            return false;
        });

        Gate::define('artist-only', function ($user) {
            if ($user->role == "artist") {
                return true;
            }
            return false;
        });

        Gate::define('manager', function ($user) {
            if ($user->role == "manager") {
                return true;
            }
            return false;
        });

        //
    }
}