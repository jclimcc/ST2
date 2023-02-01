<?php

namespace Database\Seeders;

use App\Models\Page\PageSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pageSectionSeeder extends Seeder
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
                'name'=>'top1',
                'layout'=>'custom',
                'sequence'=>'1',
                'template_id'=>'1',

            ],  
            [
                'id'=>2,
                'name'=>'top2',
                'layout'=>'custom',
                'sequence'=>'1',
                'template_id'=>'1',

            ],
            
        ];

        PageSection::insert($Records);
    }
}
