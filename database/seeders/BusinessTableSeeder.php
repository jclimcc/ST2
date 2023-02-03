<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Records=[
            [
                'id'=>1,
                'name'=>'F Fashion',
                'url'=>'http://127.0.0.1:8000/home',

            ],
            [
                'id'=>2,
                'name'=>'ShengLife',
                'url'=>'http://127.0.0.1:8000/about-us',

            ],
        ];

        Business::insert($Records);
    }
}
