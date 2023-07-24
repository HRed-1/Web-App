<?php

namespace Database\Seeders;

use App\Models\Facture;
use Illuminate\Database\Seeder;

class FactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Facture::factory()
            ->count(5)
            ->create();
    }
}
