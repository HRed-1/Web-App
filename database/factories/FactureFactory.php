<?php

namespace Database\Factories;

use App\Models\Facture;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FactureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Facture::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'montant' => $this->faker->randomNumber(1),
            'payement' => $this->faker->boolean(),
            'devis_fournisseur_id' => \App\Models\DevisFournisseur::factory(),
            'projet_id' => \App\Models\Projet::factory(),
        ];
    }
}
