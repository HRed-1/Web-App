<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Charge extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'projet_id',
        'Type',
        'Title',
        'Reglement',
        'Mensuel',
        'Trimestriel',
        'Semstriel',
        'Annuel',
        'Evolution',
        'Montant_N1',
        'Montant_N2',
        'Montant_N3',
        'Montant_N4',
        'Montant_N5',
        'Montant_N6',
        'Montant_N7',
        'charge_poste_id',
    ];

    protected $searchableFields = ['*'];

    public function moyenFoncier()
    {
        return $this->hasOne(MoyenFoncier::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function chargePoste()
    {
        return $this->belongsTo(ChargePoste::class);
    }
}
