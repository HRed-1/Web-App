<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoyenHumain extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'projet_id',
        'poste_id',
        'Contrat',
        'Effectif',
        'Salaire',
        'Mois',
        'Evolution',
        'Salaire_N1',
        'Salaire_N2',
        'Salaire_N3',
        'Salaire_N4',
        'Salaire_N5',
        'Salaire_N6',
        'Salaire_N7',
        'Taux_ch',
        'ChSociale_N1',
        'ChSociale_N2',
        'ChSociale_N3',
        'ChSociale_N4',
        'ChSociale_N5',
        'ChSociale_N6',
        'ChSociale_N7',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'moyen_humains';

    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
