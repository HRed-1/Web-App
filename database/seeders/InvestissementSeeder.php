<?php

namespace Database\Seeders;

use App\Models\Investissement;
use Illuminate\Database\Seeder;

class InvestissementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Investissement::factory()
            ->count(5)
            ->create();
    }
}
