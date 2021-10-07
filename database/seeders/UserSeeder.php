<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create( [
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@local.host',
            'password' => bcrypt( 'admin' ),
            'role_id' => Role::where( 'name', 'admin' )->first()->id,
            'email_verified_at' => Carbon::now(),
        ] );
        User::create( [
            'username' => 'member',
            'name' => 'Member',
            'email' => 'member@local.host',
            'password' => bcrypt( 'member' ),
            'role_id' => Role::where( 'name', 'member' )->first()->id,
            'email_verified_at' => Carbon::now(),
        ] );
    }
}
