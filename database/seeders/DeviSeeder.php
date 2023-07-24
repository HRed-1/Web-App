<?php

namespace Database\Seeders;

use App\Models\Devi;
use Illuminate\Database\Seeder;

class DeviSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Devi::factory()
            ->count(5)
            ->create();
    }
}
