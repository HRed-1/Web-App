<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'porteur_id',
        'type_document_id',
        'Attach',
        'Valide',
        'Detail',
    ];

    protected $searchableFields = ['*'];

    public function porteur()
    {
        return $this->belongsTo(Porteur::class);
    }

    public function typeDocument()
    {
        return $this->belongsTo(TypeDocument::class);
    }
}
