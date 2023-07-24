<?php

namespace Database\Factories;
use Faker\Generator as Faker;

use App\Models\Swot;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SwotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Swot::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $faker = app(Faker::class);


        return [
            'pfort' => \App\Models\SwotList::where('type', 'point fort')->inRandomOrder()->limit(rand(1, 5))->pluck('id')->toArray(),
            'pfaible' =>  \App\Models\SwotList::where('type', 'point faible')->inRandomOrder()->limit(rand(1, 5))->pluck('id')->toArray(),
            'opportunity' =>  \App\Models\SwotList::where('type', 'opportunite')->inRandomOrder()->limit(rand(1, 5))->pluck('id')->toArray(),
            'threat' =>  \App\Models\SwotList::where('type', 'menace')->inRandomOrder()->limit(rand(1, 5))->pluck('id')->toArray(),
            //'projet_id' => \App\Models\Projet::factory(),
        ];
    }
}
