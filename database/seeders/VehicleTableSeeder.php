<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicles = [
            [
                'id' => 1,
                'name' => 'Fire Truck',
                'platenumber' => 'XYZ 1001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Electric Truck',
                'platenumber' => 'XYZ 1002',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Ambulance',
                'platenumber' => 'XYZ 1003',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Vehicle::insert($vehicles);
    }
}
