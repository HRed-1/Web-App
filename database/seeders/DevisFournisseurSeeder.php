<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DevisFournisseur;

class DevisFournisseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DevisFournisseur::factory()
            ->count(5)
            ->create();
    }
}
