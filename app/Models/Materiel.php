<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materiel extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'ref',
        'detail',
        'photo',
        'projet_id',
        'reception',
        'check1',
        'check2',
        'check3',
        'check4',
        'check5',
        'date1',
        'date2',
        'date3',
        'date4',
        'date5',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'reception' => 'boolean',
        'check1' => 'boolean',
        'check2' => 'boolean',
        'check3' => 'boolean',
        'check4' => 'boolean',
        'check5' => 'boolean',
        'date1' => 'date',
        'date2' => 'date',
        'date3' => 'date',
        'date4' => 'date',
        'date5' => 'date',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
