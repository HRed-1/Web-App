<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChiffreAffaires;

class ChiffreAffairesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChiffreAffaires::factory()
            ->count(5)
            ->create();
    }
}
