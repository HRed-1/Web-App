<?php

namespace Database\Seeders;

use App\Models\Swot;
use App\Models\Offre;
use App\Models\Apport;
use App\Models\Charge;
use App\Models\Client;
use App\Models\Projet;
use App\Models\Associe;
use App\Models\Emprunt;
use App\Models\Porteur;
use App\Models\Strategy;
use App\Models\Concurrent;
use App\Models\Subvention;
use App\Models\Fournisseur;
use App\Models\MoyenHumain;
use App\Models\MoyenFoncier;
use App\Models\Investissement;
use App\Models\ChiffreAffaires;
use Illuminate\Database\Seeder;

class PorteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Porteur::factory()
            ->count(115)
            ->has(Associe::factory()->count(random_int(5, 50)))
            ->has(Projet::factory()
                ->count(1)
                ->has(Offre::factory()->count(random_int(1, 5)), 'offres')
                ->has(Strategy::factory()->count(1), 'strategies')
                ->has(Swot::factory()->count(1), 'swots')

                ->has(Client::factory()->count(random_int(1, 3)), 'clients')
                ->has(Fournisseur::factory()->count(random_int(1, 3)), 'fournisseurs')
                ->has(Concurrent::factory()->count(random_int(1, 3)), 'concurrents')
                
                ->has(MoyenFoncier::factory()->count(1), 'moyenFonciers')
                ->has(MoyenHumain::factory()->count(random_int(1, 3)), 'moyenHumains')
                ->has(Investissement::factory()->count(random_int(1, 3)), 'investissements')
                ->has(ChiffreAffaires::factory()->count(random_int(1, 3)), 'allChiffreAffaires')
                ->has(Charge::factory()->count(random_int(1, 3)), 'charges')
                ->has(Apport::factory()->count(random_int(1, 3)), 'apports')
                ->has(Subvention::factory()->count(random_int(1, 3)), 'subventions')
                ->has(Emprunt::factory()->count(random_int(1, 3)), 'emprunts')
            )
            ->create();
    }
}
