<?php

namespace Database\Factories;

use App\Models\Porteur;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\SecteurActvite;
use App\Models\Commune;
use App\Models\User;


class PorteurFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Porteur::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = app(Faker::class);

        $totalMembers = $faker->numberBetween(5, 49);
        $femaleMembers = $faker->numberBetween(0, $totalMembers);
        $maleMembers = $totalMembers - $femaleMembers;
        $femaleJuniorMembers = $faker->numberBetween(0, $femaleMembers);
        $maleJuniorMembers = $faker->numberBetween(0, $maleMembers);
        $cinLetters = $faker->randomElements(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'], 2);
        $cinLetter = implode('', $cinLetters);
        return [
            'Name' => $faker->unique()->company,
            'Name_ar' => $faker->unique()->company('ar_MA'),
            'Creer' => $this->faker->boolean,
            'Date_creation' => $this->faker->date,
            'ID_RC' => $faker->unique()->regexify('[0-9]{6}'),
            'ID_RCOP' => $faker->unique()->regexify('[0-9]{6}'),
            'ID_ICE' => $faker->unique()->regexify('[0-9]{9}'),
            'Activity' => $this->faker->text(255),
            'Phone' => $faker->unique()->numerify('+212 # ## ## ## ##'),
            'Email' => $faker->unique()->email,
            'Adresse' => $faker->address . ', Guercif, Morocco',
            'Membre' => $totalMembers,
            'Membre_F' => $femaleMembers,
            'Membre_H' => $maleMembers,
            'Membre_JF' => $femaleJuniorMembers,
            'Membre_JH' => $maleJuniorMembers,
            'validite' => $this->faker->randomNumber(0),
            'date_renouv' => $this->faker->date(),
            'nmbr_conseil' => $this->faker->randomNumber(0),
            'date_assemble' => $this->faker->date(),
            'name_represent' => $this->faker->name,
            'cin_represent' => $cinLetter . '-' . $faker->unique()->regexify('\d{6}'),
            'phone_represent' => $faker->unique()->numerify('+212 # ## ## ## ##'),
            'if' => $faker->unique()->regexify('[0-9]{6}'),
            'forme_juridique_id' => \App\Models\FormeJuridique::all()->random()->id,
            'secteur_actvite_id' => \App\Models\SecteurActvite::all()->random()->id,
            'commune_id' => \App\Models\Commune::all()->random()->id,
            //'user_id' => \App\Models\User::factory(),
            
        ];
    }
}
