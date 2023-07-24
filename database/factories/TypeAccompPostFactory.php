<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\TypeAccompPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeAccompPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TypeAccompPost::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Title' => $this->faker->sentence(10),
        ];
    }
}
