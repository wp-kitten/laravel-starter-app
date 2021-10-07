<?php

namespace App\Http\Middleware;

use App\Providers\UnderMaintenanceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DenyRequestsUnderMaintenance
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle( Request $request, Closure $next )
    {
        if ( !$request->is( 'maintenance' ) ) {
            if ( Schema::hasTable( 'app_settings' ) ) {
                if ( is_under_maintenance() ) {
                    $user = app_user();

                    //#! Anonymous requests
                    if ( !$user ) {
                        return redirect( UnderMaintenanceProvider::REDIRECT_TO );
                    }
                    //#! Logged in but no admin
                    elseif ( !$user->isInRole( 'admin' ) ) {
                        auth()->logout();
                        return redirect( UnderMaintenanceProvider::REDIRECT_TO );
                    }
                }
            }
        }
        return $next( $request );
    }
}
