<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $this->call(UserSeeder::class);
        $this->call(CommuneSeeder::class);
        $this->call(FormeJuridiqueSeeder::class);
        $this->call(SecteurActviteSeeder::class);
        $this->call(ProgrammeSeeder::class);
        $this->call(PhaseSeeder::class);
        $this->call(ActifPosteSeeder::class);
        $this->call(ChargePosteSeeder::class);
        $this->call(PosteSeeder::class);

        
        $this->call(ModuleSeeder::class);
        $this->call(TypeAccompagnementSeeder::class);
        $this->call(TypeAccompPostSeeder::class);
        $this->call(TypeDocumentSeeder::class);

        $this->call(StrategyListSeeder::class);        
        $this->call(SwotListSeeder::class);

        $this->call(DevisFournisseurSeeder::class);


        $this->call(ConseillerSeeder::class);


        $this->call(PorteurSeeder::class);

        // $this->call(AccompagnementSeeder::class);
        // $this->call(AccompagnementPostSeeder::class);
        // $this->call(FormationSeeder::class);

        
        // $this->call(ApportSeeder::class);
        // $this->call(AssocieSeeder::class);
        // $this->call(ChargeSeeder::class);
        // $this->call(SubventionSeeder::class);
        // $this->call(ChiffreAffairesSeeder::class);
        // $this->call(ClientSeeder::class);
        
        // $this->call(ConcurrentSeeder::class);
        
        // $this->call(DeviSeeder::class);
        
        // $this->call(DocumentSeeder::class);
        // $this->call(EmpruntSeeder::class);
        // $this->call(FactureSeeder::class);
        
        
        // $this->call(FournisseurSeeder::class);
        // $this->call(InvestissementSeeder::class);
        // $this->call(MaterielSeeder::class);
        
        // $this->call(MotivationSeeder::class);
        // $this->call(MoyenFoncierSeeder::class);
        // $this->call(MoyenHumainSeeder::class);
        // $this->call(ObjectifSeeder::class);
        // $this->call(OffreSeeder::class);
        
        
        
        
        // $this->call(ProjetSeeder::class);
        // $this->call(SwotSeeder::class);
        // $this->call(StrategySeeder::class);



        
    }
}
