<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnderMaintenanceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*
 * Display the under maintenance page for anonymous users & authenticated users not Administrators
 */
Route::get( '/maintenance', [ UnderMaintenanceController::class, 'renderUnderMaintenancePage' ] )->name( 'under_maintenance' );

/*
 * Display the splash page for anonymous users & redirect to "home" authenticated users
 */
Route::get( '/', [ HomeController::class, 'renderFrontPage' ] )->name( 'site.frontpage' );

Auth::routes();

//#! Require authenticated user
//#! Route must exist since it's used in AUTH controllers as is: /home
Route::get( '/home', [ HomeController::class, 'renderHomePage' ] )->name( 'home' )->middleware( [ 'web', 'auth' ] );
