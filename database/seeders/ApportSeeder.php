<?php

namespace Database\Seeders;

use App\Models\Apport;
use Illuminate\Database\Seeder;

class ApportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Apport::factory()
            ->count(5)
            ->create();
    }
}
