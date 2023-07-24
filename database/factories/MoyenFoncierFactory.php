<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\MoyenFoncier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class MoyenFoncierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MoyenFoncier::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $faker = app(Faker::class);

        return [
            'Title' => $faker->sentence(4),
            'Usage' => $faker->randomElement(['location', 'propriete', 'collective', 'melk', 'autorisation']),
            'Zone' => $faker->randomElement(['rurale', 'urbaine', 'industriel', 'artisanal']),
            
            //'projet_id' => \App\Models\Projet::factory(),
            'amenagement' => $this->faker->boolean(),
        ];
    }
}
