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
                'lat' => '8.4806',
                'lang' => '124.6512',
                'description' => '09267520623',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ], [
                'id' => 2,
                'address' => 'Burgos Station 1A',
                'lat' => '8.48466',
                'lang' => '124.64236',
                'description' => 'N/A',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ], [
                'id' => 3,
                'address' => 'Lapasan Station 2',
                'lat' => '8.4828619',
                'lang' => '124.6600306',
                'description' => 'N/A',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ], [
                'id' => 4,
                'address' => 'Carmen Station 3',
                'lat' => '8.4810657',
                'lang' => '124.6332606',
                'description' => 'N/A',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ], [
                'id' => 5,
                'address' => 'Balulang Station 3A',
                'lat' => '8.5052627',
                'lang' => '124.5379854',
                'description' => '09650622007',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ], [
                'id' => 6,
                'address' => 'Nazareth Station 4',
                'lat' => '8.4686149',
                'lang' => '124.6435431',
                'description' => 'N/A',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
            [
                'id' => 7,
                'address' => 'Macasandig Station 4A',
                'lat' => '8.4640947',
                'lang' => '124.5846009',
                'description' => 'N/A',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
            [
                'id' => 8,
                'address' => 'Indahag Station 4B',
                'lat' => '8.4229397',
                'lang' => '124.6645573',
                'description' => 'N/A',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
            [
                'id' => 9,
                'address' => 'Macabalan Station 5',
                'lat' => '8.5041511',
                'lang' => '124.6564823',
                'description' => '0888560164',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
            [
                'id' => 10,
                'address' => 'Kauswagan Station 6',
                'lat' => '8.1897142',
                'lang' => '124.048275',
                'description' => '0632271670',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
            [
                'id' => 11,
                'address' => 'Bulua Station 7',
                'lat' => '8.5052627',
                'lang' => '124.6093322',
                'description' => '09650622007',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
            [
                'id' => 12,
                'address' => 'Pagatpat Station 7A',
                'lat' => '8.4602233',
                'lang' => '124.5082522',
                'description' => 'N/A',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
             [
                'id' => 13,
                'address' => 'Puerto Station 8',
                'lat' => '8.4601866',
                'lang' => '124.3846351',
                'description' => '09057008622',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
             [
                'id' => 14,
                'address' => 'Bugo Station 8A',
                'lat' => '8.506869',
                'lang' => '124.7497011',
                'description' => 'N/A',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
            [
                'id' => 15,
                'address' => 'Tablon Station 8B',
                'lat' => '8.481937',
                'lang' => '124.726422',
                'description' => 'N/A',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
            [
                'id' => 16,
                'address' => 'Lumbia Station 9',
                'lat' => '8.4021425',
                'lang' => '124.4421495',
                'description' => 'N/A',
                'created_at' => '2019-04-16 08:40:08',
                'updated_at' => '2019-04-16 08:40:08',
                'deleted_at' => null,
            ],
        ];

        Station::insert($stations);
    }
}
