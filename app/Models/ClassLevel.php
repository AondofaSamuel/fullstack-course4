<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassLevel extends Model
{
    protected $fillable = [
        'campus_id',
        'name',
        'section',
        'order',
    ];

    public function campus(): BelongsTo
    {
        return $this->belongsTo(Campus::class);
    }

    public function classArms(): HasMany
    {
        return $this->hasMany(ClassArm::class);
    }
}
