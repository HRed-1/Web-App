<?php

namespace Database\Seeders;

use App\Models\Phase;
use Illuminate\Database\Seeder;

class PhaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $statuts = [
            [
                'id'             => 1,
                'Title'  => 'Inscrit',
                'Title_ar'  => 'مسجل',
               
            ],
            
            [
                'id'             => 2,
                'Title'  => 'Selectionné',
                'Title_ar'  => 'مختار',
               
            ],
          
            
            
        ];

        Phase::insert($statuts);
    }
}
