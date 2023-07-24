<?php

namespace Database\Seeders;

use App\Models\StrategyList;
use Illuminate\Database\Seeder;

class StrategyListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    

    public function run()
    {
        $statuts = [
            [
                'id' => 1,
                'type' => 'price',
                'strategy' => 'Stratégie de prix d\'écrémage',
                'strategy_ar' => 'استراتيجية تسعير السوق',
            ],
            [
                'id' => 2,
                'type' => 'price',
                'strategy' => 'Stratégie de prix bas',
                'strategy_ar' => 'استراتيجية التسعير المنخفض',
            ],
            [
                'id' => 3,
                'type' => 'price',
                'strategy' => 'Stratégie de prix premium',
                'strategy_ar' => 'استراتيجية التسعير المتميز',
            ],
            [
                'id' => 4,
                'type' => 'price',
                'strategy' => 'Stratégie de prix psychologique',
                'strategy_ar' => 'استراتيجية التسعير النفسي',
            ],
            [
                'id' => 5,
                'type' => 'price',
                'strategy' => 'Stratégie de prix d\'alignement concurrentiel',
                'strategy_ar' => 'استراتيجية تسعير متساوي مع المنافسة',
            ],


            [
                'id' => 6,
                'type' => 'promotion',
                'strategy' => 'Publicité sur le Médias locaux',
                'strategy_ar' => 'الإعلان عبر الوسائط المحلية',
            ],
            [
                'id' => 7,
                'type' => 'promotion',
                'strategy' => 'Marketing par e-mail',
                'strategy_ar' => 'التسويق عبر البريد الإلكتروني',
            ],
            [
                'id' => 8,
                'type' => 'promotion',
                'strategy' => 'Marketing sur les réseaux sociaux',
                'strategy_ar' => 'التسويق عبر وسائل التواصل الاجتماعي',
            ],
            [
                'id' => 9,
                'type' => 'promotion',
                'strategy' => 'Relations publiques',
                'strategy_ar' => 'العلاقات العامة',
            ],
            [
                'id' => 10,
                'type' => 'promotion',
                'strategy' => 'Marketing d\'influence',
                'strategy_ar' => 'التسويق بالتأثير',
            ],


            [
                'id' => 11,
                'type' => 'place',
                'strategy' => 'Distribution en ligne',
                'strategy_ar' => 'التوزيع عبر الإنترنت',
            ],
            [
                'id' => 12,
                'type' => 'place',
                'strategy' => 'Distribution en magasin physique',
                'strategy_ar' => 'التوزيع في المتاجر الفعلية',
            ],
            [
                'id' => 13,
                'type' => 'place',
                'strategy' => 'Distribution en gros',
                'strategy_ar' => 'التوزيع بالجملة',
            ],
            [
                'id' => 14,
                'type' => 'place',
                'strategy' => 'Distribution sélective',
                'strategy_ar' => 'التوزيع الانتقائي',
            ],
            [
                'id' => 15,
                'type' => 'place',
                'strategy' => 'Distribution intensive',
                'strategy_ar' => 'التوزيع المكثف',
            ],
            
           
          
            
            
        ];

        StrategyList::insert($statuts);
    }
}
