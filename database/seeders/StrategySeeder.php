<?php

namespace Database\Seeders;

use App\Models\Strategy;
use Illuminate\Database\Seeder;

class StrategySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Strategy::factory()
            ->count(5)
            ->create();
    }
}
