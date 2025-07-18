<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    public function run(): void
    {
        // Ciudades principales de México (muestra representativa)
        $cities = [
            // Aguascalientes
            ['id' => 1, 'name' => 'Aguascalientes', 'state_id' => 1, 'state_code' => 'AG', 'state_name' => 'Aguascalientes', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '21.88234000', 'longitude' => '-102.28259000', 'wikiDataId' => 'Q81033'],
            ['id' => 2, 'name' => 'Calvillo', 'state_id' => 1, 'state_code' => 'AG', 'state_name' => 'Aguascalientes', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '21.84720000', 'longitude' => '-102.71906000', 'wikiDataId' => 'Q1755113'],
            
            // Baja California
            ['id' => 3, 'name' => 'Tijuana', 'state_id' => 2, 'state_code' => 'BC', 'state_name' => 'Baja California', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '32.51467000', 'longitude' => '-117.03833000', 'wikiDataId' => 'Q124739'],
            ['id' => 4, 'name' => 'Mexicali', 'state_id' => 2, 'state_code' => 'BC', 'state_name' => 'Baja California', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '32.62781000', 'longitude' => '-115.45446000', 'wikiDataId' => 'Q124739'],
            ['id' => 5, 'name' => 'Ensenada', 'state_id' => 2, 'state_code' => 'BC', 'state_name' => 'Baja California', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '31.86613000', 'longitude' => '-116.59723000', 'wikiDataId' => 'Q124739'],
            
            // Baja California Sur
            ['id' => 6, 'name' => 'La Paz', 'state_id' => 3, 'state_code' => 'BS', 'state_name' => 'Baja California Sur', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '24.14437000', 'longitude' => '-110.31006000', 'wikiDataId' => 'Q1163522'],
            ['id' => 7, 'name' => 'Los Cabos', 'state_id' => 3, 'state_code' => 'BS', 'state_name' => 'Baja California Sur', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '22.89070000', 'longitude' => '-109.91673000', 'wikiDataId' => 'Q1163522'],
            
            // Campeche
            ['id' => 8, 'name' => 'Campeche', 'state_id' => 4, 'state_code' => 'CM', 'state_name' => 'Campeche', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '19.84890000', 'longitude' => '-90.53491000', 'wikiDataId' => 'Q180511'],
            ['id' => 9, 'name' => 'Ciudad del Carmen', 'state_id' => 4, 'state_code' => 'CM', 'state_name' => 'Campeche', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '18.65350000', 'longitude' => '-91.83210000', 'wikiDataId' => 'Q180511'],
            
            // Chiapas
            ['id' => 10, 'name' => 'Tuxtla Gutiérrez', 'state_id' => 5, 'state_code' => 'CS', 'state_name' => 'Chiapas', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '16.75973000', 'longitude' => '-93.11308000', 'wikiDataId' => 'Q207906'],
            ['id' => 11, 'name' => 'San Cristóbal de las Casas', 'state_id' => 5, 'state_code' => 'CS', 'state_name' => 'Chiapas', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '16.73176000', 'longitude' => '-92.64126000', 'wikiDataId' => 'Q207906'],
            ['id' => 12, 'name' => 'Tapachula', 'state_id' => 5, 'state_code' => 'CS', 'state_name' => 'Chiapas', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '14.89305000', 'longitude' => '-92.26126000', 'wikiDataId' => 'Q207906'],
            
            // Chihuahua
            ['id' => 13, 'name' => 'Chihuahua', 'state_id' => 6, 'state_code' => 'CH', 'state_name' => 'Chihuahua', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '28.63528000', 'longitude' => '-106.08914000', 'wikiDataId' => 'Q61302'],
            ['id' => 14, 'name' => 'Ciudad Juárez', 'state_id' => 6, 'state_code' => 'CH', 'state_name' => 'Chihuahua', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '31.69361000', 'longitude' => '-106.42889000', 'wikiDataId' => 'Q61302'],
            
            // Coahuila
            ['id' => 15, 'name' => 'Saltillo', 'state_id' => 7, 'state_code' => 'CO', 'state_name' => 'Coahuila', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '25.42321000', 'longitude' => '-101.00530000', 'wikiDataId' => 'Q188517'],
            ['id' => 16, 'name' => 'Torreón', 'state_id' => 7, 'state_code' => 'CO', 'state_name' => 'Coahuila', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '25.54389000', 'longitude' => '-103.41898000', 'wikiDataId' => 'Q188517'],
            
            // Colima
            ['id' => 17, 'name' => 'Colima', 'state_id' => 8, 'state_code' => 'CL', 'state_name' => 'Colima', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '19.24997000', 'longitude' => '-103.72714000', 'wikiDataId' => 'Q81033'],
            ['id' => 18, 'name' => 'Manzanillo', 'state_id' => 8, 'state_code' => 'CL', 'state_name' => 'Colima', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '19.11424000', 'longitude' => '-104.32891000', 'wikiDataId' => 'Q81033'],
            
            // Durango
            ['id' => 19, 'name' => 'Durango', 'state_id' => 9, 'state_code' => 'DG', 'state_name' => 'Durango', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '24.02032000', 'longitude' => '-104.65756000', 'wikiDataId' => 'Q61302'],
            ['id' => 20, 'name' => 'Gómez Palacio', 'state_id' => 9, 'state_code' => 'DG', 'state_name' => 'Durango', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '25.56598000', 'longitude' => '-103.49598000', 'wikiDataId' => 'Q61302'],
            
            // Guanajuato
            ['id' => 21, 'name' => 'Guanajuato', 'state_id' => 10, 'state_code' => 'GT', 'state_name' => 'Guanajuato', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '21.01950000', 'longitude' => '-101.25735000', 'wikiDataId' => 'Q81033'],
            ['id' => 22, 'name' => 'León', 'state_id' => 10, 'state_code' => 'GT', 'state_name' => 'Guanajuato', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '21.12908000', 'longitude' => '-101.68661000', 'wikiDataId' => 'Q81033'],
            ['id' => 23, 'name' => 'Irapuato', 'state_id' => 10, 'state_code' => 'GT', 'state_name' => 'Guanajuato', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '20.67678000', 'longitude' => '-101.35628000', 'wikiDataId' => 'Q81033'],
            
            // Guerrero
            ['id' => 24, 'name' => 'Chilpancingo', 'state_id' => 11, 'state_code' => 'GR', 'state_name' => 'Guerrero', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '17.55092000', 'longitude' => '-99.50516000', 'wikiDataId' => 'Q188517'],
            ['id' => 25, 'name' => 'Acapulco', 'state_id' => 11, 'state_code' => 'GR', 'state_name' => 'Guerrero', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '16.86336000', 'longitude' => '-99.88840000', 'wikiDataId' => 'Q188517'],
            
            // Hidalgo
            ['id' => 26, 'name' => 'Pachuca', 'state_id' => 12, 'state_code' => 'HG', 'state_name' => 'Hidalgo', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '20.12190000', 'longitude' => '-98.73680000', 'wikiDataId' => 'Q207906'],
            ['id' => 27, 'name' => 'Tulancingo', 'state_id' => 12, 'state_code' => 'HG', 'state_name' => 'Hidalgo', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '20.08390000', 'longitude' => '-98.36280000', 'wikiDataId' => 'Q207906'],
            
            // Jalisco
            ['id' => 28, 'name' => 'Guadalajara', 'state_id' => 13, 'state_code' => 'JA', 'state_name' => 'Jalisco', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '20.65952000', 'longitude' => '-103.34939000', 'wikiDataId' => 'Q124739'],
            ['id' => 29, 'name' => 'Zapopan', 'state_id' => 13, 'state_code' => 'JA', 'state_name' => 'Jalisco', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '20.72356000', 'longitude' => '-103.38479000', 'wikiDataId' => 'Q124739'],
            ['id' => 30, 'name' => 'Puerto Vallarta', 'state_id' => 13, 'state_code' => 'JA', 'state_name' => 'Jalisco', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '20.61027000', 'longitude' => '-105.23067000', 'wikiDataId' => 'Q124739'],
            
            // Estado de México
            ['id' => 31, 'name' => 'Toluca', 'state_id' => 14, 'state_code' => 'MX', 'state_name' => 'Estado de México', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '19.28786000', 'longitude' => '-99.65324000', 'wikiDataId' => 'Q61302'],
            ['id' => 32, 'name' => 'Ecatepec', 'state_id' => 14, 'state_code' => 'MX', 'state_name' => 'Estado de México', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '19.60492000', 'longitude' => '-99.05944000', 'wikiDataId' => 'Q61302'],
            ['id' => 33, 'name' => 'Naucalpan', 'state_id' => 14, 'state_code' => 'MX', 'state_name' => 'Estado de México', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '19.47851000', 'longitude' => '-99.23963000', 'wikiDataId' => 'Q61302'],
            
            // Michoacán
            ['id' => 34, 'name' => 'Morelia', 'state_id' => 15, 'state_code' => 'MI', 'state_name' => 'Michoacán', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '19.70078000', 'longitude' => '-101.18443000', 'wikiDataId' => 'Q180511'],
            ['id' => 35, 'name' => 'Uruapan', 'state_id' => 15, 'state_code' => 'MI', 'state_name' => 'Michoacán', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '19.42127000', 'longitude' => '-102.06270000', 'wikiDataId' => 'Q180511'],
            
            // Morelos
            ['id' => 36, 'name' => 'Cuernavaca', 'state_id' => 16, 'state_code' => 'MO', 'state_name' => 'Morelos', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '18.92140000', 'longitude' => '-99.23840000', 'wikiDataId' => 'Q1163522'],
            ['id' => 37, 'name' => 'Jiutepec', 'state_id' => 16, 'state_code' => 'MO', 'state_name' => 'Morelos', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '18.87570000', 'longitude' => '-99.17640000', 'wikiDataId' => 'Q1163522'],
            
            // Nayarit
            ['id' => 38, 'name' => 'Tepic', 'state_id' => 17, 'state_code' => 'NA', 'state_name' => 'Nayarit', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '21.50895000', 'longitude' => '-104.89567000', 'wikiDataId' => 'Q207906'],
            ['id' => 39, 'name' => 'Bahía de Banderas', 'state_id' => 17, 'state_code' => 'NA', 'state_name' => 'Nayarit', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '20.75000000', 'longitude' => '-105.25000000', 'wikiDataId' => 'Q207906'],
            
            // Nuevo León
            ['id' => 40, 'name' => 'Monterrey', 'state_id' => 18, 'state_code' => 'NL', 'state_name' => 'Nuevo León', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '25.68786000', 'longitude' => '-100.31681000', 'wikiDataId' => 'Q81033'],
            ['id' => 41, 'name' => 'Guadalupe', 'state_id' => 18, 'state_code' => 'NL', 'state_name' => 'Nuevo León', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '25.67678000', 'longitude' => '-100.25646000', 'wikiDataId' => 'Q81033'],
            ['id' => 42, 'name' => 'San Nicolás de los Garza', 'state_id' => 18, 'state_code' => 'NL', 'state_name' => 'Nuevo León', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '25.74167000', 'longitude' => '-100.30639000', 'wikiDataId' => 'Q81033'],
            
            // Oaxaca
            ['id' => 43, 'name' => 'Oaxaca', 'state_id' => 19, 'state_code' => 'OA', 'state_name' => 'Oaxaca', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '17.05932000', 'longitude' => '-96.71132000', 'wikiDataId' => 'Q188517'],
            ['id' => 44, 'name' => 'Salina Cruz', 'state_id' => 19, 'state_code' => 'OA', 'state_name' => 'Oaxaca', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '16.16756000', 'longitude' => '-95.19392000', 'wikiDataId' => 'Q188517'],
            
            // Puebla
            ['id' => 45, 'name' => 'Puebla', 'state_id' => 20, 'state_code' => 'PU', 'state_name' => 'Puebla', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '19.04334000', 'longitude' => '-98.19811000', 'wikiDataId' => 'Q124739'],
            ['id' => 46, 'name' => 'Tehuacán', 'state_id' => 20, 'state_code' => 'PU', 'state_name' => 'Puebla', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '18.46200000', 'longitude' => '-97.39400000', 'wikiDataId' => 'Q124739'],
            
            // Querétaro
            ['id' => 47, 'name' => 'Querétaro', 'state_id' => 21, 'state_code' => 'QT', 'state_name' => 'Querétaro', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '20.58806000', 'longitude' => '-100.38806000', 'wikiDataId' => 'Q1755113'],
            ['id' => 48, 'name' => 'San Juan del Río', 'state_id' => 21, 'state_code' => 'QT', 'state_name' => 'Querétaro', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '20.38890000', 'longitude' => '-99.99640000', 'wikiDataId' => 'Q1755113'],
            
            // Quintana Roo
            ['id' => 49, 'name' => 'Chetumal', 'state_id' => 22, 'state_code' => 'QR', 'state_name' => 'Quintana Roo', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '18.50036000', 'longitude' => '-88.29639000', 'wikiDataId' => 'Q180511'],
            ['id' => 50, 'name' => 'Cancún', 'state_id' => 22, 'state_code' => 'QR', 'state_name' => 'Quintana Roo', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '21.16122000', 'longitude' => '-86.85151000', 'wikiDataId' => 'Q180511'],
            ['id' => 51, 'name' => 'Playa del Carmen', 'state_id' => 22, 'state_code' => 'QR', 'state_name' => 'Quintana Roo', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '20.62963000', 'longitude' => '-87.07392000', 'wikiDataId' => 'Q180511'],
            
            // San Luis Potosí
            ['id' => 52, 'name' => 'San Luis Potosí', 'state_id' => 23, 'state_code' => 'SL', 'state_name' => 'San Luis Potosí', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '22.15690000', 'longitude' => '-100.98554000', 'wikiDataId' => 'Q61302'],
            ['id' => 53, 'name' => 'Soledad de Graciano Sánchez', 'state_id' => 23, 'state_code' => 'SL', 'state_name' => 'San Luis Potosí', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '22.18270000', 'longitude' => '-100.94090000', 'wikiDataId' => 'Q61302'],
            
            // Sinaloa
            ['id' => 54, 'name' => 'Culiacán', 'state_id' => 24, 'state_code' => 'SI', 'state_name' => 'Sinaloa', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '24.79032000', 'longitude' => '-107.38782000', 'wikiDataId' => 'Q207906'],
            ['id' => 55, 'name' => 'Mazatlán', 'state_id' => 24, 'state_code' => 'SI', 'state_name' => 'Sinaloa', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '23.24908000', 'longitude' => '-106.41169000', 'wikiDataId' => 'Q207906'],
            
            // Sonora
            ['id' => 56, 'name' => 'Hermosillo', 'state_id' => 25, 'state_code' => 'SO', 'state_name' => 'Sonora', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '29.07260000', 'longitude' => '-110.95590000', 'wikiDataId' => 'Q1163522'],
            ['id' => 57, 'name' => 'Ciudad Obregón', 'state_id' => 25, 'state_code' => 'SO', 'state_name' => 'Sonora', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '27.48297000', 'longitude' => '-109.94045000', 'wikiDataId' => 'Q1163522'],
            
            // Tabasco
            ['id' => 58, 'name' => 'Villahermosa', 'state_id' => 26, 'state_code' => 'TB', 'state_name' => 'Tabasco', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '17.98689000', 'longitude' => '-92.93028000', 'wikiDataId' => 'Q180511'],
            ['id' => 59, 'name' => 'Comalcalco', 'state_id' => 26, 'state_code' => 'TB', 'state_name' => 'Tabasco', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '18.26670000', 'longitude' => '-93.25000000', 'wikiDataId' => 'Q180511'],
            
            // Tamaulipas
            ['id' => 60, 'name' => 'Ciudad Victoria', 'state_id' => 27, 'state_code' => 'TM', 'state_name' => 'Tamaulipas', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '23.74174000', 'longitude' => '-99.14599000', 'wikiDataId' => 'Q188517'],
            ['id' => 61, 'name' => 'Reynosa', 'state_id' => 27, 'state_code' => 'TM', 'state_name' => 'Tamaulipas', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '26.08061000', 'longitude' => '-98.28835000', 'wikiDataId' => 'Q188517'],
            ['id' => 62, 'name' => 'Matamoros', 'state_id' => 27, 'state_code' => 'TM', 'state_name' => 'Tamaulipas', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '25.52490000', 'longitude' => '-97.50439000', 'wikiDataId' => 'Q188517'],
            
            // Tlaxcala
            ['id' => 63, 'name' => 'Tlaxcala', 'state_id' => 28, 'state_code' => 'TL', 'state_name' => 'Tlaxcala', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '19.31905000', 'longitude' => '-98.24033000', 'wikiDataId' => 'Q1755113'],
            ['id' => 64, 'name' => 'Apizaco', 'state_id' => 28, 'state_code' => 'TL', 'state_name' => 'Tlaxcala', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '19.41690000', 'longitude' => '-98.15360000', 'wikiDataId' => 'Q1755113'],
            
            // Veracruz
            ['id' => 65, 'name' => 'Xalapa', 'state_id' => 29, 'state_code' => 'VE', 'state_name' => 'Veracruz', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '19.54348000', 'longitude' => '-96.91010000', 'wikiDataId' => 'Q124739'],
            ['id' => 66, 'name' => 'Veracruz', 'state_id' => 29, 'state_code' => 'VE', 'state_name' => 'Veracruz', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '19.17340000', 'longitude' => '-96.13421000', 'wikiDataId' => 'Q124739'],
            ['id' => 67, 'name' => 'Coatzacoalcos', 'state_id' => 29, 'state_code' => 'VE', 'state_name' => 'Veracruz', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '18.13440000', 'longitude' => '-94.45840000', 'wikiDataId' => 'Q124739'],
            ['id' => 68, 'name' => 'Córdoba', 'state_id' => 29, 'state_code' => 'VE', 'state_name' => 'Veracruz', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '18.88110000', 'longitude' => '-96.93440000', 'wikiDataId' => 'Q124739'],
            
            // Yucatán
            ['id' => 69, 'name' => 'Mérida', 'state_id' => 30, 'state_code' => 'YU', 'state_name' => 'Yucatán', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '20.96737000', 'longitude' => '-89.59246000', 'wikiDataId' => 'Q207906'],
            ['id' => 70, 'name' => 'Kanasín', 'state_id' => 30, 'state_code' => 'YU', 'state_name' => 'Yucatán', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '20.94170000', 'longitude' => '-89.54170000', 'wikiDataId' => 'Q207906'],
            
            // Zacatecas
            ['id' => 71, 'name' => 'Zacatecas', 'state_id' => 31, 'state_code' => 'ZA', 'state_name' => 'Zacatecas', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '22.77001000', 'longitude' => '-102.58238000', 'wikiDataId' => 'Q61302'],
            ['id' => 72, 'name' => 'Guadalupe', 'state_id' => 31, 'state_code' => 'ZA', 'state_name' => 'Zacatecas', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '22.75900000', 'longitude' => '-102.51170000', 'wikiDataId' => 'Q61302'],
            
            // Ciudad de México
            ['id' => 73, 'name' => 'Ciudad de México', 'state_id' => 32, 'state_code' => 'DF', 'state_name' => 'Ciudad de México', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '19.43260000', 'longitude' => '-99.13320000', 'wikiDataId' => 'Q1489'],
            ['id' => 74, 'name' => 'Iztapalapa', 'state_id' => 32, 'state_code' => 'DF', 'state_name' => 'Ciudad de México', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '19.35730000', 'longitude' => '-99.05550000', 'wikiDataId' => 'Q1489'],
            ['id' => 75, 'name' => 'Gustavo A. Madero', 'state_id' => 32, 'state_code' => 'DF', 'state_name' => 'Ciudad de México', 'country_id' => 142, 'country_code' => 'MX', 'country_name' => 'Mexico', 'latitude' => '19.48560000', 'longitude' => '-99.10470000', 'wikiDataId' => 'Q1489'],
        ];

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

        $this->command->info('Ciudades de México seeded successfully!');
    }
}