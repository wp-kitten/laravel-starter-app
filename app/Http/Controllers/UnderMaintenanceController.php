<?php

namespace App\Http\Controllers;

class UnderMaintenanceController extends Controller
{
    public function renderUnderMaintenancePage()
    {
        //#! Prevents direct access to the view while not under maintenance
        if ( !is_under_maintenance() ) {
            return redirect()->route( 'home' );
        }
        return view( 'under-maintenance' );
    }
}
