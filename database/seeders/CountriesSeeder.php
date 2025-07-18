<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    public function run(): void
    {
        // Solo México
        $mexico = [
            'id' => 142,
            'name' => 'Mexico',
            'iso3' => 'MEX',
            'iso2' => 'MX',
            'numeric_code' => '484',
            'phonecode' => '52',
            'capital' => 'Mexico City',
            'currency' => 'MXN',
            'currency_name' => 'Mexican peso',
            'currency_symbol' => '$',
            'tld' => '.mx',
            'native' => 'México',
            'region' => 'Americas',
            'region_id' => 2,
            'subregion' => 'Central America',
            'subregion_id' => 13,
            'nationality' => 'Mexican',
            'timezones' => json_encode([
                [
                    'zoneName' => 'America/Bahia_Banderas',
                    'gmtOffset' => -21600,
                    'gmtOffsetName' => 'UTC-06:00',
                    'abbreviation' => 'CST',
                    'tzName' => 'Central Standard Time'
                ],
                [
                    'zoneName' => 'America/Cancun',
                    'gmtOffset' => -18000,
                    'gmtOffsetName' => 'UTC-05:00',
                    'abbreviation' => 'EST',
                    'tzName' => 'Eastern Standard Time'
                ],
                [
                    'zoneName' => 'America/Mexico_City',
                    'gmtOffset' => -21600,
                    'gmtOffsetName' => 'UTC-06:00',
                    'abbreviation' => 'CST',
                    'tzName' => 'Central Standard Time'
                ],
                [
                    'zoneName' => 'America/Tijuana',
                    'gmtOffset' => -28800,
                    'gmtOffsetName' => 'UTC-08:00',
                    'abbreviation' => 'PST',
                    'tzName' => 'Pacific Standard Time'
                ]
            ]),
            'translations' => json_encode([
                'kr' => '멕시코',
                'pt-BR' => 'México',
                'pt' => 'México',
                'nl' => 'Mexico',
                'hr' => 'Meksiko',
                'fa' => 'مکزیک',
                'de' => 'Mexiko',
                'es' => 'México',
                'fr' => 'Mexique',
                'ja' => 'メキシコ',
                'it' => 'Messico',
                'cn' => '墨西哥',
                'tr' => 'Meksika'
            ]),
            'latitude' => '23.00000000',
            'longitude' => '-102.00000000',
            'emoji' => '🇲🇽',
            'emojiU' => 'U+1F1F2 U+1F1FD'
        ];

        Country::create($mexico);

        $this->command->info('México seeded successfully!');
    }
}