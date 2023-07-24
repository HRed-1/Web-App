<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Investissement extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'projet_id',
        'Title',
        'Qty',
        'PU',
        'Invest_N1',
        'Amortissement',
        'Montant_N1',
        'Montant_N2',
        'Montant_N3',
        'Montant_N4',
        'Montant_N5',
        'Montant_N6',
        'Montant_N7',
        'N1',
        'N2',
        'N3',
        'N4',
        'N5',
        'N6',
        'N7',
        'actif_poste_id',
        'photo',
        'amortissable'
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'amortissable' => 'boolean',
    ];

    public function moyenFoncier()
    {
        return $this->hasOne(MoyenFoncier::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function actifPoste()
    {
        return $this->belongsTo(ActifPoste::class);
    }

    public function apports()
    {
        return $this->hasMany(Apport::class);
    }
}
