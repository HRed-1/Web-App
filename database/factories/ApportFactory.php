<?php

namespace Database\Factories;

use App\Models\Apport;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Apport::class;

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
            'en_nature' => $this->faker->boolean(),
            //'composante' => $this->faker->text(255),
            //'projet_id' => \App\Models\Projet::factory(),
            //'investissement_id' => \App\Models\Investissement::factory(),
        ];
    }
}
