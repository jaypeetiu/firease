<?php

namespace Database\Seeders;

use App\Models\IDList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IDListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $IDlists = [
            [
                'id' => 1,
                'title' => 'Senior Citizen ID',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'GSIS',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'title' => 'Philippine passport',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'title' => 'SSS UMID',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'title' => 'PhilHealth',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'title' => 'UMID',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'title' => 'TIN',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'title' => 'PWD',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'title' => 'Airman License Issued 2016 Onwards',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'title' => 'Integrated Bar of the Philippines ID',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'title' => 'NBI Clearance',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'title' => 'School ID',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'title' => 'OFW',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'title' => 'PSA birth certificate',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'title' => 'SSS',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'title' => 'Student permit Card',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'title' => 'Firearms license',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 18,
                'title' => 'National ID',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 19,
                'title' => 'Owwa Ecard Or Idole Card',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 20,
                'title' => 'Police Clearance',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 21,
                'title' => 'Tax Identification Number',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 22,
                'title' => 'Current Valid Epassport',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 23,
                'title' => 'DSWD Certification',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        IDList::insert($IDlists);
    }
}
