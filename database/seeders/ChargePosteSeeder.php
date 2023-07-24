<?php

namespace Database\Seeders;

use App\Models\ChargePoste;
use Illuminate\Database\Seeder;

class ChargePosteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $statuts = [
            [
                'id'             => 1,
                'title'  => 'Locations et charges locatives',
                'title_ar'  => 'رسوم الإيجار والإيجار',
               
            ],

            [
                'id'             => 3,
                'title'  => 'Entretien et réparations',
                'title_ar'  => 'براءات الاختراع وعلامات التجارية وحقوق',
               
            ],
            [
                'id'             => 4,
                'title'  => 'Primes d\'assurance',
                'title_ar'  => 'تأمين',
               
            ],
            [
                'id'             => 5,
                'title'  => 'Rémunérations d\'intermédiaires et honoraires',
                'title_ar'  => ' أجور الوسطاء وأتعاب',
               
            ],

            [
                'id'             => 6,
                'title'  => 'Redevances pour brevets, marques, droits',
                'title_ar'  => ' حقوق براءات الاختراع والعلامات التجارية والحقوق',
               
            ],

            
            [
                'id'             => 7,
                'title'  => 'Etudes, recherches et documentation',
                'title_ar'  => 'الدراسات والبحوث والتوثيق',
               
            ],
            [
                'id'             => 8,
                'title'  => 'Transport',
                'title_ar'  => 'النقل',
               
            ],
            [
                'id'             => 9,
                'title'  => 'Déplacements, missions et réceptions',
                'title_ar'  => 'البعثات والاستقبالات',
               
            ],
            [
                'id'             => 10,
                'title'  => 'Publicité, publications et relations publiques',
                'title_ar'  => 'إشهار , إعلانات',
               
            ],
            [
                'id'             => 11,
                'title'  => 'Frais postaux et frais de télécommunications',
                'title_ar'  => 'تكاليف البريد والاتصالات',
               
            ],
            [
                'id'             => 13,
                'title'  => 'Services bancaires',
                'title_ar'  => 'خدمات بنكية',
               
            ],
            [
                'id'             => 14,
                'title'  => 'Impôts et taxes',
                'title_ar'  => 'الرسوم والضرائب',
               
            ],
            [
                'id'             => 15,
                'title'  => 'Autres charges d\'exploitation',
                'title_ar'  => 'مصاريف أخرى',
               
            ],



          
            
            
        ];

        ChargePoste::insert($statuts);
    }
}