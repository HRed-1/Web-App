<?php

namespace Database\Seeders;

use App\Models\TypeDocument;
use Illuminate\Database\Seeder;

class TypeDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    

    public function run()
    {
        $statuts = [
            [
                'id' => 1,
                'Title' => 'Statuts',
                'Title_ar' => 'النظام الأساسي ',
            ],
            [
                'id' => 2,
                'Title' => 'PV d\'assemblée générale constitutive',
                'Title_ar' => 'محضر اجتماع الجمعية التأسيسية',
            ],
            [
                'id' => 3,
                'Title' => 'Attestation de dépôt du capital social',
                'Title_ar' => 'شهادة إيداع رأس المال',
            ],
            [
                'id' => 4,
                'Title' => 'Attestation d\'immatriculation au Registre de Commerce',
                'Title_ar' => 'شهادة التسجيل بالسجل التجاري',
            ],
            
            
            
            [
                'id' => 8,
                'Title' => 'Procès-verbal de nomination du gérant',
                'Title_ar' => 'محضر تعيين المدير',
            ],

            [
                'id' => 9,
                'Title' => 'Rapport moral et financier',
                'Title_ar' => 'تقرير أدبي ومالي',
            ],
            [
                'id' => 10,
                'Title' => 'Liste des membres',
                'Title_ar' => 'قائمة الأعضاء',
            ],
            [
                'id' => 11,
                'Title' => 'Attestation d\'approbation de dénomination',
                'Title_ar' => 'شهادة موافقة على التسمية',
            ],
            [
                'id' => 12,
                'Title' => 'Récépissé de dépôt auprès des autorités locales',
                'Title_ar' => 'ايصال الايداع لدى السلطات المحلية',
            ],
            
            
            [
                'id' => 15,
                'Title' => 'Attestation d\'immatriculation au Registre de Commerce',
                'Title_ar' => 'شهادة التسجيل بالسجل المحلي للتعاونيات',
            ],
            
            [
                'id' => 17,
                'Title' => 'PV d\'assemblée générale ordinaire annuelle',
                'Title_ar' => 'محضر اجتماع الجمعية العامة العادية السنوية',
            ],
           
            [
                'id' => 19,
                'Title' => 'Procès-verbal de nomination d\'Administrateur',
                'Title_ar' => 'محضر تعيين المسير',
            ],
            [
                'id' => 20,
                'Title' => 'Carte d\'auto-entrepreneur',
                'Title_ar' => 'بطاقةالمقاول الذاتي',
            ],
            [
                'id' => 21,
                'Title' => 'Déclaration sur l\'honneur',
                'Title_ar' => 'تصريح بالشرف',
            ],
            [
                'id' => 22,
                'Title' => 'Demande de subvention',
                'Title_ar' => 'طلب منحة',
            ],
            [
                'id' => 23,
                'Title' => 'بطاقة تعريفية بالمشروع',
                'Title_ar' => 'بطاقة تعريفية بالمشروع',
            ],
            [
                'id' => 24,
                'Title' => 'Liste des bénéficiaires',
                'Title_ar' => 'قائمة المستفيدين',
            ],

            
          
            
            
        ];

        TypeDocument::insert($statuts);
    }
}
