<?php

namespace Database\Seeders;

use App\Models\Swot;
use Illuminate\Database\Seeder;

class SwotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Swot::factory()
            ->count(5)
            ->create();
    }
}
