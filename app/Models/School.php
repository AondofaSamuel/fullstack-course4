<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    protected $fillable = [
        'name',
        'registration_number',
        'school_type',
        'ownership_type',
        'email',
        'phone',
        'address',
        'state',
        'lga',
    ];

    public function campuses(): HasMany
    {
        return $this->hasMany(Campus::class);
    }
}
