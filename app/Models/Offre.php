<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offre extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'Type',
        'Title',
        'Title_ar',
        'Detail',
        'Price',
        'projet_id',
        'photo',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        
        'photo' => 'array',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function allChiffreAffaires()
    {
        return $this->hasMany(ChiffreAffaires::class);
    }
}
