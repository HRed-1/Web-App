<?php

namespace Database\Seeders;

use App\Models\Subvention;
use Illuminate\Database\Seeder;

class SubventionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subvention::factory()
            ->count(5)
            ->create();
    }
}
