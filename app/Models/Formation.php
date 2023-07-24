<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'module_id',
        'conseiller_id',
        'programme_id',
        'Debut',
        'Fin',
        'Lieu',
        'Attach',
        'Photo',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'Debut' => 'datetime',
        'Fin' => 'datetime',
        'Attach' => 'array',
        'Photo' => 'array',

    ];

    

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function conseiller()
    {
        return $this->belongsTo(Conseiller::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function porteurs()
    {
        return $this->belongsToMany(Porteur::class);
    }
}
