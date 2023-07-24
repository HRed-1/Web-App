<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phase extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['Title', 'Title_ar'];

    protected $searchableFields = ['*'];

    public function projets()
    {
        return $this->hasMany(Projet::class);
    }
}
