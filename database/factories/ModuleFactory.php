<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModuleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Module::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Title' => $this->faker->sentence(10),
            'Title_ar' => $this->faker->text(255),
            'Detail' => $this->faker->sentence(20),
            'Attach' => $this->faker->text(255),
        ];
    }
}
