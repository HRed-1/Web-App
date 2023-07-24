<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Associe;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class AssocieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Associe::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = app(Faker::class);

        $cinLetters = $faker->randomElements(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'], 2);
        $cinLetter = implode('', $cinLetters);
        $birthDate = $faker->dateTimeBetween('-100 years', '-18 years');
        $age = Carbon::now()->diffInYears($birthDate);

        return [
            'Name' => $this->faker->name(),
            'Name_ar' => $this->faker->name('ar_SA'),
            'CIN' => $cinLetter . '-' . $faker->unique()->regexify('\d{6}'),
            'Genre' => $faker->randomElement(['H', 'F']),
            'Phone' => $faker->unique()->numerify('+212 # ## ## ## ##'),
            'Email' => $faker->unique()->email,
            'Birth_date' => $birthDate->format('Y-m-d'),
            'age' => $age,
            'Adresse' => $faker->address . ', Guercif, Morocco',
            'Formation' => $faker->randomElement(['3', '4']),
            'Experience' =>$faker->numberBetween(2, 20),
            'admin' => $this->faker->boolean(),
            'actif' => $this->faker->boolean(),
            
            'commune_id' => \App\Models\Commune::all()->random()->id,
            //'porteur_id' => \App\Models\Porteur::factory(),
        ];
    }
}
