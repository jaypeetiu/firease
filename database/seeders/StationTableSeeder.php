<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations = [
            [
                'id' => 1,
                'name' => 'Nazareth Fire Station',
                'lat' => '8.4686149',
                'lang' => '124.648414',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ], [
                'id' => 2,
                'name' => 'Carmen Fire Station',
                'lat' => '8.4810657',
                'lang' => '124.6358355',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ], [
                'id' => 3,
                'name' => 'Cagayan De Oro City Fire District Station 6',
                'lat' => '8.5022549',
                'lang' => '124.6313235',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ], [
                'id' => 4,
                'name' => 'Cagayan de Oro City Fire District',
                'lat' => '8.4792166',
                'lang' => '124.6512174',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ], [
                'id' => 5,
                'name' => 'Lapasan Fire Station',
                'lat' => '8.4828619',
                'lang' => '124.6649015',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ], [
                'id' => 6,
                'name' => 'Station 1A - Barangay 7 Fire Substation',
                'lat' => '8.4795308',
                'lang' => '124.6414818',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
        ];

        Station::insert($stations);
    }
}
