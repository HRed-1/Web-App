<?php

namespace Database\Seeders;

use App\Models\Emprunt;
use Illuminate\Database\Seeder;

class EmpruntSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Emprunt::factory()
            ->count(5)
            ->create();
    }
}
