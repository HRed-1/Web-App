<?php

namespace Database\Seeders;

use App\Models\Commune;
use Illuminate\Database\Seeder;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $communes = [
            [
                'id'             => 1,
                'Title'  => 'Guercif',
                'Title_ar'  => 'جرسيف',
               
            ],
            [
                'id'             => 2,
                'Title'  => 'Houara Oulad Rahou',
                'Title_ar'  => 'هوارة ولاد رحو',
               
            ],
            [
                'id'             => 3,
                'Title'  => 'Taddart',
                'Title_ar'  => 'تادارت',
               
            ],
            [
                'id'             => 4,
                'Title'  => 'Berkine',
                'Title_ar'  => 'بركين',
               
            ],
            [
                'id'             => 5,
                'Title'  => 'Saka',
                'Title_ar'  => 'صاكة',
               
            ],
            [
                'id'             => 6,
                'Title'  => 'Lamrija',
                'Title_ar'  => 'المريجة',
               
            ],
            [
                'id'             => 7,
                'Title'  => 'Ras Laksar',
                'Title_ar'  => 'راس لقصر',
               
            ],
            [
                'id'             => 8,
                'Title'  => 'Mazguitam',
                'Title_ar'  => 'مزكيتام',
               
            ],
            [
                'id'             => 9,
                'Title'  => 'Assebbab',
                'Title_ar'  => 'الصباب',
               
            ],
            [
                'id'             => 10,
                'Title'  => 'Oulad Bourima',
                'Title_ar'  => 'أولاد بوريمة',
               
            ],
          
        ];

        Commune::insert($communes);
    }
}
