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
                'address' => 'Cogon Station 1',
                'lat' => '8.4686149',
                'lang' => '124.648414',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ], [
                'id' => 2,
                'address' => 'Burgos Station 1A',
                'lat' => '8.4810657',
                'lang' => '124.6358355',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ], [
                'id' => 3,
                'address' => 'Lapasan Station 2',
                'lat' => '8.5022549',
                'lang' => '124.6313235',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ], [
                'id' => 4,
                'address' => 'Carmen Station 3',
                'lat' => '8.4792166',
                'lang' => '124.6512174',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ], [
                'id' => 5,
                'address' => 'Balulang Station 3A',
                'lat' => '8.4828619',
                'lang' => '124.6649015',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ], [
                'id' => 6,
                'address' => 'Nazareth Station 4',
                'lat' => '8.4795308',
                'lang' => '124.6414818',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
            [
                'id' => 7,
                'address' => 'Macasandig Station 4A',
                'lat' => '8.4795308',
                'lang' => '124.6414818',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
            [
                'id' => 8,
                'address' => 'Indahag Station 4B',
                'lat' => '8.4795308',
                'lang' => '124.6414818',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
            [
                'id' => 9,
                'address' => 'Macabalan Station 5',
                'lat' => '8.4795308',
                'lang' => '124.6414818',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
            [
                'id' => 10,
                'address' => 'Kauswagan Station 6',
                'lat' => '8.4795308',
                'lang' => '124.6414818',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
            [
                'id' => 11,
                'address' => 'Bulua Station 7',
                'lat' => '8.4795308',
                'lang' => '124.6414818',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
            [
                'id' => 12,
                'address' => 'Pagatpat Station 7A',
                'lat' => '8.4795308',
                'lang' => '124.6414818',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
             [
                'id' => 13,
                'address' => 'Puerto Station 8',
                'lat' => '8.4795308',
                'lang' => '124.6414818',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
             [
                'id' => 14,
                'address' => 'Bugo Station 8A',
                'lat' => '8.4795308',
                'lang' => '124.6414818',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
            [
                'id' => 15,
                'address' => 'Tablon Station 8B',
                'lat' => '8.4795308',
                'lang' => '124.6414818',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
            [
                'id' => 16,
                'address' => 'Lumbia Station 9',
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
