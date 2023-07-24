<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $themes = [
            [
                //'id'             => 1,
                'Title'  => 'Initiation à l’Entrepreneuriat',
                'Title_ar'  => 'مدخل إلى الحس المقاولاتي',
               
            ],
            [
                //'id'             => 1,
                'Title'  => 'Aspects juridiques et fiscales des coopératives et TPME',
                'Title_ar'  => 'الجوانب القانونية والضريبية للتعاونيات والمقاولات الصغيرة والمتوسطة',
               
            ],
            [
                //'id'             => 1,
                'Title'  => 'Gestion Financière et comptable des coopératives et TPME',
                'Title_ar'  => 'الإدارة المالية والمحاسبية للتعاونيات والمقاولات الصغيرة والمتوسطة',
               
            ],
            [
                //'id'             => 1,
                'Title'  => 'Stratégie commerciale, & Marketing Digital',
                'Title_ar'  => 'استراتيجية الأعمال والتسويق الرقمي',
               
            ],
            
            
            
        ];

        Module::insert($themes);
    }
}
