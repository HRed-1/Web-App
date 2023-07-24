<?php

namespace Database\Factories;

use App\Models\Formation;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Formation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Debut' => $this->faker->dateTime,
            'Fin' => $this->faker->dateTime,
            'Lieu' => $this->faker->text(255),
            'Attach' => $this->faker->text(255),
            'module_id' => \App\Models\Module::factory(),
            'conseiller_id' => \App\Models\Conseiller::factory(),
            'programme_id' => \App\Models\Programme::factory(),
        ];
    }
}
