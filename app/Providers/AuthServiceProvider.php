<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
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

        //#! Register user capabilities
        //#! Accessible through auth()->user()->can(ROLE_NAME);
        try {
            /*
             * Add gateways for roles dynamically
             */
            $roles = Role::all();
            foreach ( $roles as $role ) {
                Gate::define( $role->name, function ( User $user ) use ( $role ) {
                    //#! Site admins match all
                    if ( $role->name == Role::ROLE_ADMIN ) {
                        return true;
                    }
                    return $user->isInRole( $role->name );
                } );
            }
        }
        catch ( \Exception $e ) {
        }

    }
}
