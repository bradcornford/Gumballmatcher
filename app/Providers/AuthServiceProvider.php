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
        // Index Gates
        Gate::define('index', function ($user) {
            return true;
        });

        // Alliance Gates
        Gate::define('alliance-index', function ($user) {
            return true;
        });

        // User Gates
        Gate::define('user-index', function ($user) {
            return true;
        });

        // Faction Gates
        Gate::define('faction-index', function ($user) {
            return true;
        });

        // Gumball Gates
        Gate::define('gumball-index', function ($user) {
            return true;
        });
        Gate::define('gumball-store', function ($user, $userId) {
            return $user->id == $userId;
        });

        // Fate Gates
        Gate::define('fate-index', function ($user) {
            return true;
        });
        Gate::define('fate-store', function ($user, $userId) {
            return ($user->id == $userId);
        });

        // Match Gates
        Gate::define('match-index', function ($user) {
            return true;
        });
        Gate::define('match-show', function ($user) {
            return true;
        });
        Gate::define('match-store', function ($user, $userId) {
            return ($user->id == $userId);
        });

        // Account Gates
        Gate::define('account-change-details', function ($user) {
            return true;
        });
        Gate::define('account-change-password', function ($user) {
            return true;
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
        $adminRole = null;
        $allianceRole = null;

        if (Schema::hasTable('roles')) {
            $roles = Role::whereIn('key', [Role::KEY_ADMIN, Role::KEY_ALLIANCE_ADMIN])
                ->pluck('id')
                ->toArray();
            $adminRole = Role::where('key', '=', Role::KEY_ADMIN)
                ->pluck('id')
                ->first();
            $allianceRole = Role::where('key', '=', Role::KEY_ALLIANCE_ADMIN)
                ->pluck('id')
                ->first();
        }

        // Index Gates
        Gate::define('admin-index', function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });

        // Role Gates
        Gate::define('admin-role-index',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-role-create',  function ($user) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-role-edit',  function ($user, $item) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-role-view',  function ($user, $item) use ($roles, $adminRole) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-role-delete',  function ($user, $item) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-role-mass-delete',  function ($user) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });

        // User Gates
        Gate::define('admin-user-index',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-user-create',  function ($user) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-user-edit',  function ($user, $item) use ($roles, $adminRole, $allianceRole) {
            if ($user->role_id == $adminRole) {
                return true;
            }

            if ($user->role_id == $allianceRole &&
                $user->alliance_id == $item->alliance_id &&
                $user->role->key !== Role::KEY_ADMIN
            ) {
                return true;
            }

            return false;
        });
        Gate::define('admin-user-view',  function ($user, $item) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-user-delete',  function ($user, $item) use ($roles, $adminRole, $allianceRole) {
            if ($user->role_id == $adminRole) {
                return true;
            }

            if ($user->role_id == $allianceRole &&
                $user->alliance_id == $item->alliance_id && $user->id != $item->id &&
                $user->role->key !== Role::KEY_ADMIN
            ) {
                return true;
            }

            return false;
        });
        Gate::define('admin-user-mass-delete',  function ($user) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });

        // Alliance Gates
        Gate::define('admin-alliance-index',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-alliance-create',  function ($user) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-alliance-edit',  function ($user, $item) use ($roles, $adminRole, $allianceRole) {
            if ($user->role_id == $adminRole) {
                return true;
            }

            if ($user->role_id == $allianceRole && $user->alliance_id == $item->id) {
                return true;
            }

            return false;
        });
        Gate::define('admin-alliance-view',  function ($user, $item) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-alliance-delete',  function ($user, $item) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-alliance-mass-delete',  function ($user) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });

        // Faction Gates
        Gate::define('admin-faction-index',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-faction-create',  function ($user) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-faction-edit',  function ($user, $item) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-faction-view',  function ($user, $item) use ($roles, $adminRole) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-faction-delete',  function ($user, $item) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-faction-mass-delete',  function ($user) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });

        // Gumball Gates
        Gate::define('admin-gumball-index',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-gumball-create',  function ($user) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-gumball-edit',  function ($user, $item) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-gumball-view',  function ($user, $item) use ($roles, $adminRole) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-gumball-delete',  function ($user, $item) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-gumball-mass-delete',  function ($user) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });

        // Group Gates
        Gate::define('admin-group-index',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-group-create',  function ($user) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-group-edit',  function ($user, $item) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-group-view',  function ($user, $item) use ($roles, $adminRole) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-group-delete',  function ($user, $item) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-group-mass-delete',  function ($user) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });

        // Fate Gates
        Gate::define('admin-fate-index',  function ($user) use ($roles) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-fate-create',  function ($user) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-fate-edit',  function ($user, $item) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-fate-view',  function ($user, $item) use ($roles, $adminRole) {
            return in_array($user->role_id, $roles);
        });
        Gate::define('admin-fate-delete',  function ($user, $item) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
        Gate::define('admin-fate-mass-delete',  function ($user) use ($roles, $adminRole) {
            return ($user->role_id == $adminRole);
        });
    }
}
