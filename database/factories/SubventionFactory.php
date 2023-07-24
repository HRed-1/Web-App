<?php

namespace Database\Factories;

use App\Models\Subvention;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubventionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subvention::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Title' => $this->faker->sentence(10),
            'Montant_N1' => $this->faker->randomNumber(1),
            //'projet_id' => \App\Models\Projet::factory(),
        ];
    }
}
