<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commune extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['Title', 'Title_ar'];

    protected $searchableFields = ['*'];

    public function porteurs()
    {
        return $this->hasMany(Porteur::class);
    }

    public function associes()
    {
        return $this->hasMany(Associe::class);
    }

    public function projets()
    {
        return $this->hasMany(Projet::class);
    }
}
