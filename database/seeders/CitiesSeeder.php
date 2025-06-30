<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    public function run(): void
    {
        //DB::table('cities')->truncate(); // <--- Agrega esto antes de insertar

        $json = File::get(database_path('data/cities.json'));
        $cities = json_decode($json, true);

        // Procesar en lotes para evitar problemas de memoria
        $batchSize = 1000;
        $chunks = array_chunk($cities, $batchSize);

        foreach ($chunks as $chunk) {
            $cityData = [];
            foreach ($chunk as $city) {
                $cityData[] = [
                    'id' => $city['id'],
                    'name' => $city['name'],
                    'state_id' => $city['state_id'],
                    'state_code' => $city['state_code'],
                    'state_name' => $city['state_name'],
                    'country_id' => $city['country_id'],
                    'country_code' => $city['country_code'],
                    'country_name' => $city['country_name'],
                    'latitude' => $city['latitude'],
                    'longitude' => $city['longitude'],
                    'wikiDataId' => $city['wikiDataId'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            
            City::insert($cityData);
        }

        $this->command->info('Cities seeded successfully!');
    }
}