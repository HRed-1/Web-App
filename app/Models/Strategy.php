<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Strategy extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'Price',
        'Distribution',
        'Communication',
        'projet_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'Price' => 'array',
        'Distribution' => 'array',
        'Communication' => 'array',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
