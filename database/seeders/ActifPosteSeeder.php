<?php

namespace Database\Seeders;

use App\Models\ActifPoste;
use Illuminate\Database\Seeder;

class ActifPosteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $statuts = [
            [
                'id'             => 1,
                'title'  => 'Frais Préliminaires',
                'title_ar'  => 'النفقات الأولية',
               
            ],
            
            [
                'id'             => 2,
                'title'  => 'Recherche et Développement',
                'title_ar'  => 'البحث والتطوير',
               
            ],
            [
                'id'             => 3,
                'title'  => 'Brevets, marques et droits',
                'title_ar'  => 'براءات الاختراع وعلامات التجارية وحقوق',
               
            ],
            [
                'id'             => 4,
                'title'  => 'Fonds Commercial',
                'title_ar'  => 'أصل تجاري',
               
            ],
            [
                'id'             => 5,
                'title'  => 'Terrains & Construction',
                'title_ar'  => ' أراضي و بنايات',
               
            ],

            [
                'id'             => 6,
                'title'  => 'Aménagement',
                'title_ar'  => ' تهيئة',
               
            ],


            
            [
                'id'             => 7,
                'title'  => 'Matériel et outillage',
                'title_ar'  => 'معدات وأدوات',
               
            ],
            [
                'id'             => 8,
                'title'  => 'Matériel de transport',
                'title_ar'  => 'وسائل النقل',
               
            ],
            [
                'id'             => 9,
                'title'  => 'Mobilier, matériel de bureau',
                'title_ar'  => 'أثاثات ومعدات مكتبية',
               
            ],
            [
                'id'             => 10,
                'title'  => 'Autres immobilisations corporelles',
                'title_ar'  => 'ممتلكات , معدات و منشآت أخرى',
               
            ],

          
            
            
        ];

        ActifPoste::insert($statuts);
    }
}
