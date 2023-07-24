<?php

namespace Database\Seeders;

use App\Models\FormeJuridique;
use Illuminate\Database\Seeder;

class FormeJuridiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $forme_juridiques = [
            [
                'id'             => 1,
                'Title'  => 'Auto-Entrepreneur',
                'Title_ar'  => 'مقاول ذاتي',
               
            ],
            [
                'id'             => 2,
                'Title'  => 'Societé Á Responsabilité Limitée',
                'Title_ar'  => 'شركةذات مسؤولية محدودة',
               
            ],
            [
                'id'             => 3,
                'Title'  => 'Coopérative',
                'Title_ar'  => 'تعاونية',
               
            ],
            [
                'id'             => 4,
                'Title'  => 'Association',
                'Title_ar'  => 'جمعية',
               
            ],
            [
                'id'             => 5,
                'Title'  => 'Porteur de Projet',
                'Title_ar'  => 'حامل مشروع',
               
            ],
            [
                'id'             => 6,
                'Title'  => 'Autre',
                'Title_ar'  => 'شكل قانوني آخر',
               
            ],
            
        ];

        FormeJuridique::insert($forme_juridiques);
    }
}
