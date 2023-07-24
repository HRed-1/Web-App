<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChargePoste extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title', 'title_ar'];

    protected $searchableFields = ['*'];

    protected $table = 'charge_postes';

    public function charges()
    {
        return $this->hasMany(Charge::class);
    }
}
