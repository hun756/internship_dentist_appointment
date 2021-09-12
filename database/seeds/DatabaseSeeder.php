<?php

use Illuminate\Database\Seeder;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Dentist']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Patient']);
        // $this->call(UserSeeder::class);
    }
}
