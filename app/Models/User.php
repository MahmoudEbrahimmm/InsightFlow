<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'otp',
        'role',
        'account_verified_at',
        'logout_other_devices',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'account_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function sessions() : HasMany {
        return $this->hasMany(Session::class);
    }


}