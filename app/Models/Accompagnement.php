<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accompagnement extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'porteur_id',
        'conseiller_id',
        'type_accompagnement_id',
        'programme_id',
        'Date',
        'Detail',
        'Attach',
        'photo',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'Date' => 'datetime',
        'Attach' => 'array',
        'Photo' => 'array',
    ];

    public function porteur()
    {
        return $this->belongsTo(Porteur::class);
    }

    public function conseiller()
    {
        return $this->belongsTo(Conseiller::class);
    }

    public function typeAccompagnement()
    {
        return $this->belongsTo(TypeAccompagnement::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }
}
