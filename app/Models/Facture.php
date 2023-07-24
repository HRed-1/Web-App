<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'montant',
        'devis_fournisseur_id',
        'projet_id',
        'file',
        'payement',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'payement' => 'boolean',
    ];

    public function devisFournisseur()
    {
        return $this->belongsTo(DevisFournisseur::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
