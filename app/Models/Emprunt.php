<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emprunt extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'projet_id',
        'Title',
        'Montant_N1',
        'Taux',
        'Duree',
        'Reglement',
        'Echance_N1',
        'Echance_N2',
        'Echance_N3',
        'Echance_N4',
        'Echance_N5',
        'Echance_N6',
        'Echance_N7',
        'Interet_N1',
        'Interet_N2',
        'Interet_N3',
        'Interet_N4',
        'Interet_N5',
        'Interet_N6',
        'Interet_N7',
        'Amort_N1',
        'Amort_N2',
        'Amort_N3',
        'Amort_N4',
        'Amort_N5',
        'Amort_N6',
        'Amort_N7',
        'Rest_N1',
        'Rest_N2',
        'Rest_N3',
        'Rest_N4',
        'Rest_N5',
        'Rest_N6',
        'Rest_N7',
        'N1',
        'N2',
        'N3',
        'N4',
        'N5',
        'N6',
        'N7',
    ];

    protected $searchableFields = ['*'];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
