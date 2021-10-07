<?php

use Carbon\Carbon;

//add_action( 'app/before/content', function () {
//    echo view()->make( 'components.navbar' );
//} );

//
add_action( 'update/last-seen', function ( $user ) {
    $user->last_seen = Carbon::now();
    $user->update();
} );
