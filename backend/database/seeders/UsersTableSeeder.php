<?php

namespace Database\Seeders;
// Author: Riham Muneer 

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        DB::table('users')->insert([
            [
                'username' => 'riham_katout',
                'name' => 'Riham Katout',
                'email' => 'rihamkatm@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'admin',
                'remember_token' => Str::random(10),
                'email_verified_at' => $now,
                'phone_number' => '0599887766',
                'city_id' => 1,
                'picture_path' => 'to be added',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'shahd_khader',
                'name' => 'Shahd Khader',
                'email' => 'shahd@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'remember_token' => Str::random(10),
                'email_verified_at' => $now,
                'phone_number' => '0599887736',
                'city_id' => 1,
                'picture_path' => 'to be added',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'saleh_sawalha',
                'name' => 'Saleh Sawalha',
                'email' => 'saleh@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'remember_token' => Str::random(10),
                'email_verified_at' => $now,
                'phone_number' => '0599887336',
                'city_id' => 1,
                'picture_path' => 'to be added',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'ahmad123',
                'name' => 'Ahmad Katout',
                'email' => 'ahmad@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'agent',
                'remember_token' => Str::random(10),
                'email_verified_at' => $now,
                'phone_number' => '0599387336',
                'city_id' => 2,
                'picture_path' => 'to be added',
                'created_at' => $now,
                'updated_at' => $now,
            ], 
            [
                'username' => 'raya_masri',
                'name' => 'Raya Masri',
                'email' => 'raia@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'agent',
                'remember_token' => Str::random(10),
                'email_verified_at' => $now,
                'phone_number' => '0593887336',
                'city_id' => 4,
                'picture_path' => 'to be added',
                'created_at' => $now,
                'updated_at' => $now,
            ], 
            [
                'username' => 'montaser200',
                'name' => 'Montaser Asmar',
                'email' => 'montaser@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'client',
                'remember_token' => Str::random(10),
                'email_verified_at' => $now,
                'phone_number' => '0599187336',
                'city_id' => 6,
                'picture_path' => 'to be added',
                'created_at' => $now,
                'updated_at' => $now,
            ], 
            [
                'username' => 'wafa_adham',
                'name' => 'Wafa Adham',
                'email' => 'adham@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'agent',
                'remember_token' => Str::random(10),
                'email_verified_at' => $now,
                'phone_number' => '0599887136',
                'city_id' => 1,
                'picture_path' => 'to be added',
                'created_at' => $now,
                'updated_at' => $now,
            ], 
            [
                'username' => 'samer_arandi',
                'name' => 'Samer Arandi',
                'email' => 'samer@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'client',
                'remember_token' => Str::random(10),
                'email_verified_at' => $now,
                'phone_number' => '0569887336',
                'city_id' => 7,
                'picture_path' => 'to be added',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
