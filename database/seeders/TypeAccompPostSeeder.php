<?php

namespace Database\Seeders;

use App\Models\TypeAccompPost;
use Illuminate\Database\Seeder;

class TypeAccompPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    


    public function run()
    {
        $statuts = [
            
            [
                'id' => 1,
                'Title' => 'Suivi de la mise en œuvre',
                'Detail' => 'Les tâches à effectuer pour assurer le suivi de la mise en œuvre peuvent inclure :
                    1. Vérifier que les activités planifiées sont effectuées conformément au calendrier et au budget.
                    2. Évaluer la qualité de la mise en œuvre et identifier les écarts par rapport aux objectifs.
                    3. Résoudre les problèmes et les obstacles qui peuvent survenir pendant la mise en œuvre.
                    4. Réajuster les plans et les stratégies en fonction des résultats et des retours d\'expérience.
                    5. Collaborer avec les parties prenantes pour assurer une mise en œuvre réussie du projet.'
            ],
            [
                'id' => 2,
                'Title' => 'Coaching et conseil',
                'Detail' => 'Les tâches à effectuer pour fournir du coaching et du conseil peuvent inclure :
                    1. Établir une relation de confiance avec le porteur de projet et comprendre ses besoins et ses objectifs.
                    2. Fournir des conseils et des recommandations personnalisés en fonction des défis et des opportunités identifiés.
                    3. Aider à prendre des décisions stratégiques, à résoudre les problèmes et à surmonter les obstacles.
                    4. Offrir un soutien émotionnel et motivationnel pour maintenir la motivation et l\'engagement.
                    5. Fournir des conseils sur les compétences en gestion, le leadership et le développement personnel.'
            ],
            [
                'id' => 3,
                'Title' => 'Audit matériel',
                'Detail' => 'Les tâches à effectuer pour réaliser un audit matériel peuvent inclure :
                    1. Évaluer les équipements et les infrastructures utilisés dans le cadre du projet.
                    2. Identifier les opportunités d\'amélioration des ressources matérielles.
                    3. Vérifier la conformité aux normes de qualité et de sécurité.
                    4. Proposer des recommandations pour optimiser l\'utilisation des ressources matérielles.
                    5. Établir des rapports d\'audit détaillés pour aider à la prise de décision.'
            ],
            [
                'id' => 4,
                'Title' => 'Prospection',
                'Detail' => 'Les tâches à effectuer pour la prospection peuvent inclure :
                    1. Identifier de nouvelles opportunités commerciales et de croissance.
                    2. Effectuer des études de marché pour évaluer la demande et les tendances du marché.
                    3. Développer des stratégies de prospection et des plans d\'action.
                    4. Mettre en place des activités de marketing et de vente ciblées.
                    5. Négocier et conclure des partenariats et des contrats commerciaux.'
            ],
            [
                'id' => 5,
                'Title' => 'Formation complémentaire',
                'Detail' => 'Les tâches à effectuer pour la formation complémentaire peuvent inclure :
                    1. Identifier les besoins de formation des membres de l\'équipe et des parties prenantes.
                    2. Concevoir des programmes de formation adaptés aux besoins spécifiques.
                    3. Organiser des sessions de formation en présentiel ou en ligne.
                    4. Évaluer l\'efficacité de la formation et apporter des ajustements si nécessaire.
                    5. Fournir un suivi et un soutien continu après la formation.'
            ],
            
            
          
            
            
        ];

        TypeAccompPost::insert($statuts);
    }
}
