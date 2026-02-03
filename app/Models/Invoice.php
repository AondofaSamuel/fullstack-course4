<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    protected $fillable = [
        'enrollment_id',
        'reference',
        'amount_kobo',
        'status',
        'issued_on',
        'due_on',
    ];

    protected $casts = [
        'amount_kobo' => 'integer',
        'issued_on' => 'date',
        'due_on' => 'date',
    ];

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
