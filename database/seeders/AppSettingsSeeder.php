<?php

namespace Database\Seeders;

use App\Models\AppSettings;
use Illuminate\Database\Seeder;

class AppSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            //#! Whether the app is under maintenance
            'under_maintenance' => false,
        ];

        foreach ( $settings as $name => $value ) {
            AppSettings::create( [
                'name' => $name,
                'value' => $value,
            ] );
        }
    }
}
