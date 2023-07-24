<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\TypeAccompagnement;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeAccompagnementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TypeAccompagnement::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Title' => $this->faker->sentence(10),
            'Detail' => $this->faker->sentence(20),
        ];
    }
}
