<?php

namespace Database\Seeders;

use App\Models\Motivation;
use Illuminate\Database\Seeder;

class MotivationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Motivation::factory()
            ->count(5)
            ->create();
    }
}
