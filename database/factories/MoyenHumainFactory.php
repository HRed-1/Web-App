<?php

namespace Database\Factories;

use App\Models\MoyenHumain;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class MoyenHumainFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MoyenHumain::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = app(Faker::class);

        return [
            'Contrat' => $faker->randomElement(['cdi', 'cdd', 'saisonier', 'anapec']),
            'Effectif' => $faker->numberBetween(2, 10),
            'Salaire' => $faker->numberBetween(2000, 10000),
            'Mois' => $faker->numberBetween(1, 12),
            'Evolution' => $faker->numberBetween(5, 10),
         
            'Taux_ch' =>  $faker->numberBetween(10, 20),

            'poste_id' => \App\Models\Poste::all()->random()->id,
            //'projet_id' => \App\Models\Projet::factory(),
        ];
    }
}
