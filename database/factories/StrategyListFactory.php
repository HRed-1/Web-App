<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\StrategyList;
use Illuminate\Database\Eloquent\Factories\Factory;

class StrategyListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StrategyList::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->word(),
            'strategy' => $this->faker->text(255),
            'strategy_ar' => $this->faker->text(255),
        ];
    }
}
