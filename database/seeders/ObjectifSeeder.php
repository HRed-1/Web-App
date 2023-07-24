<?php

namespace Database\Seeders;

use App\Models\Objectif;
use Illuminate\Database\Seeder;

class ObjectifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Objectif::factory()
            ->count(5)
            ->create();
    }
}
