<?php

namespace Database\Factories;

use App\Models\Emprunt;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpruntFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Emprunt::class;

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
            'Taux' => $this->faker->randomNumber(1),
            'Duree' => $this->faker->randomNumber(0),
            'Reglement' => $this->faker->text(255),
            
            
            //'projet_id' => \App\Models\Projet::factory(),
        ];
    }
}
