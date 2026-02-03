<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeeItem extends Model
{
    protected $fillable = [
        'term_id',
        'class_level_id',
        'name',
        'amount_kobo',
        'is_mandatory',
    ];

    protected $casts = [
        'amount_kobo' => 'integer',
        'is_mandatory' => 'boolean',
    ];

    public function term(): BelongsTo
    {
        return $this->belongsTo(Term::class);
    }

    public function classLevel(): BelongsTo
    {
        return $this->belongsTo(ClassLevel::class);
    }
}
