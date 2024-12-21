<?php

namespace Database\Seeders;
// Author: Riham Muneer 
// Author: Saleh Sawalha

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $now = Carbon::now();  

        DB::table('properties')->insert([
            [
                'agent_id' => 1,
                'description' => 'Spacious 3-bedroom apartment with modern amenities.',
                'price' => 300000,
                'location' => 'New York, NY',
                'title' => 'Spacious 3 Bedroom Apartment',
                'buildingType' => 'Residential',
                'size' => 1500,
                'propertyType' => 'sell',
                'city_id' => 22,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'agent_id' => 1,
                'description' => 'Charming 2-bedroom house with a large backyard.',
                'price' => 250000,
                'location' => 'San Francisco, CA',
                'title' => 'Charming 2 Bedroom House',
                'buildingType' => 'Residential',
                'size' => 1200,
                'propertyType' => 'rent',
                'city_id' => 12,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'agent_id' => 2,
                'description' => 'Luxurious 4-bedroom villa with stunning ocean views.',
                'price' => 800000,
                'location' => 'Miami, FL',
                'title' => 'Luxurious 4 Bedroom Villa',
                'buildingType' => 'Residential',
                'size' => 3500,
                'propertyType' => 'rent',
                'city_id' => 12,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'agent_id' => 1, 
                'title' => 'Apartment in Nablus',
                'description' => 'A beautiful apartment located in the heart of Nablus.',
                'city_id' => 2,
                'location' => 'to be added',
                'size' => 150.0,
                'buildingType' => 'Residential',
                'propertyType' => 'rent',
                'price' => 1500.00,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'agent_id' => 1, 
                'title' => 'Factory in Ramallah',
                'description' => 'Near to Ramallah center',
                'city_id' => 1,
                'location' => 'to be added',
                'size' => 1500.0,
                'buildingType' => 'Industrial',
                'propertyType' => 'sell',
                'price' => 150000.00,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'agent_id' => 1, 
                'title' => 'Apartment in Gaza',
                'description' => 'A beautiful apartment located on the sea.',
                'city_id' => 11,
                'location' => 'to be added',
                'size' => 200.0,
                'buildingType' => 'Residential',
                'propertyType' => 'rent',
                'price' => 2500.00,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
