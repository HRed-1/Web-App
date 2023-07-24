<?php

namespace Database\Seeders;

use App\Models\SecteurActvite;
use Illuminate\Database\Seeder;

class SecteurActviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $Secteurs = [
            [
                //'id'             => 1,
                'Title'  => 'AGRICULTURE',
                'Title_ar'  => 'الفلاحة',
               
            ],
            
            [
                //'id'             => 1,
                'Title'  => 'INDUSTRIE',
                'Title_ar'  => 'الصناعة',
               
            ],
            
            [
                //'id'             => 1,
                'Title'  => 'CONSTRUCTION',
                'Title_ar'  => 'البناء',
               
            ],
            [
                //'id'             => 1,
                'Title'  => 'COMMERCE',
                'Title_ar'  => 'التجارة',
               
            ],
        
            [
                //'id'             => 1,
                'Title'  => 'HÉBERGEMENT ET RESTAURATION',
                'Title_ar'  => 'الإيواء و التموين',
               
            ],
            [
                //'id'             => 1,
                'Title'  => 'INFORMATION ET COMMUNICATION',
                'Title_ar'  => 'الإتصال و التواصل',
               
            ],
            
            [
                //'id'             => 1,
                'Title'  => 'ENSEIGNEMENT',
                'Title_ar'  => 'التكوين',
               
            ],
            [
                //'id'             => 1,
                'Title'  => 'SANTÉ HUMAINE ET ACTION SOCIALE',
                'Title_ar'  => 'الصحة والعمل الاجتماعي',
               
            ],
            [
                //'id'             => 1,
                'Title'  => 'AUTRES ACTIVITÉS DE SERVICES',
                'Title_ar'  => 'أنشطة خدماتية أخرى',
               
            ],
            [
                //'id'             => 1,
                'Title'  => 'ARTISANAT',
                'Title_ar'  => 'الصناعة التقليدية',
               
            ],
           
            
            
            
            
            
        ];

        SecteurActvite::insert($Secteurs);
    }
}
