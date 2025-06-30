<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountriesSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/countries.json'));
        $countries = json_decode($json, true);

        foreach ($countries as $country) {
            Country::create([
                'id' => $country['id'],
                'name' => $country['name'],
                'iso3' => $country['iso3'],
                'iso2' => $country['iso2'],
                'numeric_code' => $country['numeric_code'],
                'phonecode' => $country['phonecode'],
                'capital' => $country['capital'],
                'currency' => $country['currency'],
                'currency_name' => $country['currency_name'],
                'currency_symbol' => $country['currency_symbol'],
                'tld' => $country['tld'],
                'native' => $country['native'],
                'region' => $country['region'],
                'region_id' => $country['region_id'],
                'subregion' => $country['subregion'],
                'subregion_id' => $country['subregion_id'],
                'nationality' => $country['nationality'],
                'timezones' => $country['timezones'],
                'translations' => $country['translations'],
                'latitude' => $country['latitude'],
                'longitude' => $country['longitude'],
                'emoji' => $country['emoji'],
                'emojiU' => $country['emojiU'],
            ]);
        }

        $this->command->info('Countries seeded successfully!');
    }
}