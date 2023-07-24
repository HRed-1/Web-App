<?php

namespace Database\Factories;

use App\Models\Conseiller;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ConseillerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Conseiller::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = app(Faker::class);
        $conseillerName = $faker->unique()->name;
        $conseillerPhone = $faker->unique()->numerify('+212 # ## ## ## ##');
        $conseillerEmail = $faker->unique()->email;

    
        return [
            
            'Name' => $conseillerName,
            'Birthday' => $faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            'Phone' => $conseillerPhone,
            'Genre' => $faker->randomElement(['H', 'F']),
            'Formation' => $faker->randomElement(['3', '4']),
            'Experience' => $faker->numberBetween(2, 20),
            'Email' => $conseillerEmail,
            
   
            // 'user_id' => \App\Models\User::factory()->create([
            //     'name' => $conseillerName,
            //     'Phone' => $conseillerPhone,
            //     'email' => $conseillerEmail
            // ])->id,
        ];
    }
}
