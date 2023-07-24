<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use App\Models\Traits\FilamentTrait;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use Notifiable;
    use HasFactory;
    use Searchable;
    use SoftDeletes;
    use FilamentTrait;
    use HasRoles; //or HasFilamentShield

    protected $fillable = [
        'name',
        'Phone',
        'email',
        'Is_admin',
        'Active',
        'password',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'Is_admin' => 'boolean',
        'Active' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    public function porteurs()
    {
        return $this->hasMany(Porteur::class);
    }

    public function conseillers()
    {
        return $this->hasMany(Conseiller::class);
    }

    public function isSuperAdmin(): bool
    {
        return in_array($this->email, config('auth.super_admins'));
    }
}
