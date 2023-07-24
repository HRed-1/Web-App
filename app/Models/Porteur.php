<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Porteur extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'Name',
        'Name_ar',
        'forme_juridique_id',
        'Creer',
        'Date_creation',
        'ID_RC',
        'ID_RCOP',
        'ID_ICE',
        'secteur_actvite_id',
        'Activity',
        'Phone',
        'Email',
        'commune_id',
        'Adresse',
        'Membre',
        'Membre_F',
        'Membre_H',
        'Membre_JH',
        'Membre_JF',
        'user_id',
        'validite',
        'date_renouv',
        'nmbr_conseil',
        'date_assemble',
        'name_represent',
        'cin_represent',
        'phone_represent',
        'if',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'Creer' => 'boolean',
        'Date_creation' => 'date',
        'date_renouv' => 'date',
        'date_assemble' => 'date',
    ];

    public function formeJuridique()
    {
        return $this->belongsTo(FormeJuridique::class);
    }

    public function secteurActvite()
    {
        return $this->belongsTo(SecteurActvite::class);
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function projets()
    {
        return $this->hasMany(Projet::class);
    }

    public function accompagnements()
    {
        return $this->hasMany(Accompagnement::class);
    }

    public function accompagnementPosts()
    {
        return $this->hasMany(AccompagnementPost::class);
    }

    public function associes()
    {
        return $this->hasMany(Associe::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formations()
    {
        return $this->belongsToMany(Formation::class);
    }
}
