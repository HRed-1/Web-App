<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Swot extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'pfort',
        'pfaible',
        'opportunity',
        'threat',
        'projet_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'pfort' => 'array',
        'pfaible' => 'array',
        'opportunity' => 'array',
        'threat' => 'array',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
