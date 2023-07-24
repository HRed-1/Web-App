<?php

namespace Database\Factories;

use App\Models\Projet;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ProjetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Projet::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $faker = app(Faker::class);

        $apport = $faker->randomNumber(3);
        $subvention = $faker->randomNumber(3);
        $emprunt = $faker->randomNumber(3);
        $cout = $apport + $subvention + $emprunt;

        return [
            'Title' => $faker->sentence(10),
            'Title_ar' => $faker->sentence(10, true),
            'Detail' => $faker->sentence(20),
            'Detail_ar' => $faker->sentence(20, true),
            'Cout' => $cout,
            'Apport' => $apport,
            'Subvention' => $subvention,
            'Emprunt' => $emprunt,
            // 'Selected' => $faker->boolean,
            // 'Note_comit' => $faker->text(255),
            // 'Valide' => $faker->boolean,
            // 'Open_plis' => $faker->boolean,
            // 'Reception' => $faker->date,
            // 'Sort_recption' => $faker->text(255),
            // 'Finance' => $faker->boolean,
            // 'Actif' => $faker->boolean,
            'dispo_local' => $faker->boolean(),
            'dispo_apport' => $faker->boolean(),
            'adresse' => $faker->address . ', Guercif, Morocco',
            'composante' => \App\Models\ActifPoste::all()->random(rand(1, 5))->pluck('id')->toArray(),
            'innov' => $faker->boolean(),
            //'motiv_obj' => \App\Models\Motivation::all()->random(rand(1, 5))->pluck('id')->toArray(),
            //'moti_obj_ar' => \App\Models\Objectif::all()->random(rand(1, 5))->pluck('id')->toArray(),
            'poste' => $faker->randomNumber(0),
            'resultat' => $faker->randomNumber(6),
            'ca' => $faker->randomNumber(6),
            //'porteur_id' => \App\Models\Porteur::factory(),
            'programme_id' => \App\Models\Programme::all()->random()->id,
            'phase_id' => \App\Models\Phase::all()->random()->id,
            'commune_id' => \App\Models\Commune::all()->random()->id,
            'secteur_actvite_id' => \App\Models\SecteurActvite::all()->random()->id,
        ];
    }
}
