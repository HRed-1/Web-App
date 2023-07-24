<?php

namespace Database\Seeders;

use App\Models\Conseiller;
use Illuminate\Database\Seeder;

class ConseillerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Conseiller::factory()
            ->count(5)
            ->create();
    }
}
