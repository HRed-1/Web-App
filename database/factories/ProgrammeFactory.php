<?php

namespace Database\Factories;

use App\Models\Programme;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgrammeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Programme::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Title' => $this->faker->sentence(10),
            'Title_ar' => $this->faker->text(255),
            'Date' => $this->faker->date,
            'Open' => $this->faker->boolean,
            'Attach' => $this->faker->text(255),
        ];
    }
}
