<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ChiffreAffaires;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;


class ChiffreAffairesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChiffreAffaires::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $faker = app(Faker::class);




        return [
            'Title' => $this->faker->sentence(10),
            'Mode' => $this->faker->randomElement(['D', 'G']),
            'Price' => $this->faker->randomFloat(2, 0, 9999),
            'Unity' => $this->faker->sentence(1),
            'Qty' => $this->faker->numberBetween(1, 20000),
            'Evolution' => $this->faker->numberBetween(1, 100),
            'Montant_CA_N1' => $this->faker->numberBetween(2, 200000),

            'Cout_Charge' => $this->faker->numberBetween(1, 100),
            'Montant_CHVar_N1' => $this->faker->randomNumber(1),

            'offre_id' => \App\Models\Offre::all()->random()->id,
            //'projet_id' => \App\Models\Projet::factory(),
        ];
    }
}
