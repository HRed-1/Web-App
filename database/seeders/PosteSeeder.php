<?php

namespace Database\Seeders;

use App\Models\Poste;
use Illuminate\Database\Seeder;

class PosteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    

    public function run()
    {
        $statuts = [
            [
                'id'        => 1,
                'title'     => 'Directeur',
                'title_ar'  => 'مدير',
            ],
            [
                'id'        => 2,
                'title'     => 'Cadre',
                'title_ar'  => 'إطار',
            ],
            [
                'id'        => 3,
                'title'     => 'Ingénieur',
                'title_ar'  => 'مهندس',
            ],
            [
                'id'        => 4,
                'title'     => 'Technicien',
                'title_ar'  => 'تقني',
            ],
            [
                'id'        => 5,
                'title'     => 'Responsable des ventes',
                'title_ar'  => 'مدير المبيعات',
            ],
            [
                'id'        => 6,
                'title'     => 'Analyste financier',
                'title_ar'  => 'محلل مالي',
            ],
            [
                'id'        => 7,
                'title'     => 'Développeur web',
                'title_ar'  => 'مطور ويب',
            ],
            [
                'id'        => 8,
                'title'     => 'Chef de projet',
                'title_ar'  => 'مدير المشروع',
            ],
            [
                'id'        => 9,
                'title'     => 'Responsable commercial',
                'title_ar'  => 'مسؤول تجاري',
            ],
            [
                'id'        => 10,
                'title'     => 'Assistant administratif',
                'title_ar'  => 'مساعد إداري',
            ],
            [
                'id'        => 11,
                'title'     => 'Technicien informatique',
                'title_ar'  => 'تقني معلوميات',
            ],
            [
                'id'        => 12,
                'title'     => 'Chef de service des ressources humaines',
                'title_ar'  => 'رئيس قسم الموارد البشرية',
            ],
            [
                'id'        => 13,
                'title'     => 'Designer graphique',
                'title_ar'  => 'مصمم جرافيك',
            ],
            [
                'id'        => 14,
                'title'     => 'Consultant en gestion',
                'title_ar'  => 'مستشار إداري',
            ],
            [
                'id'        => 15,
                'title'     => 'Analyste de données',
                'title_ar'  => 'محلل بيانات',
            ],
            [
                'id'        => 16,
                'title'     => 'Ouvrier',
                'title_ar'  => 'عامل',
            ],
            [
                'id'        => 18,
                'title'     => 'Chauffeur',
                'title_ar'  => 'سائق',
            ],
            [
                'id'        => 19,
                'title'     => 'Assistante',
                'title_ar'  => 'مساعدة',
            ],
            
            [
                'id'        => 21,
                'title'     => 'Comptable',
                'title_ar'  => 'محاسب',
            ],
            
            [
                'id'        => 23,
                'title'     => 'Employé',
                'title_ar'  => 'موظف',
            ],
          
            
            
        ];

        Poste::insert($statuts);
    }
}
