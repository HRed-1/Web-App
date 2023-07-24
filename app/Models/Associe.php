<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Associe extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'Name',
        'Name_ar',
        'CIN',
        'Genre',
        'Phone',
        'Email',
        'date_now',
        'Birth_date',
        'age',
        'commune_id',
        'Adresse',
        'Attach',
        'Photo',
        'porteur_id',
        'Formation',
        'Experience',
        'admin',
        'actif',
        'poste',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date_now' => 'date',
        'admin' => 'boolean',
        'actif' => 'boolean',
        'Attach' => 'array',
        'Photo' => 'array',
    ];

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function porteur()
    {
        return $this->belongsTo(Porteur::class);
    }
}
