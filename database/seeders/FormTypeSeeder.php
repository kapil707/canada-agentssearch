<?php

namespace Database\Seeders;

use App\Models\FormType;
use Illuminate\Database\Seeder;

class FormTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormType::firstOrCreate([
            'name' => 'Skilled Worker Assessment',
        ],[
            'shortname' => 'SA'
        ]);

        FormType::firstOrCreate([
            'name' => 'Business Immigration Assessment',
        ],[
            'shortname' => 'BA'
        ]);

        FormType::firstOrCreate([
            'name' => 'Job Seeker',
        ],[
            'shortname' => 'JS'
        ]);

        FormType::firstOrCreate([
            'name' => 'Employer Document',
        ],[
            'shortname' => 'ED'
        ]);
    }
}
