<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;
use App\Models\District;
use App\Models\Corregimiento;
class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $provinces = [
            'Panamá' => [
                'Panamá' => ['San Felipe', 'El Chorrillo', 'Santa Ana'],
                'San Miguelito' => ['Rufina Alfaro', 'José Domingo Espinar']
            ],
            'Chiriquí' => [
                'David' => ['David', 'Pedregal'],
                'Boquete' => ['Alto Boquete', 'Caldera']
            ]
        ];

        foreach ($provinces as $provinceName => $districts) {
            // Crear la provincia
            $province = Province::create(['name' => $provinceName]);

            foreach ($districts as $districtName => $corregimientos) {
                // Crear el distrito asociado a la provincia
                $district = $province->districts()->create(['name' => $districtName]);

                foreach ($corregimientos as $corregimientoName) {
                    // Crear el corregimiento asociado al distrito
                    $district->corregimientos()->create(['name' => $corregimientoName]);
                }
            }
        }
    }
  
}
