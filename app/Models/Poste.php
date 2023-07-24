<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poste extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['Title', 'Title_ar'];

    protected $searchableFields = ['*'];

    public function moyenHumains()
    {
        return $this->hasMany(MoyenHumain::class);
    }
}
