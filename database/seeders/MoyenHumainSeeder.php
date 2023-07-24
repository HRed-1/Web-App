<?php

namespace Database\Seeders;

use App\Models\MoyenHumain;
use Illuminate\Database\Seeder;

class MoyenHumainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MoyenHumain::factory()
            ->count(5)
            ->create();
    }
}
