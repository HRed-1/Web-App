<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoyenFoncier extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'Title',
        'Photo',
        'Usage',
        'Zone',
        'investissement_id',
        'charge_id',
        'projet_id',
        'amenagement'
    ];

    protected $searchableFields = ['*'];

    protected $table = 'moyen_fonciers';

    protected $casts = [
        'amenagement' => 'boolean',
    ];

    public function investissement()
    {
        return $this->belongsTo(Investissement::class);
    }

    public function charge()
    {
        return $this->belongsTo(Charge::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
