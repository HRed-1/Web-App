<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DevisFournisseur extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['Title', 'ICE'];

    protected $searchableFields = ['*'];

    protected $table = 'devis_fournisseurs';

    public function devis()
    {
        return $this->hasMany(Devi::class);
    }

    public function factures()
    {
        return $this->hasMany(Facture::class);
    }
}
