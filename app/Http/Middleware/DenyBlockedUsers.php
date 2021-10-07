<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DenyBlockedUsers
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
        if ( $user = app_user() ) {
            if ( $user->is_blocked ) {
                //#! Abort or redirect to a custom route
                abort( 403 );
                return null;
            }
        }
        return $next( $request );
    }
}
