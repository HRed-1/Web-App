<?php

namespace Database\Factories;

use App\Models\Charge;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChargeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Charge::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'Title' => $this->faker->sentence(10),
            'Reglement' => $this->faker->randomElement(['m', 't', 's', 'a']),
            'Mensuel' => $this->faker->numberBetween(1, 20000),
            'Trimestriel' => $this->faker->numberBetween(1, 20000),
            'Semstriel' => $this->faker->numberBetween(1, 20000),
            'Annuel' => $this->faker->numberBetween(1, 20000),
            'Evolution' => $this->faker->numberBetween(1, 100),
            'Montant_N1' => $this->faker->numberBetween(1, 20000),
            
            //'projet_id' => \App\Models\Projet::factory(),
            'charge_poste_id' => \App\Models\ChargePoste::all()->random()->id,
        ];
    }
}
