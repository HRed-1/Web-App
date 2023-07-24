<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['Title', 'Title_ar', 'Detail', 'Attach'];

    protected $searchableFields = ['*'];

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
}
