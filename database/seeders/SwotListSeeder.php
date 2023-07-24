<?php

namespace Database\Seeders;

use App\Models\SwotList;
use Illuminate\Database\Seeder;

class SwotListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    

    public function run()
    {
        $statuts = [
            // Points forts
            [
                'id' => 1,
                'type' => 'point fort',
                'title' => 'Expertise technique solide',
                'title_ar' => 'خبرة فنية قوية',
            ],
            [
                'id' => 2,
                'type' => 'point fort',
                'title' => 'Marque bien établie',
                'title_ar' => 'علامة تجارية مؤسسة',
            ],
            [
                'id' => 3,
                'type' => 'point fort',
                'title' => 'Équipe talentueuse et motivée',
                'title_ar' => 'فريق موهوب ومتحمس',
            ],
            [
                'id' => 4,
                'type' => 'point fort',
                'title' => 'Technologie de pointe',
                'title_ar' => 'تقنية متقدمة',
            ],
            [
                'id' => 5,
                'type' => 'point fort',
                'title' => 'Réseau solide de partenaires',
                'title_ar' => 'شبكة قوية من الشركاء',
            ],
            [
                'id' => 6,
                'type' => 'point fort',
                'title' => 'Processus opérationnels efficaces',
                'title_ar' => 'عمليات فعالة',
            ],
            [
                'id' => 7,
                'type' => 'point fort',
                'title' => 'Réputation positive auprès des clients',
                'title_ar' => 'سمعة إيجابية بين العملاء',
            ],
            [
                'id' => 8,
                'type' => 'point fort',
                'title' => 'Capacité d\'innovation',
                'title_ar' => 'قدرة على الابتكار',
            ],
            [
                'id' => 9,
                'type' => 'point fort',
                'title' => 'Position de marché dominante',
                'title_ar' => 'موقف سوق مهيمن',
            ],
            [
                'id' => 10,
                'type' => 'point fort',
                'title' => 'Capacité financière solide',
                'title_ar' => 'قوة مالية قوية',
            ],

            // Points faibles
            [
                'id' => 11,
                'type' => 'point faible',
                'title' => 'Manque de financement',
                'title_ar' => 'نقص التمويل',
            ],
            [
                'id' => 12,
                'type' => 'point faible',
                'title' => 'Faible présence en ligne',
                'title_ar' => 'وجود ضعيف عبر الإنترنت',
            ],
            [
                'id' => 13,
                'type' => 'point faible',
                'title' => 'Processus de production inefficace',
                'title_ar' => 'عملية إنتاج غير فعالة',
            ],
            [
                'id' => 14,
                'type' => 'point faible',
                'title' => 'Manque d\'expérience sur le marché',
                'title_ar' => 'نقص الخبرة في السوق',
            ],
            [
                'id' => 15,
                'type' => 'point faible',
                'title' => 'Dépendance excessive à un seul client',
                'title_ar' => 'اعتمادية زائدة على عميل واحد فقط',
            ],
            [
                'id' => 16,
                'type' => 'point faible',
                'title' => 'Pénurie de compétences clés',
                'title_ar' => 'نقص المهارات الأساسية',
            ],
            [
                'id' => 17,
                'type' => 'point faible',
                'title' => 'Problèmes de gestion des stocks',
                'title_ar' => 'مشاكل في إدارة المخزون',
            ],
            [
                'id' => 18,
                'type' => 'point faible',
                'title' => 'Mauvaise planification stratégique',
                'title_ar' => 'تخطيط استراتيجي ضعيف',
            ],
            [
                'id' => 19,
                'type' => 'point faible',
                'title' => 'Communication interne inefficace',
                'title_ar' => 'اتصال داخلي غير فعال',
            ],
            [
                'id' => 20,
                'type' => 'point faible',
                'title' => 'Sensibilité aux fluctuations économiques',
                'title_ar' => 'حساسية لت'
            ],
            // Opportunités
            [
                'id' => 21,
                'type' => 'opportunite',
                'title' => 'Demande croissante de produits similaires',
                'title_ar' => 'طلب متزايد على منتجات مماثلة',
            ],
            [
                'id' => 22,
                'type' => 'opportunite',
                'title' => 'Nouveaux marchés émergents',
                'title_ar' => 'أسواق جديدة ناشئة',
            ],
            [
                'id' => 23,
                'type' => 'opportunite',
                'title' => 'Partenariats stratégiques potentiels',
                'title_ar' => 'شراكات استراتيجية محتملة',
            ],
            [
                'id' => 24,
                'type' => 'opportunite',
                'title' => 'Innovation technologique',
                'title_ar' => 'ابتكار تكنولوجي',
            ],
            [
                'id' => 25,
                'type' => 'opportunite',
                'title' => 'Changements réglementaires favorables',
                'title_ar' => 'تغييرات تنظيمية ملائمة',
            ],
            [
                'id' => 26,
                'type' => 'opportunite',
                'title' => 'Augmentation de la demande des consommateurs',
                'title_ar' => 'زيادة في طلب المستهلكين',
            ],
            [
                'id' => 27,
                'type' => 'opportunite',
                'title' => 'Tendances du marché favorables',
                'title_ar' => 'اتجاهات سوق مواتية',
            ],
            [
                'id' => 28,
                'type' => 'opportunite',
                'title' => 'Évolution des préférences des consommateurs',
                'title_ar' => 'تطور تفضيلات المستهلكين',
            ],
            [
                'id' => 29,
                'type' => 'opportunite',
                'title' => 'Croissance économique dans le secteur',
                'title_ar' => 'نمو اقتصادي في القطاع',
            ],
            [
                'id' => 30,
                'type' => 'opportunite',
                'title' => 'Élargissement de la gamme de produits',
                'title_ar' => 'توسيع نطاق المنتجات',
            ],

            // Menaces
            [
                'id' => 31,
                'type' => 'menace',
                'title' => 'Concurrence intense',
                'title_ar' => 'منافسة شديدة',
            ],
            [
                'id' => 32,
                'type' => 'menace',
                'title' => 'Instabilité économique',
                'title_ar' => 'عدم الاستقرار الاقتصادي',
            ],
            [
                'id' => 33,
                'type' => 'menace',
                'title' => 'Évolution rapide de la technologie',
                'title_ar' => 'تطور سريع في التكنولوجيا',
            ],
            [
                'id' => 34,
                'type' => 'menace',
                'title' => 'Réglementations strictes',
                'title_ar' => 'تنظيمات صارمة',
            ],
            [
                'id' => 35,
                'type' => 'menace',
                'title' => 'Dépendance excessive à un fournisseur unique',
                'title_ar' => 'اعتمادية زائدة على مورد واحد فقط',
            ],
            [
                'id' => 36,
                'type' => 'menace',
                'title' => 'Changements démographiques',
                'title_ar' => 'تغييرات سكانية',
            ],
            [
                'id' => 37,
                'type' => 'menace',
                'title' => 'Pression sur les marges bénéficiaires',
                'title_ar' => 'ضغط على الهوامش الربحية',
            ],
            [
                'id' => 38,
                'type' => 'menace',
                'title' => 'Imitation par les concurrents',
                'title_ar' => 'تقليد من قبل المنافسين',
            ],
            [
                'id' => 39,
                'type' => 'menace',
                'title' => 'Fluctuations des taux de change',
                'title_ar' => 'تقلبات أسعار الصرف',
            ],
            [
                'id' => 40,
                'type' => 'menace',
                'title' => 'Problèmes de sécurité des données',
                'title_ar' => 'مشاكل أمان البيانات',
            ],

            
            
          
            
            
        ];

        SwotList::insert($statuts);
    }
}
