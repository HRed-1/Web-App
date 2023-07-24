<?php

namespace Database\Factories;

use App\Models\ActifPoste;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActifPosteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ActifPoste::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'title_ar' => $this->faker->text(255),
        ];
    }
}
