<?php

namespace Database\Factories;

use App\Models\Materiel;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterielFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Materiel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'ref' => $this->faker->text(255),
            'detail' => $this->faker->sentence(20),
            'reception' => $this->faker->boolean(),
            'check1' => $this->faker->boolean(),
            'check2' => $this->faker->boolean(),
            'check3' => $this->faker->boolean(),
            'check4' => $this->faker->boolean(),
            'check5' => $this->faker->boolean(),
            'date1' => $this->faker->date(),
            'date2' => $this->faker->date(),
            'date3' => $this->faker->date(),
            'date4' => $this->faker->date(),
            'date5' => $this->faker->date(),
            'projet_id' => \App\Models\Projet::factory(),
        ];
    }
}
