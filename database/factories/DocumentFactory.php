<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Attach' => $this->faker->text(255),
            'Valide' => $this->faker->text(255),
            'Detail' => $this->faker->sentence(20),
            'porteur_id' => \App\Models\Porteur::factory(),
            'type_document_id' => \App\Models\TypeDocument::factory(),
        ];
    }
}
