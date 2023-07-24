<?php

namespace Database\Seeders;

use App\Models\Associe;
use Illuminate\Database\Seeder;

class AssocieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Associe::factory()
            ->count(5)
            ->create();
    }
}
