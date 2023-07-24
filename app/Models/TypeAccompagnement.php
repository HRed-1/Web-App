<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeAccompagnement extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['Title', 'Detail'];

    protected $searchableFields = ['*'];

    protected $table = 'type_accompagnements';

    public function accompagnements()
    {
        return $this->hasMany(Accompagnement::class);
    }
}
