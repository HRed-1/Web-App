<?php

namespace Database\Factories;

use App\Models\Concurrent;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConcurrentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Concurrent::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Title' => $this->faker->sentence(10),
            'Title_ar' => $this->faker->sentence(10),
            //'projet_id' => \App\Models\Projet::factory(),
        ];
    }
}
