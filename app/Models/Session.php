<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Session extends Model
{
    protected $fillable = [
        'name',
        'starts_on',
        'ends_on',
        'is_current',
    ];

    protected $casts = [
        'is_current' => 'boolean',
        'starts_on' => 'date',
        'ends_on' => 'date',
    ];

    public function terms(): HasMany
    {
        return $this->hasMany(Term::class);
    }
}
