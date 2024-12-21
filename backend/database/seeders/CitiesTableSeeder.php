<?php

namespace Database\Seeders;
// Author: Riham Muneer 

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now(); 

        DB::table('cities')->insert([
            ['name' => 'Ramallah', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Nablus', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Hebron', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bethlehem', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Jenin', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tulkarm', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Qalqilya', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Jericho', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Salfit', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tubas', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Gaza', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Rafah', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Khan Younis', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Jabalia', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Deir al-Balah', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Beit Lahia', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Beit Hanoun', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Jaffa', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Haifa', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Acre', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Lydda', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Ramla', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Nazareth', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tiberias', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Safed', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Majdal', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Jerusalem', 'created_at' => $now, 'updated_at' => $now],
        ]);      
    }
}
