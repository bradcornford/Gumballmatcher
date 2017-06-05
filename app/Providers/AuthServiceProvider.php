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

        Gate::define(
            'index',
            function ($user) {
                return true;
            }
        );

        Gate::define(
            'alliance-index',
            function ($user) {
                return true;
            }
        );


        Gate::define(
            'user-index',
            function ($user) {
                return true;
            }
        );


        Gate::define(
            'faction-index',
            function ($user) {
                return true;
            }
        );

        Gate::define(
            'gumball-index',
            function ($user) {
                return true;
            }
        );

        Gate::define(
            'gumball-store',
            function ($user, $userId) {
                return $user->id == $userId;
            }
        );

        Gate::define(
            'fate-index',
            function ($user) {
                return true;
            }
        );

        Gate::define(
            'fate-store',
            function ($user, $userId) {
                return $user->id == $userId;
            }
        );

        Gate::define(
            'match-index',
            function ($user) {
                return true;
            }
        );
    }
}
