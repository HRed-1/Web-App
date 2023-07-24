<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Accompagnement;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccompagnementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Accompagnement::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Date' => $this->faker->dateTime,
            'Detail' => $this->faker->sentence(20),
            'Attach' => $this->faker->text(255),
            'porteur_id' => \App\Models\Porteur::factory(),
            'conseiller_id' => \App\Models\Conseiller::factory(),
            'type_accompagnement_id' => \App\Models\TypeAccompagnement::factory(),
            'programme_id' => \App\Models\Programme::factory(),
        ];
    }
}
