<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Investissement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;


class InvestissementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Investissement::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $faker = app(Faker::class);

        $qty = $faker->numberBetween(2, 10);
        $pu = $faker->numberBetween(200, 10000);
        $investN1 = $qty * $pu;
        $amortissement = $faker->numberBetween(2, 10);
        $montantN1 = $investN1 / $amortissement;
        $currentYear = date('Y');


        return [
            'Title' => $faker->sentence(10),
            'Qty' => $qty,
            'PU' => $pu,
            'Invest_N1' => $investN1,
            'Amortissement' => $amortissement,
            'Montant_N1' => $montantN1,
            'N1' => $currentYear,
 
            //'projet_id' => \App\Models\Projet::factory(),
            'actif_poste_id' => \App\Models\ActifPoste::all()->random()->id,
            'amortissable' => $this->faker->boolean(),
        ];
    }
}
