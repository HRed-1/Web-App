<?php

namespace Database\Factories;

use App\Models\Devi;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeviFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Devi::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Montant' => $this->faker->randomNumber(1),
            'Sort' => $this->faker->text(255),
            'devis_fournisseur_id' => \App\Models\DevisFournisseur::factory(),
            'projet_id' => \App\Models\Projet::factory(),
        ];
    }
}
