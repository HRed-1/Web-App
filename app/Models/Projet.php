<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projet extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'Title',
        'Title_ar',
        'Detail',
        'Detail_ar',
        'Cout',
        'Apport',
        'Subvention',
        'Emprunt',
        'porteur_id',
        'programme_id',
        'phase_id',
        'Selected',
        'Note_comit',
        'Valide',
        'Open_plis',
        'Reception',
        'Sort_recption',
        'Finance',
        'Actif',
        'Total_Subv',
        'Total_Apport',
        'Total_Emprunt',
        'Total_Invest',
        'Tresor_depart',
        'Total_CA_N1',
        'Total_CA_N2',
        'Total_CA_N3',
        'Total_CA_N4',
        'Total_CA_N5',
        'Total_CA_N6',
        'Total_CA_N7',
        'Total_CH_N1',
        'Total_CH_N2',
        'Total_CH_N3',
        'Total_CH_N4',
        'Total_CH_N5',
        'Total_CH_N6',
        'Total_CH_N7',
        'Total_Dot_N1',
        'Total_Dot_N2',
        'Total_Dot_N3',
        'Total_Dot_N4',
        'Total_Dot_N5',
        'Total_Dot_N6',
        'Total_Dot_N7',
        'Total_CHVar_N1',
        'Total_CHVar_N2',
        'Total_CHVar_N3',
        'Total_CHVar_N4',
        'Total_CHVar_N5',
        'Total_CHVar_N6',
        'Total_CHVar_N7',
        'Total_Int_N1',
        'Total_Int_N2',
        'Total_Int_N3',
        'Total_Int_N4',
        'Total_Int_N5',
        'Total_Int_N6',
        'Total_Int_N7',
        'Total_Amort_N1',
        'Total_Amort_N2',
        'Total_Amort_N3',
        'Total_Amort_N4',
        'Total_Amort_N5',
        'Total_Amort_N6',
        'Total_Amort_N7',
        'Total_Salaire_N1',
        'Total_Salaire_N2',
        'Total_Salaire_N3',
        'Total_Salaire_N4',
        'Total_Salaire_N5',
        'Total_Salaire_N6',
        'Total_Salaire_N7',
        'Total_ChSociale_N1',
        'Total_ChSociale_N2',
        'Total_ChSociale_N3',
        'Total_ChSociale_N4',
        'Total_ChSociale_N5',
        'Total_ChSociale_N6',
        'Total_ChSociale_N7',
        'Resultat_N1',
        'Resultat_N2',
        'Resultat_N3',
        'Resultat_N4',
        'Resultat_N5',
        'Resultat_N6',
        'Resultat_N7',
        'Impot_N1',
        'Impot_N2',
        'Impot_N3',
        'Impot_N4',
        'Impot_N5',
        'Impot_N6',
        'Impot_N7',
        'dispo_local',
        'dispo_apport',
        'commune_id',
        'adresse',
        'secteur_actvite_id',
        'composante',
        'innov',
        'motiv_obj',
        'moti_obj_ar',
        'poste',
        'resultat',
        'ca',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'Selected' => 'boolean',
        'Valide' => 'boolean',
        'Open_plis' => 'boolean',
        'Reception' => 'date',
        'Finance' => 'boolean',
        'Actif' => 'boolean',
        'dispo_local' => 'boolean',
        'dispo_apport' => 'boolean',
        'innov' => 'boolean',
        'composante' => 'array'
    ];

    public function devis()
    {
        return $this->hasMany(Devi::class);
    }

    public function porteur()
    {
        return $this->belongsTo(Porteur::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function offres()
    {
        return $this->hasMany(Offre::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function fournisseurs()
    {
        return $this->hasMany(Fournisseur::class);
    }

    public function concurrents()
    {
        return $this->hasMany(Concurrent::class);
    }

    public function strategies()
    {
        return $this->hasMany(Strategy::class);
    }

    public function phase()
    {
        return $this->belongsTo(Phase::class);
    }

    public function apports()
    {
        return $this->hasMany(Apport::class);
    }

    public function subventions()
    {
        return $this->hasMany(Subvention::class);
    }

    public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    }

    public function moyenFonciers()
    {
        return $this->hasMany(MoyenFoncier::class);
    }

    public function investissements()
    {
        return $this->hasMany(Investissement::class);
    }

    public function moyenHumains()
    {
        return $this->hasMany(MoyenHumain::class);
    }

    public function charges()
    {
        return $this->hasMany(Charge::class);
    }

    public function allChiffreAffaires()
    {
        return $this->hasMany(ChiffreAffaires::class);
    }

    public function factures()
    {
        return $this->hasMany(Facture::class);
    }

    public function materiels()
    {
        return $this->hasMany(Materiel::class);
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function secteurActvite()
    {
        return $this->belongsTo(SecteurActvite::class);
    }

    public function swots()
    {
        return $this->hasMany(Swot::class);
    }

    public function accompagnementPosts()
    {
        return $this->hasMany(AccompagnementPost::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($projet) {
            for ($i = 1; $i <= 7; $i++) {
                $montantField = "Montant_CA_N$i";
                $totalField = "Total_CA_N$i";
                $total = $projet->allChiffreAffaires->sum($montantField);
                $projet->$totalField = $total;
            }
        });

        static::saving(function ($projet) {
            for ($i = 1; $i <= 7; $i++) {
                $montantField = "Montant_CHVar_N$i";
                $totalField = "Total_CHVar_N$i";
                $total = $projet->allChiffreAffaires->sum($montantField);
                $projet->$totalField = $total;
            }
        });

        static::saving(function ($projet) {
            for ($i = 1; $i <= 7; $i++) {
                $montantField = "Montant_N$i";
                $totalField = "Total_CH_N$i";
                $total = $projet->charges->sum($montantField);
                $projet->$totalField = $total;
            }
        });

        static::saving(function ($projet) {
            for ($i = 1; $i <= 7; $i++) {
                $montantField = "Montant_N$i";
                $totalField = "Total_Dot_N$i";
                $total = $projet->investissements->sum($montantField);
                $projet->$totalField = $total;
            }
        });

        static::saving(function ($projet) {
            for ($i = 1; $i <= 7; $i++) {
                $montantField = "Interet_N$i";
                $totalField = "Total_Int_N$i";
                $total = $projet->emprunts->sum($montantField);
                $projet->$totalField = $total;
            }
        });


        static::saving(function ($projet) {
            for ($i = 1; $i <= 7; $i++) {
                $montantField = "Amort_N$i";
                $totalField = "Total_Amort_N$i";
                $total = $projet->emprunts->sum($montantField);
                $projet->$totalField = $total;
            }
        });


        static::saving(function ($projet) {
            for ($i = 1; $i <= 7; $i++) {
                $montantField = "Salaire_N$i";
                $totalField = "Total_Salaire_N$i";
                $total = $projet->moyenHumains->sum($montantField);
                $projet->$totalField = $total;
            }
        });


        static::saving(function ($projet) {
            for ($i = 1; $i <= 7; $i++) {
                $montantField = "ChSociale_N$i";
                $totalField = "Total_ChSociale_N$i";
                $total = $projet->moyenHumains->sum($montantField);
                $projet->$totalField = $total;
            }
        });


        static::saving(function ($projet) {
            $montantField = 'Montant_N1';
            $totalField = 'Total_Apport';
            $total = $projet->apports->sum($montantField);
            $projet->$totalField = $total;
        });


        static::saving(function ($projet) {
            $montantField = 'Montant_N1';
            $totalField = 'Total_Emprunt';
            $total = $projet->emprunts->sum($montantField);
            $projet->$totalField = $total;
        });


        static::saving(function ($projet) {
            $montantField = 'Montant_N1';
            $totalField = 'Total_Subv';
            $total = $projet->subventions->sum($montantField);
            $projet->$totalField = $total;
        });


        static::saving(function ($projet) {
            $montantField = 'Invest_N1';
            $totalField = 'Total_Invest';
            $total = $projet->investissements->sum($montantField);
            $projet->$totalField = $total;
        });


        static::saving(function ($projet) {
            for ($i = 1; $i <= 7; $i++) {
                $montantCAField = "Total_CA_N$i";
                $montantCHVarField = "Total_CHVar_N$i";
                $montantCHField = "Total_CH_N$i";
                $montantDotField = "Total_Dot_N$i";
                $montantIntField = "Total_Int_N$i";
                $montantSalaireField = "Total_Salaire_N$i";
                $montantChSocialeField = "Total_ChSociale_N$i";
                $resultatField = "Resultat_N$i";
    
                $totalCA = $projet->$montantCAField ?? 0;
                $totalCHVar = $projet->$montantCHVarField ?? 0;
                $totalCH = $projet->$montantCHField ?? 0;
                $totalDot = $projet->$montantDotField ?? 0;
                $totalInt = $projet->$montantIntField ?? 0;
                $totalSalaire = $projet->$montantSalaireField ?? 0;
                $totalChSociale = $projet->$montantChSocialeField ?? 0;
    
                $resultat = $totalCA - $totalCHVar - $totalCH - $totalDot - $totalInt - $totalSalaire - $totalChSociale;
    
                $projet->$resultatField = $resultat;
            }
        });
    }


    


}
