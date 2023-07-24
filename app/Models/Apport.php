<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apport extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'Title',
        'Montant_N1',
        'projet_id',
        'en_nature',
        'composante',
        'investissement_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'en_nature' => 'boolean',
        'composante' => 'array',

    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function investissement()
    {
        return $this->belongsTo(Investissement::class);
    }
}
