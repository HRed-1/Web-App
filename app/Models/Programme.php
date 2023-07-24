<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Programme extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['Title', 'Title_ar', 'Date', 'Open', 'Attach'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'Date' => 'date',
        'Open' => 'boolean',
    ];

    public function projets()
    {
        return $this->hasMany(Projet::class);
    }

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }

    public function accompagnements()
    {
        return $this->hasMany(Accompagnement::class);
    }

    public function accompagnementPosts()
    {
        return $this->hasMany(AccompagnementPost::class);
    }
}
