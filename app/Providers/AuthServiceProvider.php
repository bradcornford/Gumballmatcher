<?php

namespace App\Providers;

use App\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema;

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

        // User gates
        $this->userGates();

        // Admin gates
        $this->adminGates();
    }

    /**
     * User gates.
     *
     * @return void
     */
    protected function userGates()
    {
        Gate::define('index', function ($user) {
            return true;
        });

        Gate::define('alliance-index', function ($user) {
            return true;
        });

        Gate::define('user-index', function ($user) {
            return true;
        });

        Gate::define('faction-index', function ($user) {
            return true;
        });

        Gate::define('gumball-index', function ($user) {
            return true;
        });
        Gate::define('gumball-store', function ($user, $userId) {
            return $user->id == $userId;
        });

        Gate::define('fate-index', function ($user) {
            return true;
        });
        Gate::define('fate-store', function ($user, $userId) {
            return $user->id == $userId;
        });

        Gate::define('match-index', function ($user) {
            return true;
        });
        Gate::define('match-store', function ($user, $userId) {
            return $user->id == $userId;
        });
    }

    /**
     * Admin gates.
     *
     * @return void
     */
    protected function adminGates()
    {
        $roles = [];

        if (Schema::hasTable('roles')) {
            $roles = Role::whereIn('key', ['ADM', 'AAD'])
                ->pluck('id')
                ->toArray();
        }

        Gate::define('admin-index', function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });

        Gate::define('admin-role-index',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-role-create',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-role-edit',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-role-view',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-role-delete',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });

        Gate::define('admin-user-index',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-user-create',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-user-edit',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-user-view',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-user-delete',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });

        Gate::define('admin-alliance-index',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-alliance-create',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-alliance-edit',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-alliance-view',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-alliance-delete',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });

        Gate::define('admin-faction-index',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-faction-create',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-faction-edit',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-faction-view',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-faction-delete',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });

        Gate::define('admin-gumball-index',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-gumball-create',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-gumball-edit',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-gumball-view',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-gumball-delete',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });

        Gate::define('admin-group-index',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-group-create',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-group-edit',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-group-view',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-group-delete',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });

        Gate::define('admin-fate-index',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-fate-create',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-fate-edit',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-fate-view',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-fate-delete',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
    }
}
