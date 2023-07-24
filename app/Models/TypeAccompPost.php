<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeAccompPost extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['Title', 'Detail'];

    protected $searchableFields = ['*'];

    protected $table = 'type_accomp_posts';

    public function accompagnementPosts()
    {
        return $this->hasMany(AccompagnementPost::class);
    }
}
