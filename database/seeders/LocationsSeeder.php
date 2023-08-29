<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;
use App\Models\City;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daftarProvinsi = [
            [
                'province_id' => 1,
                'province' => 'banten',
            ]
        ];

        $daftarKota = [
            [
                'province_id' => 1,
                'city_id' => 1,
                'city_name' => 'Tangerang',
            ],
            [
                'province_id' => 1,
                'city_id' => 2,
                'city_name' => 'Serang',
            ]
        ];

        foreach ($daftarProvinsi as $provinceRow) {
            Province::create([
                'province_id' => $provinceRow['province_id'],
                'name'        => $provinceRow['province'],
            ]);
            $provinceId = $provinceRow['province_id'];
            print($provinceId);
            $kota = collect($daftarKota)->filter(function ($city) use ($provinceId) {
                return $city['province_id'] === $provinceId;
            });
            foreach ($kota as $cityRow) {
                City::create([
                    'province_id'   => $provinceRow['province_id'],
                    'city_id'       => $cityRow['city_id'],
                    'name'          => $cityRow['city_name'],
                ]);
            }
        }
    }
}