<?php

namespace Database\Factories;

use App\Models\Strategy;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class StrategyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Strategy::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = app(Faker::class);


        return [
            'Price' => \App\Models\StrategyList::where('type', 'price')->inRandomOrder()->limit(rand(1, 5))->pluck('id')->toArray(),
            'Distribution' => \App\Models\StrategyList::where('type', 'place')->inRandomOrder()->limit(rand(1, 5))->pluck('id')->toArray(),
            'Communication' => \App\Models\StrategyList::where('type', 'promotion')->inRandomOrder()->limit(rand(1, 5))->pluck('id')->toArray(),
            //'projet_id' => \App\Models\Projet::factory(),
        ];
    }
}
