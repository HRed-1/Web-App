<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormeJuridique extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['Title', 'Title_ar'];

    protected $searchableFields = ['*'];

    protected $table = 'forme_juridiques';

    public function porteurs()
    {
        return $this->hasMany(Porteur::class);
    }
}
