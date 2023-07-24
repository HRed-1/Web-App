<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subvention extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['Title', 'Montant_N1', 'projet_id'];

    protected $searchableFields = ['*'];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
