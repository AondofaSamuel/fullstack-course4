<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Guardian extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'relationship',
        'address',
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'guardian_student')
            ->withTimestamps();
    }
}
