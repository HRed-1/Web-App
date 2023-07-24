<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\DevisFournisseur;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class DevisFournisseurFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DevisFournisseur::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = app(Faker::class);
        return [
            'Title' => $faker->company,
            'ICE' => $faker->numerify('##########'),
        ];
    }
}
