<?php

namespace Database\Factories;

use App\Models\SwotList;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SwotListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SwotList::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->word(),
            'title' => $this->faker->sentence(10),
            'title_ar' => $this->faker->text(255),
        ];
    }
}
