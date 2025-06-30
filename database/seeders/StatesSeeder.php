<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class StatesSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/states.json'));
        $states = json_decode($json, true);

        foreach ($states as $state) {
            State::create([
                'id' => $state['id'],
                'name' => $state['name'],
                'country_id' => $state['country_id'],
                'country_code' => $state['country_code'],
                'country_name' => $state['country_name'],
                'state_code' => $state['state_code'],
                'type' => $state['type'],
                'latitude' => $state['latitude'],
                'longitude' => $state['longitude'],
            ]);
        }

        $this->command->info('States seeded successfully!');
    }
}