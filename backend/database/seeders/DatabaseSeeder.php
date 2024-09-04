<?php
// Author: Riham Muneer 
// Author: Shahd Khader

namespace Database\Seeders;
// Author: Riham Muneer 

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CitiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PropertiesTableSeeder::class);
    }
}
