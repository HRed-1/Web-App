<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\FormeJuridique;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormeJuridiqueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FormeJuridique::class;

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
        ];
    }
}
