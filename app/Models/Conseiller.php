<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conseiller extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'Name',
        'Birthday',
        'Phone',
        'Email',
        'Genre',
        'Photo',
        'Formation',
        'Expertise',
        'Experience',
        'Attach',
        'user_id',
    ];

    protected $searchableFields = ['*'];

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
