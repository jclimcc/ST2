<?php

namespace Database\Seeders;

use App\Models\page\PageTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pageTemplateSeeder extends Seeder
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
                'name'=>'Home Page',
                'url'=>'http://127.0.0.1:8000/home',
                'layout'=>'custom'

            ],
            [
                'id'=>2,
                'name'=>'About Us',
                'url'=>'http://127.0.0.1:8000/about-us',
                'layout'=>'custom'

            ],
        ];

        PageTemplate::insert($Records);
    }
}
