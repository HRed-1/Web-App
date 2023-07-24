<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeDocument extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['Title', 'Title_ar', 'Detail'];

    protected $searchableFields = ['*'];

    protected $table = 'type_documents';

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
