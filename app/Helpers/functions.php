<?php

use App\Models\AppSettings;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

$crtDirPath = dirname( __FILE__ );

require_once( $crtDirPath . '/WP/_wp-functions.php' );
require_once( $crtDirPath . '/WP/kses.php' );
require_once( $crtDirPath . '/WP/wp-filters.php' );
require_once( $crtDirPath . '/WP/WP_Error.php' );
require_once( $crtDirPath . '/actions.php' );

/**
 * Check to see whether or not the application is under maintenance
 * @return bool|mixed
 */
function is_under_maintenance()
{
    $setting = AppSettings::where( 'name', 'under_maintenance' )->first();
    return ( $setting && (bool)$setting->value );
}

/**
 * Retrieve the reference to the current logged-in user model
 * @return User|\Illuminate\Contracts\Auth\Authenticatable
 */
function app_user()
{
    return ( Auth::user() ?? new User() );
}

