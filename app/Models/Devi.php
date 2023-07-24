<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Devi extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'devis_fournisseur_id',
        'projet_id',
        'Montant',
        'Sort',
        'file',
    ];

    protected $searchableFields = ['*'];

    public function devisFournisseur()
    {
        return $this->belongsTo(DevisFournisseur::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
