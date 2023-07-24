<?php

namespace Database\Seeders;

use App\Models\MoyenFoncier;
use Illuminate\Database\Seeder;

class MoyenFoncierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MoyenFoncier::factory()
            ->count(5)
            ->create();
    }
}
