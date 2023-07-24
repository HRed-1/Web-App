<?php

namespace Database\Factories;

use App\Models\Objectif;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ObjectifFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Objectif::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
        ];
    }
}
