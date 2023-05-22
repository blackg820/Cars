<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{


    public static $permissions = [
        'edit-profile' => ['owner', 'admin', 'user'],
        'edit-location' => ['owner', 'admin', 'user'],
        'edit-users' => ['owner', 'admin'],
        'edit-admins' => ['owner'],
    ];


    /**
     * The policy mappings for the application.
     *
     * @var array
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

            // Roles based authorization
        Gate::before(
            function ($user, $ability) {
                if ($user->role === 'owner') {
                    return true;
                }
            }
        );

        foreach (self::$permissions as $action=> $roles) {
            Gate::define(
                $action,
                function (User $user) use ($roles) {
                    if (in_array($user->role, $roles)) {
                        return true;
                    }
                }
            );
        }
    }
}
