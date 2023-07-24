<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccompagnementPost extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'porteur_id',
        'conseiller_id',
        'programme_id',
        'Date',
        'Detail',
        'Attach',
        'Photo',
        'projet',
        'type_accomp_post_id',
        'check',
        'projet_id',
        'action',
        'diagnostic',
        'resultat',
        'objectif',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'accompagnement_posts';

    protected $casts = [
        'Date' => 'datetime',
        'check' => 'boolean',
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

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function typeAccompPost()
    {
        return $this->belongsTo(TypeAccompPost::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function materiels()
    {
        return $this->hasManyThrough(Materiel::class, Projet::class);
    }
}
