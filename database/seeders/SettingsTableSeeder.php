<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::firstOrCreate([
            'key' => 'home_page'
        ],[
            'value' =>  NULL
        ]);

        Setting::firstOrCreate([
            'key' => 'home_show_testimonials'
        ],[
            'value' =>  0
        ]);

        Setting::firstOrCreate([
            'key' => 'home_show_callback_form'
        ],[
            'value' =>  0
        ]);

        Setting::firstOrCreate([
            'key' => 'home_show_team'
        ],[
            'value' =>  0
        ]);

        Setting::firstOrCreate([
            'key' => 'home_show_address_block'
        ],[
            'value' =>  0
        ]);
    }
}
