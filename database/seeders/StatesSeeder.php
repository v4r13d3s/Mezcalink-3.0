<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
{
    public function run(): void
    {
        // Los 32 estados de México
        $states = [
            ['id' => 1, 'name' => 'Aguascalientes', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'AG', 'type' => 'state', 'latitude' => '21.88234000', 'longitude' => '-102.28259000'],
            ['id' => 2, 'name' => 'Baja California', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'BC', 'type' => 'state', 'latitude' => '30.84035000', 'longitude' => '-115.28375000'],
            ['id' => 3, 'name' => 'Baja California Sur', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'BS', 'type' => 'state', 'latitude' => '26.04424000', 'longitude' => '-111.33681000'],
            ['id' => 4, 'name' => 'Campeche', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'CM', 'type' => 'state', 'latitude' => '19.84890000', 'longitude' => '-90.53491000'],
            ['id' => 5, 'name' => 'Chiapas', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'CS', 'type' => 'state', 'latitude' => '16.75973000', 'longitude' => '-93.11308000'],
            ['id' => 6, 'name' => 'Chihuahua', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'CH', 'type' => 'state', 'latitude' => '28.63528000', 'longitude' => '-106.08914000'],
            ['id' => 7, 'name' => 'Coahuila', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'CO', 'type' => 'state', 'latitude' => '27.05871000', 'longitude' => '-101.70714000'],
            ['id' => 8, 'name' => 'Colima', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'CL', 'type' => 'state', 'latitude' => '19.24997000', 'longitude' => '-103.72714000'],
            ['id' => 9, 'name' => 'Durango', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'DG', 'type' => 'state', 'latitude' => '24.55947000', 'longitude' => '-104.65960000'],
            ['id' => 10, 'name' => 'Guanajuato', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'GT', 'type' => 'state', 'latitude' => '21.01950000', 'longitude' => '-101.25735000'],
            ['id' => 11, 'name' => 'Guerrero', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'GR', 'type' => 'state', 'latitude' => '17.44010000', 'longitude' => '-99.59827000'],
            ['id' => 12, 'name' => 'Hidalgo', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'HG', 'type' => 'state', 'latitude' => '20.09390000', 'longitude' => '-98.76239000'],
            ['id' => 13, 'name' => 'Jalisco', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'JA', 'type' => 'state', 'latitude' => '20.65952000', 'longitude' => '-103.34939000'],
            ['id' => 14, 'name' => 'Estado de México', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'MX', 'type' => 'state', 'latitude' => '19.35529000', 'longitude' => '-99.58496000'],
            ['id' => 15, 'name' => 'Michoacán', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'MI', 'type' => 'state', 'latitude' => '19.56663000', 'longitude' => '-101.70677000'],
            ['id' => 16, 'name' => 'Morelos', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'MO', 'type' => 'state', 'latitude' => '18.68113000', 'longitude' => '-99.10130000'],
            ['id' => 17, 'name' => 'Nayarit', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'NA', 'type' => 'state', 'latitude' => '21.75000000', 'longitude' => '-104.84500000'],
            ['id' => 18, 'name' => 'Nuevo León', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'NL', 'type' => 'state', 'latitude' => '25.59295000', 'longitude' => '-99.99618000'],
            ['id' => 19, 'name' => 'Oaxaca', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'OA', 'type' => 'state', 'latitude' => '17.05932000', 'longitude' => '-96.71132000'],
            ['id' => 20, 'name' => 'Puebla', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'PU', 'type' => 'state', 'latitude' => '19.04334000', 'longitude' => '-98.19811000'],
            ['id' => 21, 'name' => 'Querétaro', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'QT', 'type' => 'state', 'latitude' => '20.58806000', 'longitude' => '-100.38806000'],
            ['id' => 22, 'name' => 'Quintana Roo', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'QR', 'type' => 'state', 'latitude' => '19.18117000', 'longitude' => '-88.47900000'],
            ['id' => 23, 'name' => 'San Luis Potosí', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'SL', 'type' => 'state', 'latitude' => '22.15690000', 'longitude' => '-100.98554000'],
            ['id' => 24, 'name' => 'Sinaloa', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'SI', 'type' => 'state', 'latitude' => '25.17470000', 'longitude' => '-107.47313000'],
            ['id' => 25, 'name' => 'Sonora', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'SO', 'type' => 'state', 'latitude' => '29.29726000', 'longitude' => '-110.33096000'],
            ['id' => 26, 'name' => 'Tabasco', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'TB', 'type' => 'state', 'latitude' => '17.84015000', 'longitude' => '-92.62845000'],
            ['id' => 27, 'name' => 'Tamaulipas', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'TM', 'type' => 'state', 'latitude' => '24.26694000', 'longitude' => '-98.83638000'],
            ['id' => 28, 'name' => 'Tlaxcala', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'TL', 'type' => 'state', 'latitude' => '19.31905000', 'longitude' => '-98.24033000'],
            ['id' => 29, 'name' => 'Veracruz', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'VE', 'type' => 'state', 'latitude' => '19.17340000', 'longitude' => '-96.13421000'],
            ['id' => 30, 'name' => 'Yucatán', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'YU', 'type' => 'state', 'latitude' => '20.71000000', 'longitude' => '-89.09000000'],
            ['id' => 31, 'name' => 'Zacatecas', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'ZA', 'type' => 'state', 'latitude' => '22.77001000', 'longitude' => '-102.58238000'],
            ['id' => 32, 'name' => 'Ciudad de México', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'state_code' => 'DF', 'type' => 'federal_district', 'latitude' => '19.43260000', 'longitude' => '-99.13320000']
        ];

        foreach ($states as $state) {
            State::create($state);
        }

        $this->command->info('Estados de México seeded successfully!');
    }
}