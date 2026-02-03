<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'invoice_id',
        'reference',
        'channel',
        'amount_kobo',
        'paid_on',
    ];

    protected $casts = [
        'amount_kobo' => 'integer',
        'paid_on' => 'date',
    ];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
