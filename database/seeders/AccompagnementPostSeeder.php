<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccompagnementPost;

class AccompagnementPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AccompagnementPost::factory()
            ->count(5)
            ->create();
    }
}
