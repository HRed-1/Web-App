<?php

namespace Database\Seeders;

use App\Models\Concurrent;
use Illuminate\Database\Seeder;

class ConcurrentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Concurrent::factory()
            ->count(5)
            ->create();
    }
}
