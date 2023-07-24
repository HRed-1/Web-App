<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\AccompagnementPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccompagnementPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccompagnementPost::class;

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
            'projet' => $this->faker->text(255),
            'check' => $this->faker->boolean(),
            'action' => $this->faker->text(255),
            'diagnostic' => $this->faker->text(255),
            'resultat' => $this->faker->text(255),
            'objectif' => $this->faker->text(255),
            'porteur_id' => \App\Models\Porteur::factory(),
            'conseiller_id' => \App\Models\Conseiller::factory(),
            'programme_id' => \App\Models\Programme::factory(),
            'type_accomp_post_id' => \App\Models\TypeAccompPost::factory(),
            'projet_id' => \App\Models\Projet::factory(),
        ];
    }
}
