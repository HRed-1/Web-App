<?php

namespace Database\Seeders;

use App\Models\Materiel;
use Illuminate\Database\Seeder;

class MaterielSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Materiel::factory()
            ->count(5)
            ->create();
    }
}
