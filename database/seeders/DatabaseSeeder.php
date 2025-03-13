<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::findOrCreate('super_admin');
        Role::findOrCreate('admin');
        $user = User::updateOrCreate([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ],[
            'password' => Hash::make('Admin@2022')
        ]);

        $user->assignRole(['super_admin']);

        $this->call([
            SettingsTableSeeder::class,
            CountrySeeder::class,
            FormTypeSeeder::class
        ]);
    }
}
