<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChiffreAffaires extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'projet_id',
        'offre_id',
        'Title',
        'Mode',
        'Price',
        'Unity',
        'Qty',
        'Evolution',
        'Montant_CA_N1',
        'Montant_CA_N2',
        'Montant_CA_N3',
        'Montant_CA_N4',
        'Montant_CA_N5',
        'Montant_CA_N6',
        'Montant_CA_N7',
        'Cout_Charge',
        'Montant_CHVar_N1',
        'Montant_CHVar_N2',
        'Montant_CHVar_N3',
        'Montant_CHVar_N4',
        'Montant_CHVar_N5',
        'Montant_CHVar_N6',
        'Montant_CHVar_N7',
        'mode1',
        'CA_G',
        'CA_D'
    ];

    protected $searchableFields = ['*'];

    protected $table = 'chiffre_affaires';

    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
