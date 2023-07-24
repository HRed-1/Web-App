<?php

namespace Database\Seeders;

use App\Models\Programme;
use Illuminate\Database\Seeder;

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $programmes = [
            [
                'id'             => 1,
                'Title'  => 'Economie Sociale et Solidaire 2022',
                'Title_ar'  => 'الاقتصاد الاجتماعي والتضامني 2022',
               
            ],
            
            [
                'id'             => 2,
                'Title'  => 'Economie Sociale et Solidaire 2023',
                'Title_ar'  => 'الاقتصاد الاجتماعي والتضامني 2023',
               
            ],
            
            
            
        ];

        Programme::insert($programmes);
    }
}
