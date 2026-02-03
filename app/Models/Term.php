<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Term extends Model
{
    protected $fillable = [
        'session_id',
        'name',
        'starts_on',
        'ends_on',
        'is_current',
    ];

    protected $casts = [
        'starts_on' => 'date',
        'ends_on' => 'date',
        'is_current' => 'boolean',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }
}
