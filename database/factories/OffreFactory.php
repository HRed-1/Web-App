<?php

namespace Database\Factories;

use App\Models\Offre;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class OffreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Offre::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $faker = app(Faker::class);



        return [
            'Type' => $faker->randomElement(['p', 's', 'm']),
            'Title' => $this->faker->sentence(3),
            'Title_ar' => $this->faker->sentence(3),
            'Detail' => $this->faker->sentence(20),
            'Price' => $this->faker->randomFloat(2, 0, 9999),
            //'projet_id' => \App\Models\Projet::factory(),
        ];
    }
}
